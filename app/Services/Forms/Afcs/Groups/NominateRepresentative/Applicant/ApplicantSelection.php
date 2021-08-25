<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;


use App\Services\Forms\BasePage;
use Carbon\Carbon;

class ApplicantSelection extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'Who is making this application?';

    public string $summary = '<p class="govuk-body">The person named in this application must be the person who completes the declaration and
                          final submission when all sections are completed.</p>
                       <p class="govuk-body">A claim may only be submitted on behalf of someone else if you have a Power of Attorney
                          or other legal authority to act on their behalf.</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/nominated-applicant',
                    'label' => 'Who is making this application?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'The person named on this claim is making the application.', 'children' => []],
                        ['label' => 'I am making an application on behalf of the person named on this application and I have legal authority to act on their behalf.', 'children' => []],
                        ['label' => 'I am helping someone else make this application.', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select who is making this application',
                    ],
                ],
            ],
            [
                'component' => 'hidden-field',
                'options' => [
                    'field'      => $this->namespace . '/application-start-date',
                    'value'      => session($this->namespace . '/application-start-date', Carbon::today()->format('d F Y')),
                    'label'      => 'Date application initiated',
                    'validation' => 'required',
                ],
            ],
        ];
    }
}
