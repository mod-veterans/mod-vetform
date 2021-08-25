<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class PensionScheme extends BasePage
{
    protected string $_title = 'Which armed forces pension scheme are you a member of?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'checkbox-group',
                'options' => [
                    'field' => $this->namespace . '/pension-scheme',
                    'label' => 'Pension scheme',
                    'hideLabel' => true,
                    'hint' => 'Select your scheme.',
                    'validation' => 'required',
                    'options' => [
                        ['label' => 1975, 'value' => 1975, 'children' => []],
                        ['label' => 2005, 'value' => 2005, 'children' => []],
                        ['label' => 2015, 'value' => 2015, 'children' => []],
                        ['label' => 'None', 'value' => 'None', 'children' => []],
                        ['label' => 'Other', 'value' => 'Other', 'children' => []],
                        ['label' => 'Don\'t Know', 'value' => 'Don\'t Know', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select your pension scheme',
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
