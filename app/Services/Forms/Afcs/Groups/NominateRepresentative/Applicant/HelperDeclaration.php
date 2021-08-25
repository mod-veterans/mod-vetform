<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class HelperDeclaration extends BasePage
{
    protected string $_title = 'Helping someone make a claim.';

    public string $summary = '<p class="govuk-body">Thank you for telling us you are helping someone make a claim using this service.</p>
                              <p class="govuk-body">Please be aware that unless you have legal authority to do so, you cannot submit a claim on behalf of another person.</p>
                              <p class="govuk-body">You must therefore ensure that before the claim is submitted, the person named on this application:</p>
                              <ul class="govuk-list govuk-list--bullet">
                                <li>Is satisfied all questions have been answered correctly, to the best of their knowledge and understanding.</li>
                                <li>Is clear that they are the named person making the application.</li>
                                <li>Is clear they are agreeing to the legal declaration in the last section.</li>
                              </ul>
                              <p class="govuk-body">If the person named on this application also wishes to make you a nominated representative, so that we can send you a copy of letters we send them about their claim, this can be done in the next section.</p>
                              ';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/helper-declaration-agreed',
                    'label' => 'I confirm I have read and understood the above requirements.',
                    'summaryLabel' => 'Assisted claim declaration understood',
                    'value' => Constant::YES,
                    'validation' => 'required|in:'.Constant::YES,
                    'messages' => [
                        'in' => 'You must read and understand this declaration'
                    ]
                ],
            ]
        ];
    }
}
