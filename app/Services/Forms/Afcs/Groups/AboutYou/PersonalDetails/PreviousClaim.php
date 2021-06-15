<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class PreviousClaim extends BasePage
{
    protected string $_title = 'Have you made a war pension or armed forces compensation scheme claim previously?';

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
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you have previously made a claim',
                    ],
                ],
            ],
        ];
    }
}
