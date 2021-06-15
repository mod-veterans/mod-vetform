<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class PreviousClaimReference extends BasePage
{
    protected string $_title = 'What was the claim reference number (if known)?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/previous-claim-reference',
                    'label' => 'Previous claim reference number',
                    'hideLabel' => true
                ],
            ]
        ];
    }
}
