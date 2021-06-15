<?php


namespace App\Services\Forms\VetId\Groups\AboutYou;


use App\Services\Forms\BaseTask;
use App\Services\Forms\VetId\Groups\AboutYou\Applicant\DateOfBirth;
use App\Services\Forms\VetId\Groups\AboutYou\Applicant\Name;

class ApplicantPersonal extends BaseTask
{
    protected string $name = 'Your personal details';

    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new Name($this->namespace),
                'next' => 'date-of-birth',
            ],
            'date-of-birth' => [
                'page' => new DateOfBirth($this->namespace)
            ]
        ];
    }
}
