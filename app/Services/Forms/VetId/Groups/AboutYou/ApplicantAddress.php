<?php


namespace App\Services\Forms\VetId\Groups\AboutYou;


use App\Services\Forms\BaseTask;
use App\Services\Forms\VetId\Groups\AboutYou\ApplicantAddress\Address;

class ApplicantAddress extends BaseTask
{
    protected string $name = 'Where you live';

    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new Address($this->namespace)
            ]
        ];
    }
}
