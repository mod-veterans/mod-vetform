<?php


namespace App\Services\Forms\Afcs\Groups\ApplicationSubmission\Declaration;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class Submission extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'Declaration and Submission';

    /**
     * @var string
     */
    public string $summary = '
    <h2 class="govuk-heading-m">Use of email</h2>
    <p class="govuk-body">Veterans UK is happy to conduct correspondence with customers using a nominated email address if that is their preference. There are some types of personal information we would not be able to include in email correspondence. Please read the information below.</p>
    <p class="govuk-body">I authorise Veterans UK to use email whenever possible in its correspondence with me using my nominated email address entered. I accept that information including bank account details, National Insurance Numbers, medical details and any other information that could compromise my identity will not be included in emails.</p>
    <p class="govuk-body">I understand that correspondence transmitted by email may be open to abuse because it is transmitted over an unsecured network. I accept that the MOD will not be liable for any loss, interception or unauthorised use of information transmitted this way.</p>
    <p class="govuk-body">If you would also like us to send enquiries we have during your claim via email, please tick the box below.  If you do not tick this box, we will contact you via post.</p>

    <p class="govuk-body">If at any time in the future your email address should change then please tell us as soon as possible. Failure to tell us will result in Veterans UK being unable to release documents to you through the internet.</p>

    <h2 class="govuk-heading-m">Declaration</h2>
    <p class="govuk-body">I confirm that if I have signed a UKSF Confidentiality Contract, I have been careful not to make unauthorised disclosures. I have sought advice from the Disclosure Cell and have EPAW to make such statements.</p>
    <p class="govuk-body">I confirm the information I have given is accurate and complete to the best of my knowledge and belief.</p>
    <p class="govuk-body">I understand that the information and personal data I have provided on this form, and any information and personal data I provide subsequently may be:</p>
    <ul class="govuk-list govuk-list--bullet">
        <li>Used by the MOD in connection with my claim, or any subsequent reconsideration, review or appeal, under the Armed Forces Compensation Scheme (AFCS) or the Service Pensions Order (SPO) or any other schemes administered by Veterans UK.</li>
        <li>Passed to any organisation contracted to provide medical services to the MOD and any qualified medical practitioner asked by the MOD to provide specialist advice</li>
        <li>Passed to the DWP.</li>
        <li>Used by the MOD and its agents in connection with all matters relating to this or future claims, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or other schemes administered by Veterans UK, and other claims against the MOD, and by other Government Departments, which have a legitimate interest in this information, for example, for the prevention and detection of crime.</li>
    </ul>

    <h2 class="govuk-heading-m">I understand that:</h2>
    <ul class="govuk-list govuk-list--bullet">
        <li>I must immediately tell the MOD of anything that may affect my entitlement to, or the amount of, an award under the AFCS, a war pension, a supplementary allowance or any survivors’ benefits paid under the SPO, or an award paid under any other scheme administered by Veterans UK, including any changes of address.</li>
        <li>If I knowingly give false information, I may be liable to prosecution.</li>
    </ul>

    <h2 class="govuk-heading-m">In order to process your application</h2>
    <ul class="govuk-list govuk-list--bullet">
        <li>The MOD and,</li>
        <li>any doctor advising the MOD and,</li>
        <li>any organisation contracted to provide medical services to the MOD and any doctor providing services to that organisation.
            <p class="govuk-body govuk-!-margin-top-4"><strong>maybe required to contact:</strong></p>
        </li>
        <li>any doctor who has provided treatment and,</li>
        <li>any hospital or similar place and,</li>
        <li>anyone else who has provided investigation or treatment (such as a physiotherapist)
        for copies of all medical records (including those in sealed envelopes) and any other information required to consider my claim, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or any other schemes administered by Veterans UK.</li>
    </ul>

    <h2 class="govuk-heading-m">And that the MOD may</h2>
    <ul class="govuk-list govuk-list--bullet">
        <li>Disclose medical records, and any information about my claim, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or any other schemes administered by Veterans UK, to any organisation contracted to provide medical services to the MOD and any qualified medical practitioner or consultant asked by the MOD to provide specialist advice. I also agree that the MOD may send copies of medical information obtained for the purposes of my claim, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or any other schemes administered by Veterans UK to my General Practitioner. I understand that the information will be retained by the MOD, either as a written record, or on a secure database, and may be used in future if it is necessary to reconsider or review my claim and any award made.
    </ul>

    <h2 class="govuk-heading-m">I agree</h2>
    <ul class="govuk-list">
        <li>To repay any sum paid as a result of this claim in the event that an overpayment is made for any reason.</li>
    </ul>';

    public string $closingStatement = '<p class="govuk-body govuk-!-margin-top-4">When you are ready to submit your completed application,
    please click the button below. Please note that you will not be able to change any of the information you have
    entered after a claim is submitted.</p>';

    public string $submitLabel = 'Submit your application';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/enquiries-by-email',
                    'label' => 'I agree to Veterans UK sending claim enquiries to me via email.',
                    'summaryLabel' => 'Send claim enquiries via email',
                    'hint' => 'I would like Veterans UK to send claim enquiries to me via email. ',
                    'value' => Constant::YES,
                    'messages' => [
                        'in' => 'You must read and understand this declaration'
                    ]
                ],
            ],
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/declaration-agreed',
                    'label' => 'I have read and understood the above declaration',
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
