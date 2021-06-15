<?php


namespace App\Services\Forms\Afcs\Groups\ApplicationSubmission;


use App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;
use App\Services\Forms\Afcs\Groups\ApplicationSubmission\Declaration\Submission;
use App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;
use App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;
use App\Services\Forms\BaseTask;

class Declaration extends BaseTask
{
    protected string $name = 'Complete your application';

    protected array $_requiredTasks = [
        ThingsToKnow::class,
        PersonalDetails::class,
        MedicalOfficer::class,
        ServiceDetails::class,
        Applicant::class,
        Representative::class,
        OtherBenefits::class,
        OtherCompensation::class,
        OtherMedicalTreatment::class,
        PaymentDetails::class,
        ClaimDetails::class
    ];

    function setPages(): void
    {
        $this->_pages = [
            0 => [
                'page' => new Submission($this->namespace)
            ],
        ];
    }
}
