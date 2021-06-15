<?php


namespace App\Services\Forms\Medals\Groups\Submission;


use App\Services\Forms\BaseTask;
use App\Services\Forms\Medals\Groups\Submission\Declaration\Submit;

class Declaration extends BaseTask
{
    protected string $name = 'Complete your application';

    protected array $_requiredTasks = [
    ];

    function setPages(): void
    {
        $this->_pages = [
            0 => [
                'page' => new Submit($this->namespace)
            ],
        ];
    }
}
