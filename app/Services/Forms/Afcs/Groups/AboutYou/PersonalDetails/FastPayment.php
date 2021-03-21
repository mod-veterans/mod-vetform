<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class FastPayment extends BasePage
{
    protected $_title = 'Have you received an AFCS Fast Payment?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/fast-payment',
                    'label' => 'Received an AFCS Fast Payment',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Yes', 'value' => Constant::YES, 'children' => []],
                        ['label' => 'No', 'value' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you have recieved an AFCS Fast Payment',
                    ],
                ],
            ],
        ];
    }
}


//<x-radio-group label="Which service did they last serve in?"
//                       field="service"
//                       :questionTag="'h2'"
//                       :selected="session('service', null)"
//                       :options="$branches"></x-radio-group>
