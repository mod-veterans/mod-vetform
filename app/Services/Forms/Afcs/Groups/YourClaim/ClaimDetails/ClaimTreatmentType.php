<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimTreatmentType extends BasePage
{
    protected string $_title = 'What was/is the type of treatment?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/claim-treatment-type',
                    'label' => 'What was/is the type of treatment?',
                    'hideLabel' => true,
                ],
            ]
        ];
    }
}
