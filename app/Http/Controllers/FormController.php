<?php

namespace App\Http\Controllers;

use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use Illuminate\Support\Facades\Validator;

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
     * @param string $method
     * @param array $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        $form = app_path() . '/Forms/' . request('form', null);
        if ($form) $this->formName = request('form', null);

        $form = session('form_class', null);
        $group = request('group', null);
        $task = request('task', null);
        $page = request('page', null);

        $form = new $form;
        foreach ($form->groups() as $groupClass) {
            if ($groupClass->getId() === $group) {

                /** @var BaseTask $taskClass */
                foreach ($groupClass->tasks() as $taskClass) {
                    if ($taskClass->getId() === $task) {
                        $this->_task = $taskClass;
                        if ($this->_task->pages()) {
                            $this->_pageIndex = $taskClass->getPageIndex($page) ?? 0;
                            $view = $this->_task->pages()[$this->_pageIndex];
                            $page = $page ?? $view['page']->getId();
                            request()->merge(['page' => $page]);

                            $this->_page = $view['page'];
                            return parent::callAction($method, $parameters);
                        }
                    }
                }
            }
        }

        abort(404);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('page', [
            'view' => $this->_page,
            'group' => request('group'),
            'task' => request('task'),
            'page' => request('page'),
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save()
    {
        $rules = $messages = [];
        foreach ($this->_page->questions as $index => $question) {
            $rule = $question['options']['validation'] ?? [];
            if (is_string($rule)) {
                $rule = explode('|', $rule);
            }

            $rules[$question['options']['field']] = $rule;

            foreach ($question['options']['messages'] ?? [] as $rule => $message) {
                $messages[$question['options']['field'] . '.' . $rule] = $message;
            }
        }

        // From the above loop we have pulled our validation rules and appropriate messages
        Validator::make(request()->all(), $rules, $messages)->validate();

        // We only get to this point if validation passes

        $nextPage = $this->_task->nextPage($this->_pageIndex);

        //dd($nextPage);

//        dd($this->_task->nextPage($this->_pageIndex));
        return redirect()->route('load.form', [
            'group' => request('group'),
            'task' => request('task'),
            'page' => $nextPage['page']->getId(),
        ]);
    }

    /**
     *
     */
    public function cancel()
    {

    }
}
