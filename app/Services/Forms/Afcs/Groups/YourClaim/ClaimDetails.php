<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim;


use App\Services\Application;
use App\Services\Constant;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentDowngraded;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentFirstAid;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingActivity;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingDate;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingDirectRoute;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingDuty;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingForm;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingJourneyFrom;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingJourneyReason;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingJourneyTo;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingLeave;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingLocation;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingMedicalCondition;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingReportedTo;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingReportTo;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingRoadTraffic;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentNonSportingSurgeryAddress;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentPoliceRef;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentSportingActivity;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentSportingAuthorise;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentSportingDate;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentHospitalFacility;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentSportingHospitalAddress;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentSportingMedicalCondition;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentSportingRelated;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentSportingSurgeryAddress;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentWitness;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimDowngradedDates;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessNote;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimOtherTreatment;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimTreatmentAddress;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessFirstMedicalAttentionDate;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimSurgeryTreatmentDate;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimAccidentCondition;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimHospital;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllness;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessAddress;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessCondition;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessConditionChemicalExposure;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessDate;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimDowngraded;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessDueto;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessRelated;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimSurgeryAddress;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimTreatmentType;
use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;
use Exception;

class ClaimDetails extends BaseTask
{
    use Stackable;

    protected $summaryPage = true;
    protected $postTask = null;

    protected string $name = 'Claim details';

    protected string $_title = 'Claim details';

    protected $_addStackLabel = 'Add a claim';

    protected $_preTask = [
        [
            'type' => 'body',
            'content' => 'This form allows you to make multiple claims based on individual injuries, illnesses or conditions that have occured at different points in time as a result of your service.'
        ],
        [
            'type' => 'body',
            'content' => 'For a specific accident or incident you can add all of the injuries and conditions sustained in a single claim.'
        ],
    ];

