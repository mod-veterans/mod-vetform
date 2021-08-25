<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative;


use App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;
use App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative\RepresentativeAddress;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative\RepresentativeRole;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative\RepresentativeSelection;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;
use App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;
use App\Services\Forms\BaseTask;

class Representative extends BaseTask
{
    protected string $name = 'Do you want to nominate a representative?';

    protected array $_requiredTasks = [
        ThingsToKnow::class,
        Applicant::class
    ];

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new RepresentativeSelection($this->namespace),
                'next' => function () {
                    $field = $this->_pages[0]['page']->questions[0]['options']['field'];

                    return session($field, null) == 'No' ? null : 'representative-address';
                },
            ],
            'representative-address' => [
                'page' => new RepresentativeAddress($this->namespace),
                'next' => 'representative-role'
            ],
            'representative-role' => [
                'page' => new RepresentativeRole($this->namespace),
            ]
        ];
    }
}
