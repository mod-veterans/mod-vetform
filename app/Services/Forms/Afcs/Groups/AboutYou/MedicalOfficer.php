<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou;


use App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer\ContactAddress;
use App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative;
use App\Services\Forms\BaseTask;

class MedicalOfficer extends BaseTask
{
    /**
     * @var bool
     */
    protected $_hasSummary = true;

    protected string $name = 'Medical Officer';

    protected array $_requiredTasks = [
        ThingsToKnow::class,
        Applicant::class,
        Representative::class,
        PersonalDetails::class
    ];

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
