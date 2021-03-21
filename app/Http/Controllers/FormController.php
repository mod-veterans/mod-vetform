<?php

namespace App\Http\Controllers;

use App\Services\Application;
use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

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
     * @param string $method
     * @param array $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        $form = app_path() . '/Forms/' . request('form', null);
        if ($form) $this->formName = request('form', null);

        $form = Application::getInstance()->form;
        $group = request('group', null);
        $task = request('task', null);
        $page = request('page', null);

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function summarise()
    {
        return view('summary', ['task' => $this->_task]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save()
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
                request()->merge([$field => sprintf('%04d-%02d-%02d',
                    request($field . '-year'),
                    request($field . '-month'),
                    request($field . '-day'),
                )]);
            }
        }

        Validator::make(request()->all(), $rules, $messages)->validate();

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

        if (is_null($nextPage)) {
            if (request('redirect')) {
                if ($this->_task->hasSummary) {
                    return redirect()->route('summarise.form', [
                        'group' => request('group'),
                        'task' => request('task'),
                    ]);
                }
            }

            if ($this->_task->isStackable()) {
                return redirect()->route('load.form', [
                    'group' => request('group'),
                    'task' => request('task'),
                ]);
            }

            if($this->_task->hasSummary) {
                return redirect()->route('summarise.form', [
                    'group' => request('group'),
                    'task' => request('task'),
                ]);
            }
        }

//        dd($nextPage['page']->getId());

        return redirect()->route('load.form', [
            'group' => request('group'),
            'task' => request('task'),
            'page' => $nextPage['page']->getId(),
        ]);
    }

    private function getPage($page)
    {
        if ($this->_task instanceof BaseTask) {
            if ($this->_task->pages) {

                $this->_pageIndex = $this->_task->getPageIndex($page) ?? 0;
                $view = $this->_task->pages[$this->_pageIndex];
                $page = $page ?? $view['page']->getId();
                request()->merge(['page' => $page]);
                $this->_page = $view['page'];
            }
        }
    }
}
