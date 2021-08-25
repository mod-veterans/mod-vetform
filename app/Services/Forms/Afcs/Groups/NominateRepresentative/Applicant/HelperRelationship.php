<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class HelperRelationship extends BasePage
{
    protected string $_title = 'What is your relationship to the person making the claim?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/helper-relationship',
                    'label' => 'Relationship to claimant',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Friend', 'children' => []],
                        ['label' => 'Relative', 'children' => []],
                        ['label' => 'Veterans Welfare Service Manager', 'children' => []],
                        ['label' => 'Charity employee', 'children' => []],
                        ['label' => 'Local Authority employee', 'children' => []],
                        ['label' => 'Other', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you have previously made a claim',
                    ],
                ],
            ],
        ];
    }
}
