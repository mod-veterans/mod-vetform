<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails;


use App\Services\Constant;
use App\Services\Forms\Afcs\Groups\MedicalTreatment;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment\OtherMedicalTreatmentAddress;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment\OtherMedicalTreatmentCondition;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment\OtherMedicalTreatmentEndDate;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment\OtherMedicalTreatmentStartDate;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment\OtherMedicalTreatmentType;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment\TreatmentStatus;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class OtherMedicalTreatment extends BaseTask
{
    use Stackable;

    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected string $name = 'Other medical treatment';
    protected string $_title = 'Other medical treatment';
    protected $_addStackLabel = 'Add a Medical Treatment';

    protected $_preTask = [
        [
            'type' => 'body',
            'content' => 'We need to know about any hospitals or medical facilities that have provided you with further treatment for the conditions you are claiming for, or if you are on a waiting list for treatment.'
        ],
        [
            'type' => 'body',
            'content' => 'If you have visited the same hospital or facility several times, you only need to provide the details in this section once.'
        ],
    ];

    public function __construct($namespace)
    {
        $this->_stackTriggerPage = 0;
        $this->_stackTriggerQuestion = 0;
        $this->_stackTriggerAnswer = Constant::YES;
        $this->_stackSkipTriggerQuestion = true;

        parent::__construct($namespace);
    }

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new TreatmentStatus($this->namepace),
                'next' => function () {
                    $field = $this->pages[0]['page']->questions[0]['options']['field'];
                    $answer = session($field, null);
                    return ($answer == $this->_stackTriggerAnswer) ? 'other-medical-treatment-address' : null;
                }
            ],
            'other-medical-treatment-address' => [
                'page' => new OtherMedicalTreatmentAddress($this->namepace),
                'next' => 'other-medical-treatment-start-date'
            ],
            'other-medical-treatment-start-date' => [
                'page' => new OtherMedicalTreatmentStartDate($this->namepace),
                'next' => 'other-medical-treatment-end-date'
            ],
            'other-medical-treatment-end-date' => [
                'page' => new OtherMedicalTreatmentEndDate($this->namepace),
                'next' => 'other-medical-treatment-type',
            ],
            'other-medical-treatment-type' => [
                'page' => new OtherMedicalTreatmentType($this->namepace),
                'next' => 'other-medical-treatment-condition',
            ],
            'other-medical-treatment-condition' => [
                'page' => new OtherMedicalTreatmentCondition($this->namepace),
            ],
        ];
    }
}
