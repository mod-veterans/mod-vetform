<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails;


use App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer\ContactAddress;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\CompensationCondition;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\ReceivedCompensation;
use App\Services\Forms\BaseTask;

class OtherCompensation extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected string $name = 'Other compensation';


    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->pages = [
            0 => [
                'page' => new ReceivedCompensation($this->namespace),
                'next' => function() {
                    return 'compensation-condition';
                }
            ],

            'compensation-condition' => [
                'page' => new CompensationCondition($this->namespace),
            ],
        ];
    }
}