    /**
     * @return void
     */
    function setPages(): void
    {
        $this->_pages = [
            0 => [
                'page' => new ClaimIllness($this->namespace),
                'next' => function () {
                    $field = $this->_pages[0]['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));

                    try {
                        if ($answers[$field] == 'A condition, injury or illness that is the result of a specific accident or incident')
                            return 'claim-accident-condition';
                    } catch (Exception $e) {
                    }

                    return 'claim-illness-condition';
                },
            ],

            // @illness condition
            'claim-illness-condition' => [
                'page' => new ClaimIllnessCondition($this->namespace),
                'next' => 'claim-illness-surgery-address',
            ],
            'claim-illness-surgery-address' => [
                'page' => new ClaimIllnessAddress($this->namespace),
                'next' => 'claim-illness-date'
            ],
            'claim-illness-date' => [
                'page' => new ClaimIllnessDate($this->namespace),
                'next' => 'claim-illness-condition-related'
            ],
            'claim-illness-condition-related' => [
                'page' => new ClaimIllnessRelated($this->namespace),
                'next' => 'claim-illness-condition-dueto'
            ],
            'claim-illness-condition-dueto' => [
                'page' => new ClaimIllnessDueto($this->namespace),
                'next' => function () {
                    $field = $this->pages['claim-illness-condition-dueto']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return in_array('Chemical exposure', $answers[$field]) ?
                        'claim-illness-condition-chemical-exposure' :
                        'claim-illness-first-medical-attention-date';
                }
            ],

            // Chemical exposure
            'claim-illness-condition-chemical-exposure' => [
                'page' => new ClaimIllnessConditionChemicalExposure($this->namespace),
                'next' => 'claim-illness-first-medical-attention-date'
            ],
            'claim-illness-first-medical-attention-date' => [
                'page' => new ClaimIllnessFirstMedicalAttentionDate($this->namespace),
                'next' => 'claim-downgraded',
            ],
            'claim-downgraded' => [
                'page' => new ClaimDowngraded($this->namespace),
                'next' => function () {
                    $field = $this->pages['claim-downgraded']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return ($answers[$field] == Constant::YES) ? 'claim-downgraded-dates' : 'claim-note';
                }
            ],
            'claim-downgraded-dates' => [
                'page' => new ClaimDowngradedDates($this->namespace),
                'next' => 'claim-note'
            ],
            'claim-note' => [
                'page' => new ClaimIllnessNote($this->namespace)
            ],

            // @accident condition
            'claim-accident-condition' => [
                'page' => new ClaimAccidentCondition($this->namespace),
                'next' => function () {
                    $field = $this->pages['claim-accident-condition']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return ($answers[$field] == Constant::YES) ? 'claim-accident-sporting-medical-condition' : 'claim-accident-non-sporting-medical-condition';
                }
            ],
            'claim-accident-non-sporting-medical-condition' => [
                'page' => new ClaimAccidentNonSportingMedicalCondition($this->namespace),
                'next' => 'claim-accident-non-sporting-surgery-address'
            ],
            'claim-accident-sporting-medical-condition' => [
                'page' => new ClaimAccidentSportingMedicalCondition($this->namespace),
                'next' => 'claim-accident-sporting-surgery-address'
            ],
            'claim-accident-sporting-surgery-address' => [
                'page' => new ClaimAccidentSportingSurgeryAddress($this->namespace),
                'next' => 'claim-accident-sporting-date'
            ],
            'claim-accident-sporting-date' => [
                'page' => new ClaimAccidentSportingDate($this->namespace),
                'next' => 'claim-accident-sporting-activity'
            ],
            'claim-accident-sporting-activity' => [
                'page' => new ClaimAccidentSportingActivity($this->namespace),
                'next' => 'claim-accident-sporting-authorise'
            ],
            'claim-accident-sporting-authorise' => [
                'page' => new ClaimAccidentSportingAuthorise($this->namespace),
                'next' => 'claim-accident-sporting-related'
            ],
            'claim-accident-sporting-related' => [
                'page' => new ClaimAccidentSportingRelated($this->namespace),
                'next' => 'claim-accident-witness'
            ],
            'claim-accident-non-sporting-surgery-address' => [
                'page' => new ClaimAccidentNonSportingSurgeryAddress($this->namespace),
                'next' => 'claim-accident-non-sporting-date',
            ],
            'claim-accident-non-sporting-date' => [
                'page' => new ClaimAccidentNonSportingDate($this->namespace),
                'next' => 'claim-accident-non-sporting-duty'
            ],
            'claim-accident-non-sporting-duty' => [
                'page' => new ClaimAccidentNonSportingDuty($this->namespace),
                'next' => 'claim-accident-non-sporting-report-to'
            ],
            'claim-accident-non-sporting-report-to' => [
                'page' => new ClaimAccidentNonSportingReportTo($this->namespace),
                'next' => 'claim-accident-non-sporting-form'
            ],
            'claim-accident-non-sporting-form' => [
                'page' => new ClaimAccidentNonSportingForm($this->namespace),
                'next' => 'claim-accident-non-sporting-location'
            ],
            'claim-accident-non-sporting-location' => [
                'page' => new ClaimAccidentNonSportingLocation($this->namespace),
                'next' => 'claim-accident-non-sporting-activity'
            ],
            'claim-accident-non-sporting-activity' => [
                'page' => new ClaimAccidentNonSportingActivity($this->namespace),
                'next' => 'claim-accident-non-sporting-road-traffic'
            ],
            'claim-accident-non-sporting-road-traffic' => [
                'page' => new ClaimAccidentNonSportingRoadTraffic($this->namespace),
//                'next' => 'claim-accident-non-sporting-journey-reason'

                'next' => function () {
                    $field = $this->pages['claim-accident-non-sporting-road-traffic']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return ($answers[$field] == Constant::YES) ? 'claim-accident-non-sporting-journey-reason' : 'claim-accident-non-sporting-reported-to';
                }
            ],
            'claim-accident-non-sporting-journey-reason' => [
                'page' => new ClaimAccidentNonSportingJourneyReason($this->namespace),
                'next' => 'claim-accident-non-sporting-journey-from'
            ],
            'claim-accident-non-sporting-journey-from' => [
                'page' => new ClaimAccidentNonSportingJourneyFrom($this->namespace),
                'next' => 'claim-accident-non-sporting-journey-to'
            ],
            'claim-accident-non-sporting-journey-to' => [
                'page' => new ClaimAccidentNonSportingJourneyTo($this->namespace),
                'next' => 'claim-accident-non-sporting-direct-route'
            ],
            'claim-accident-non-sporting-direct-route' => [
                'page' => new ClaimAccidentNonSportingDirectRoute($this->namespace),
                'next' => 'claim-accident-non-sporting-reported-to'
            ],
            'claim-accident-non-sporting-reported-to' => [
                'page' => new ClaimAccidentNonSportingReportedTo($this->namespace),
                'next' => function () {
                    $field = $this->pages['claim-accident-non-sporting-reported-to']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return ($answers[$field] == Constant::YES) ? 'claim-accident-police-ref' : 'claim-accident-non-sporting-leave';
                }
            ],
            'claim-accident-police-ref' => [
                'page' => new ClaimAccidentPoliceRef($this->namespace),
                'next' => 'claim-accident-non-sporting-leave'
            ],
            'claim-accident-non-sporting-leave' => [
                'page' => new ClaimAccidentNonSportingLeave($this->namespace),
                'next' => 'claim-accident-witness'
            ],
            'claim-accident-witness' => [
                'page' => new ClaimAccidentWitness($this->namespace),
                'next' => 'claim-accident-first-aid'
            ],
            'claim-accident-first-aid' => [
                'page' => new ClaimAccidentFirstAid($this->namespace),
                'next' => 'claim-accident-hospital-facility'
            ],
            'claim-accident-hospital-facility' => [
                'page' => new ClaimAccidentHospitalFacility($this->namespace),
                'next' => function () {
                    $field = $this->pages['claim-accident-hospital-facility']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return ($answers[$field] == Constant::YES) ? 'claim-accident-hospital-address' : 'claim-downgraded';
                }
            ],
            'claim-hospital' => [
                'page' => new ClaimHospital($this->namespace),
                'next' => function () {
                    $field = $this->pages['claim-hospital']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return ($answers[$field] == Constant::YES) ? 'hospital-visit-subtask' : 'claim-surgery-waiting';
                }
            ],
            'claim-accident-hospital-address' => [
                'page' => new ClaimAccidentSportingHospitalAddress($this->namespace),
                'next' => 'claim-downgraded',
            ],
            'claim-surgery-waiting' => [
                'page' => '',
                'next' => function () {
                    $field = $this->pages['claim-surgery-waiting']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return ($answers[$field] == Constant::YES) ? 'claim-treatment-date' : 'claim-other-date';
                }
            ],
            'claim-surgery-treatment-date' => [
                'page' => new ClaimSurgeryTreatmentDate($this->namespace),
                'next' => 'claim-other-address'
            ],
            'claim-surgery-address' => [
                'page' => new ClaimSurgeryAddress($this->namespace),
                'next' => 'claim-other-treatment'
            ],
            'claim-other-treatment' => [
                'page' => new ClaimOtherTreatment($this->namespace),
                'next' => function () {
                    $field = $this->pages['claim-other-treatment']['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    return ($answers[$field] == Constant::YES) ? 'claim-treatment-type' : null;
                }
            ],
            'claim-treatment-type' => [
                'page' => new ClaimTreatmentType($this->namespace),
                'next' => 'claim-treatment-address'
            ],
            'claim-treatment-address' => [
                'page' => new ClaimTreatmentAddress($this->namespace),
            ]
        ];
    }
}
