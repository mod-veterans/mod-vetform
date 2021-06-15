<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou;


use App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer\ContactAddress;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceName;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceNumber;
use App\Services\Forms\BaseTask;

class MedicalOfficer extends BaseTask
{
    /**
     * @var bool
     */
    protected $_hasSummary = true;


    protected string $name = 'Medical Officer';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new ContactAddress($this->namespace),
            ]
        ];
    }
}
