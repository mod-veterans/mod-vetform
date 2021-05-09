<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class PreviousClaim extends BasePage
{
    protected string $_title = 'Have you made a WPS or AFCS claim previously?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/previous-claim',
                    'label' => 'Previously made a claim',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Yes', 'value' => Constant::YES, 'children' => []],
                        ['label' => 'No', 'value' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you have previously made a claim',
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
