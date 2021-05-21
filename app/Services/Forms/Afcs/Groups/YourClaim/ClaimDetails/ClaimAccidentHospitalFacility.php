<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentHospitalFacility extends BasePage
{
    protected string $_title = 'Did you go to, or were you taken to, a hospital or medical facility?';

    public string $summary = '<p class="govuk-body">Please only tell us about treatment you received for the
                              injury/condition that you are claiming for</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/sporting-hospital-facility',
                    'label' => 'Did you go to, or were you taken to, a hospital or medical facility?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select an option which applies',
                    ],
                ],
            ]
        ];
    }
}
