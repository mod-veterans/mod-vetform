<?php


namespace App\Services\Forms\Afcs\Groups\ApplicationSubmission;



use App\Services\Forms\Afcs\Groups\ApplicationSubmission\Declaration\Submission;
use App\Services\Forms\BaseTask;

class Declaration extends BaseTask
{
    protected string $name = 'Who is making this application?';

    function setPages(): void
    {
        $this->_pages = [
            0 => [
                'page' => new Submission($this->namespace)
            ],
        ];
    }
}
