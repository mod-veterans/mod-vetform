<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails;


use App\Services\Forms\Afcs\Groups\MedicalTreatment;
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

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->pages = [
            0 => [
                'page' => new TreatmentStatus($this->namespace),
                'next' => function () {
                    session()->save();
                    $field = $this->pages[0]['page']->questions[0]['options']['field'];

                    return session($field, null) == 'No' ? null : 'medical-treatment';
                },
            ],
            'medical-treatment' => [
                'page' => new MedicalTreatment($this->namespace),
            ]
        ];
    }
}
