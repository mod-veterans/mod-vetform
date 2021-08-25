<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative;


use App\Services\Application;
use App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;
use App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\ApplicantSelection;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\HelperDeclaration;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\HelperDetails;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\HelperRelationship;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\NomineeAddress;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\NomineeDetails;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;
use App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;
use App\Services\Forms\BaseTask;

class Applicant extends BaseTask
{
    protected string $name = 'Who is making this application?';

    protected $_hasSummary = true;

    protected array $_requiredTasks = [
        ThingsToKnow::class
    ];

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new ApplicantSelection($this->namespace),
                'next' => function () {
                    $field = $this->_pages[0]['page']->questions[0]['options']['field'];

                    $clear_pages = [];
                    $return_page = null;

                    switch (session($field, null)) {
                        case 'The person named on this claim is making the application.':
                            $clear_pages = ['nominee-address', 'nominee-details',  'helper-name', 'helper-relationship', 'helper-declaration'];
                            break;

                        case 'I am making an application on behalf of the person named on this application and I have legal authority to act on their behalf.':
                            $clear_pages = ['helper-name', 'helper-relationship', 'helper-declaration'];
                            $return_page = 'nominee-address';
                            break;

                        case 'I am helping someone else make this application.':
                            $clear_pages = ['nominee-address', 'nominee-details'];
                            $return_page = 'helper-name';
                            break;
                    }

                    foreach ($clear_pages as $clear_page) {
                        $questions = $this->_pages[$clear_page]['page']->questions;

                        foreach ($questions as $question) {
                            session()->forget($question['options']['field']);
                        }
                    }

                    return $return_page;
                },
            ],
            'nominee-address' => [
                'page' => new NomineeAddress($this->namespace),
                'next' => 'nominee-details'
            ],
            'nominee-details' => [
                'page' => new NomineeDetails($this->namespace),
            ],

            'helper-name' => [
                'page' => new HelperDetails($this->namespace),
                'next' => 'helper-relationship'
            ],
            'helper-relationship' => [
                'page' => new HelperRelationship($this->namespace),
                'next' => 'helper-declaration'
            ],
            'helper-declaration' => [
                'page'=> new HelperDeclaration($this->namespace)
            ]
        ];
    }
}
