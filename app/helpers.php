<?php

use App\Services\Application;

if (!function_exists('form_name')) {
    function form_name()
    {
        return Application::getInstance()->form;
    }
}


if (!function_exists('task_name')) {
    function task_name($className)
    {
        return (new $className);
    }
}

if (!function_exists('is_stackable_task')) {
    function is_stackable_task(\App\Services\Forms\BaseTask $task)
    {
        return false;
    }
}

if (!function_exists('task_forms')) {
    function task_forms(): array
    {
        /** @var \App\Services\Forms\BaseForm $form */
        return Application::getInstance()->form->getTaskForms();
    }
}


if (!function_exists('groups')) {
    /**
     * @return \App\Services\Forms\BaseGroup[]
     */
    function groups()
    {
        return Application::getInstance()->form->groups();
    }
}


if (!function_exists('group_task_count')) {
    /**
     * @return \App\Services\Forms\BaseGroup[]
     */
    function group_task_count()
    {
        $groups = Application::getInstance()->form->groups();
        $total = 0;

        foreach ($groups as $group) {
            $total = $total + sizeof($group->tasks);
        }

        return $total;
    }
}


if (!function_exists('tasks')) {
    /**
     * @return \App\Services\Forms\BaseGroup[]
     */
    function tasks()
    {
        return Application::getInstance()->form->getTasks();
    }
}


if (!function_exists('task_pages')) {
    function task_pages(): array
    {
        return Application::getInstance()->form->getTasks();
    }
}

if (!function_exists('task_id')) {
    function task_id($className): string
    {
        $class = new $className;

        return $class->getId();
    }
}


if (!function_exists('task_pages_completed')) {
    function task_pages_completed(): int
    {
        return Application::getInstance()->form->countCompletedTasks();
    }
}

if (!function_exists('can_start')) {
    function can_start($className): bool
    {
        return true;
    }
}

if (!function_exists('has_started')) {
    function has_started($className): bool
    {
        return true;
    }
}


if (!function_exists('crumbs')) {
    function crumbs($namespace): array
    {
        return Application::getInstance()->getBreadcrumbTrail($namespace) ?? [];
    }
}

if (!function_exists('group_for_task')) {
    function group_for_task($task): \App\Services\Forms\BaseGroup
    {
        return Application::getInstance()->getGroupForTaskByNamespace($task->namespace);
    }
}

if (!function_exists('stored_response')) {
    function stored_response($field)
    {
        return Application::getInstance()->questionValue($field);
    }
}
