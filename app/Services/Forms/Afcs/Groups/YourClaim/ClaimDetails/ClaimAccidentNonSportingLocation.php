<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingLocation extends BasePage
{
    protected string $_title = 'Where were you when the incident happened?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/non-sporting-location',
                    'label' => 'Where were you when the incident happened?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Operations location overseas', 'children' => []],
                        ['label' => 'Operations location UK', 'children' => []],
                        ['label' => 'Home base', 'children' => []],
                        ['label' => 'Accommodation whilst on Operations', 'children' => []],
                        ['label' => 'Accommodation on home base', 'children' => []],
                        ['label' => 'An off-duty location', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select an option which applies',
                    ],
                ],
            ]
        ];
    }
}
