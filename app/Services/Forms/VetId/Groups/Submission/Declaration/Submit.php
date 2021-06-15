<?php


namespace App\Services\Forms\VetId\Groups\Submission\Declaration;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class Submit extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'Declaration and Submission';

    /**
     * @var string
     */
    public string $summary = '
    <h2>Declaration</h2>
    <p>I confirm that if I have signed a UKSF Confidentiality Contract, I have been careful not to make unauthorised disclosures. I have sought advice from the Disclosure Cell and have EPAW to make such statements.</p>
    <p>I confirm the information I have given is accurate and complete to the best of my knowledge and belief.</p>
    <p>I understand that the information and personal data I have provided on this form, and any information and personal data I provide subsequently may be:</p>
    <ul>
        <li>Used by the MOD in connection with my claim, or any subsequent reconsideration, review or appeal, under the Armed Forces Compensation Scheme (AFCS) or the Service Pensions Order (SPO) or any other schemes administered by Veterans UK.</li>
        <li>Passed to any organisation contracted to provide medical services to the MOD and any qualified medical practitioner asked by the MOD to provide specialist advice</li>
        <li>Passed to the DWP.</li>
        <li>Used by the MOD and its agents in connection with all matters relating to this or future claims, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or other schemes administered by Veterans UK, and other claims against the MOD, and by other Government Departments, which have a legitimate interest in this information, for example, for the prevention and detection of crime.</li>
    </ul>

    <h2>I agree</h2>
    <ul>
        <li>To repay any sum paid as a result of this claim in the event that an overpayment is made for any reason.</li>
    </ul>';

    public string $closingStatement = '<p class="govuk-body govuk-!-margin-top-4">When you are ready to submit your completed application,
    please click the button below. Please note that you will not be able to change any of the information you have
    entered after a claim is submitted.</p>';

    public string $submitLabel = 'Submit your medal claim';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/declaration-agreed',
                    'label' => 'I have read and understood the above declaration',
                    'value' => Constant::YES,
                    'validation' => 'required',
                ],
            ]
        ];
    }
}
