<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;


class NomineeDetails extends \App\Services\Forms\BasePage
{
    protected string $_title = 'What legal authority do you have to make a claim on behalf of the person named on?';

    public string $summary = '<p class="govuk-body">E.g. Power of Attorney held.</p>
                        <p class="govuk-body">Please upload a copy of the legal authority document you hold in the?
                         Upload Documents? section later in this application.</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/nominee-details',
                    'label' => 'What legal authority do you have to make a claim on behalf of the person named on?',
                    'hideLabel' => true,
                    'characterLimit' => 100,
                    'validation' => 'required|max:100',
                    'messages' => [
                        'required' => 'Enter your details of your legal authority',
                    ],
                ],
            ]
        ];
    }
}
