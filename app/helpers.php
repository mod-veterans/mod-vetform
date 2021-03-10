<?php

if (!function_exists('form_name')) {
    function form_name()
    {
        $formClass = session('form_class', false);
        return new $formClass;
    }
}


if (!function_exists('task_name')) {
    function task_name($className)
    {
        return (new $className);
    }
}

if (!function_exists('task_forms')) {
    function task_forms(): array
    {
        $formClass = session('form_class', false);

        /** @var \App\Services\Forms\BaseForm $form */
        return (new $formClass)->getTaskForms();
    }
}


if (!function_exists('groups')) {
    /**
     * @return \App\Services\Forms\BaseGroup[]
     */
    function groups()
    {
        dd(session()->all());
        $form = session('form_class', false);
        return $form->groups();
    }
}


if (!function_exists('tasks')) {
    /**
     * @return \App\Services\Forms\BaseGroup[]
     */
    function tasks()
    {
        $form = session('form_class', false);
        return (new $form)->getTasks();
    }
}


if (!function_exists('task_pages')) {
    function task_pages(): array
    {
        $formClass = session('form_class', false);
        return (new $formClass)->getTasks();
    }
}

if (!function_exists('task_id')) {
    function task_id($className): string
    {
        $class = new $className;

        return $class->getId();


        $formClass = session('form_class', false);
        return (new $formClass)->getPages();
    }
}


if (!function_exists('task_pages_completed')) {
    function task_pages_completed(): int
    {
        $formClass = session('form_class', false);
        return (new $formClass)->countCompletedTasks();
    }
}

if (!function_exists('can_start')) {
    function can_start($className): bool
    {
        $formClass = (new $className);
        return true;
    }
}


if (!function_exists('has_started')) {
    function has_started($className): bool
    {
        $formClass = (new $className);
        return true;
    }
}


if (!function_exists('get_status_label')) {
    function get_status_label($className): bool
    {
        $formClass = (new $className);
        return 'Completed';
    }
}


