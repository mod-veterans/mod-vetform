<?php

namespace App\Http\Controllers;

use App\Services\Application;
use App\Services\Forms\BaseForm;
use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use App\Services\Notify;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;

class FormController extends Controller
{
    /**
     * @var BasePage
     */
    private $_page = null;

    /**
     * @var int
     */
    private $_pageIndex = null;

    /**
     * @var BaseTask
     */
    private $_task = null;

    /**
     * @var string
     */
    private $_stack = null;

    /**
     * @var bool
     */
    private $_stackingPage = false;

    /**
     * @var Application
     */
    private $_application;

    /**
     * @param string $method
     * @param array $parameters
     * @return Response
     */
    public function callAction($method, $parameters)
    {
        $form = app_path() . '/Forms/' . request('form', null);
        if ($form) $this->formName = request('form', null);

        $this->_application = Application::getInstance();
        $form = $this->_application->form;
        $group = request('group', null);
        $task = request('task', null);
        $page = request('page', null);
        $stack = request('stack', null);

        foreach ($form->groups() as $groupClass) {
            if ($groupClass->getId() === $group) {

                /** @var BaseTask $taskClass */
                foreach ($groupClass->tasks as $taskClass) {
                    if ($taskClass->getId() === $task) {
                        $this->_task = $taskClass;
                        if (is_null($page) && $this->_task->isStackable()) {
                            $this->_stackingPage = true;

                            if (request('stack')) {
                                if ($this->_task->isValidStack(request('stack'))) {
                                    $this->_stack = request('stack');
                                    $this->_stackingPage = false;
                                    $this->getPage($page);
                                }
                            }
                        } else {
                            $this->_stack = request('stack');
                            $this->getPage($page);
                        }
                    } else {
                        $this->getPage($page);
                    }
                }
            }
        }

        return parent::callAction($method, $parameters);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     */
    public function index()
    {
        if (!$this->_stackingPage) {
            return view('page', [
                'view' => $this->_page,
                'group' => request('group'),
                'task' => request('task'),
                'page' => request('page'),
                'redirect' => request('return', null),
                'stack' => $this->_stack,
            ]);
        } else {
            foreach ($this->_task->stack as $stackID => $stack) {
                if (empty($stack)) {
                    $this->_task->dropFromStack($stackID);
                }
            }

            return view('stack', [
                'view' => $this->_task,
            ]);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     */
    public function summarise()
    {
        if ($this->_task->isStackable() && request('stack')) {
            Application::getInstance()->trackStackId(request('stack'));
        }

        return view('summary', ['task' => $this->_task]);
    }

    /**
     * @throws ValidationException
     */
    public function save(Request $request)
    {
        $rules = $messages = [];

        foreach ($this->_page->questions as $index => $question) {
            $rule = $question['options']['validation'] ?? [];
            $field = $question['options']['field'];
            $validationMessages = $question['options']['messages'] ?? [];

            if (is_string($rule)) {
                $rule = explode('|', $rule);
            }

            $rules[$field] = $rule;

            foreach ($validationMessages as $rule => $message) {
                $messages[$field . '.' . $rule] = $message;
            }

            if ($question['component'] === 'date-field') {
                if (request($field . '-year') || request($field . '-month') || request($field . '-day')) {
                    request()->merge([$field => sprintf('%04d-%02d-%02d',
                        request($field . '-year'),
                        request($field . '-month'),
                        request($field . '-day'),
                    )]);
                }
            }
        }

        $validator = Validator::make(request()->all(), $rules, $messages);

        if ($validator->fails()) {
            request()->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (sizeof(request()->files) > 0) {
            foreach ($this->_page->questions as $index => $question) {
                if ($question['component'] == 'fileUpload') {
                    $field = request()->file($question['options']['field']);
                    $filename = Uuid::uuid4() . '.' . $field->getClientOriginalExtension();
                    $field->storeAs('uploads', $filename);

                    request()->merge([
                        $question['options']['field'] . '::filename' => $filename,
                        $question['options']['field'] . '::mnemonic' => $field->getClientOriginalName(),
                        $question['options']['field'] => $field,
                    ]);
                }
            }
        }

        $this->_page->storeResponse(request()->all(), $this->_stack);
        $nextPage = $this->_task->nextPage($this->_pageIndex);

        if (is_null($nextPage) || empty($nextPage)) {
            $consentPage = Application::getInstance()->form->consentPage;
            $group = get_class(Application::getInstance()->getGroupForPageByNamespace($this->_page->namespace));

            if ($consentPage == $group) {
                $reference_number = Application::getInstance()->getReference();
                $responses = Application::getInstance()->collateResponses();

                $content = [];
                foreach ($responses as $section => $pages) {
                    array_push($content, '# ' . $section);
                    foreach ($pages as $page => $reply) {
                        if (is_array($reply)) {
                            foreach ($reply as $question => $response) {
                                if (is_array($response)) {
                                    array_push($content, $question . ': ' . join("\n", $response));
                                } else {
                                    array_push($content, $question . ': ' . $response);
                                }
                            }
                            array_push($content, str_repeat('&mdash;', 28));
                        } else {
                            array_push($content, $page . ': ' . $reply);
                        }
                    }

                    array_push($content, '');
                }

                $content = trim(join("\n", $content));
                $system_email = explode('|', env('SYSTEM_EMAIL_ADDRESS', ''));

                $storedSessionQuery = DB::table('stored_sessions');
                $storeResponseIdentifier = Application::getInstance()->form->identifier ?? [];

                foreach ($storeResponseIdentifier as $identifier) {
                    $storedSessionQuery->where('identifier->' . $identifier, strtolower(session($identifier)));
                }

                $stored_session = $storedSessionQuery->first();
                $notification = Notify::getInstance()
                    ->setData([
                        'reference_number' => $reference_number, 'content' => $content]);

                foreach($system_email as $email) {
                    $notification->sendEmail($email, env('NOTIFY_CLAIM_SUBMITTED'));
                    $notification->sendEmail($email, env('NOTIFY_USER_CONFIRMATION'));
                }

                $notification->sendEmail(session($this->_application->form->userEmail,'noreply@example.com'), env('NOTIFY_USER_CONFIRMATION'));

                return redirect()->route('application.complete');
            }

            if (request('redirect')) {
                if ($this->_task->hasSummary) {
                    return redirect()->route('summarise.form', [
                        'group' => request('group'),
                        'task' => request('task'),
                        'stack' => request('stack')
                    ]);
                }
            }

            if ($this->_task->isStackable()) {
                if ($this->_task->hasSummary) {
                    return redirect()->route('summarise.form', [
                        'group' => request('group'),
                        'task' => request('task'),
                        'stack' => request('stack')
                    ]);
                }

                return redirect()->route('load.form', [
                    'group' => request('group'),
                    'task' => request('task')
                ]);
            }

            if ($this->_task->hasSummary) {
                return redirect()->route('summarise.form', [
                    'group' => request('group'),
                    'task' => request('task'),
                    'stack' => request('stack')
                ]);
            }

            return redirect()->route('home');
        }

        if ($this->_task->isStackable() && !$this->_stack) {
            return redirect()->route('add.stack', ['stack' => $this->_task->namespace]);
        }

        if (request('redirect') && $this->_task->status === BaseTask::STATUS_COMPLETED) {
            if ($this->_task->hasSummary) {
                return redirect()->route('summarise.form', [
                    'group' => request('group'),
                    'task' => request('task'),
                    'stack' => request('stack')
                ]);
            }
        }

        return redirect()->route('load.form', [
            'group' => request('group'),
            'task' => request('task'),
            'page' => $nextPage['page']->getId() ?? null,
            'stack' => request('stack')
        ]);
    }

    /**
     *
     */
    public function cancel()
    {
        return view('cancel-application');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelConfirmation()
    {
        session()->flush();
        return redirect()->route('start');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     */
    public function complete()
    {
        $form = session('form');
        $applicationReference = session('application-reference');

        // DB::table('stored_sessions')->where('identifier', '')

//        session()->flush();
//        session(['form' => $form]);
//        session(['application-reference' => $applicationReference]);

        if (view()->exists('forms.' . Application::getInstance()->form->getId() . '.complete')) {
            $view = 'forms.' . Application::getInstance()->form->getId() . '.complete';
        } else {
            $view = 'complete';
        }

        return view($view);
    }

    /**
     * @param $page
     */
    private function getPage($page)
    {
        if ($this->_task instanceof BaseTask) {
            if ($this->_task->pages) {
                $this->_pageIndex = $this->_task->getPageIndex($page) ?? array_key_first($this->_task->pages);

                $view = $this->_task->pages[$this->_pageIndex];
                $page = $page ?? $view['page']->getId();
                request()->merge(['page' => $page]);
                $this->_page = $view['page'];
            }
        }
    }
}
