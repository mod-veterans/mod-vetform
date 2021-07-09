<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentSportingRelated extends BasePage
{
    protected string $_title = 'Is your illness/condition related to';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/sporting-related',
                    'label' => 'Is your illness/condition related to',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Duties - Operations overseas', 'children' => []],
                        ['label' => 'Duties - Operations UK', 'children' => []],
                        ['label' => 'Trade', 'children' => []],
                        ['label' => 'Misconduct by others', 'children' => []],
                        ['label' => 'Consequential to another medical condition', 'children' => []],
                        ['label' => 'Fitness training', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select an option which applies',
                    ],
                ],
            ]
        ];
    }
}
