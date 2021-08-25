<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails;


use App\Services\Constant;
use App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer\ContactAddress;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;
use App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\ClaimOutcome;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\ClaimPaymentDate;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\ClaimPaymentType;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\ClaimSolicitorDetails;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\ClaimSolicitorHelp;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\CompensationCondition;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\OtherPaymentReceived;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation\ReceivedCompensation;
use App\Services\Forms\BaseTask;

class OtherCompensation extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected string $name = 'Other compensation';

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
                'page' => new ReceivedCompensation($this->namespace),
                'next' => function () {
                    $field = $this->_pages[0]['page']->questions[0]['options']['field'];
                    return session($field, null) == Constant::YES ? 'compensation-condition' : null;
                },
            ],

            'compensation-condition' => [
                'page' => new CompensationCondition($this->namespace),
                'next' => 'claim-outcome'
            ],

            'claim-outcome' => [
                'page' => new ClaimOutcome($this->namespace),
                'next' => function () {
                    $field = $this->_pages['claim-outcome']['page']->questions[1]['options']['field'];
                    return session($field, null) == Constant::YES ? 'other-payment-received' : null;
                },
            ],
            'other-payment-received' => [
                'page' => new OtherPaymentReceived($this->namespace),
                'next' => 'claim-payment-type'
            ],
            'claim-payment-type' => [
                'page' => new ClaimPaymentType($this->namespace),
                'next' => 'claim-payment-date'
            ],
            'claim-payment-date' => [
                'page' => new ClaimPaymentDate($this->namespace),
                'next' => 'claim-solicitor-help'
            ],
            'claim-solicitor-help' => [
                'page' => new ClaimSolicitorHelp($this->namespace),
                'next' => function () {
                    $field = $this->_pages['claim-solicitor-help']['page']->questions[0]['options']['field'];
                    return session($field, null) == Constant::YES ? 'claim-solicitor-details' : null;
                },
            ],
            'claim-solicitor-details' => [
                'page' => new ClaimSolicitorDetails($this->namespace)
            ]
        ];
    }
}
