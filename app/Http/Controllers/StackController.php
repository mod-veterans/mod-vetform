<?php

namespace App\Http\Controllers;

use App\Services\Application;
use App\Services\Forms\BaseTask;
use Ramsey\Uuid\Uuid;

class StackController extends Controller
{
    /**
     *
     */
    public function add()
    {
        $application  = Application::getInstance();
        $form = $application->form;
        $task = $form->getStackClass(request('stack'));
        $group = $application->getGroupForTaskByNamespace($task->namespace);
        $stackID = $task->addToStack(Uuid::uuid4()->toString());

        return redirect()->route('load.form', [
            'group' => $group->getId(),
            'task' => $task->getId(),
            'stack' => $stackID
        ]);
    }

    /**
     *
     */
    public function drop()
    {
        $stack = Application::getInstance()->form->getStackClass(request('stack'));
        $stack->dropFromStack(request('id'));
        return back();
    }

    public function skip() {

    }
}
