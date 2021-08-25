<?php

use App\Services\Application;
use App\Services\Forms\BaseForm;
use App\Services\Forms\BaseGroup;
use App\Services\Forms\BaseTask;

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
    function is_stackable_task(BaseTask $task)
    {
        return false;
    }
}

if (!function_exists('task_forms')) {
    function task_forms(): array
    {
        /** @var BaseForm $form */
        return Application::getInstance()->form->getTaskForms();
    }
}


if(!function_exists('get_calling_class')) {
    function get_calling_class() {
        $trace = debug_backtrace();
        $class = $trace[1]['class'];

        for ( $i=1; $i<count( $trace ); $i++ ) {
            if ( isset( $trace[$i] ) ) // is it set?
                if ( $class != $trace[$i]['class'] ) // is it a different class
                    return $trace[$i]['class'];
        }
    }
}

if (!function_exists('groups')) {
    /**
     * @return BaseGroup[]
     */
    function groups()
    {
        return Application::getInstance()->form->groups();
    }
}


if (!function_exists('group_task_count')) {
    /**
     * @return int
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

if (!function_exists('groups_task_complete_count')) {
    /**
     * @return int
     */
    function groups_task_complete_count()
    {
        $groups = Application::getInstance()->form->groups();
        $total = 0;

        foreach ($groups as $group) {
            foreach ($group->tasks as $task) {
                if ($task->status === BaseTask::STATUS_COMPLETED) {
                    $total++;
                }
            }
        }

        return $total;
    }
}


if (!function_exists('tasks')) {
    /**
     * @return BaseGroup[]
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
    function group_for_task($task): BaseGroup
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

if (!function_exists('vcap')) {
    function vcap($field, $default = null)
    {
        $vcapServices = getenv('VCAP_SERVICES');
        if ($vcapServices) {
            $vcapServices = json_decode($vcapServices);
        } else {
            return $default;
        }

        $redis = $vcapServices['redis'][0]['credentials'];

        switch ($field) {
            case'REDIS_HOST':
                $redis->host;
                break;
            case'REDIS_URL':
                $redis->uri;
                break;
            case'REDIS_PASSWORD':
                $redis->password;
                break;
            case'REDIS_PORT':
                $redis->port;
                break;
        }

        return $default;
    }
}
