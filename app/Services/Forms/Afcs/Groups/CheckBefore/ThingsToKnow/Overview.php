<?php


namespace App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow;


use App\Services\Forms\BasePage;

class Overview extends BasePage
{
    protected string $_title = 'Things you need to know before you start';

    public string $summary = '<h1 class="govuk-heading-m">Use this service to:</h1>
                        <ul>
                            <li>make a claim for an Armed Forces Compensation Scheme or War Pension Scheme payment.</li>
                            <li>This single claim service is for both schemes.</li>
                        </ul>
                        <h1 class="govuk-heading-m">Making a claim</h1>
                        <ul>
                            <li>You will be asked a series of questions about yourself, your service and the medical conditions you are claiming for.</li>
                            <li>You can make multiple claims in one application by \'adding a further claim\' within the \'claim\' section.</li>
                            <li>You can return to a partially completed application up to 3 months from when you started, providing you have fully completed the &#8220;Personal Details&#8221; section before you leave.</li>
                        </ul>
                        <h1 class="govuk-heading-m">What you need to apply</h1>
                        <p>You\'ll need:</p>
                        <ul>
                            <li>your bank, building society or credit union account details.</li>
                            <li>an email address.</li>
                            <li>details about your service in the armed forces.</li>
                            <li>information about the injury/illness you are claiming for.</li>
                            <li>letters/reports already in your possession from medical professionals who have treated you.</li>
                            <li>details of any other compensation you may have received. For example;
                                <ul>
                                    <li>Criminal Injuries Compensation.</li><li>Civil Negligence claims.</li>
                                    <li>Industrial Injuries Disablement Benefit.</li>
                                </ul>
                            </li>
                        </ul>
                        <p><strong>We don\'t need you to get any new information you do not already have. We can\'t refund any costs involved if you do this.</strong></p>
                        <h1 class="govuk-heading-m">Dates, addresses and contact details:</h1>
                        <p>Several questions ask about dates and contact details relating to your service and places you have received medical treatment.
                           Please enter details to the best of your recollection, even if they are not complete.
                           For example, if you cannot recall exact dates, provide a best estimate even if this is just a year.
                           You do not need to research details you do not already have and do not delay submitting your application.</p>
                        <h1 class="govuk-heading-m">After you apply</h1>
                        <ul>
                            <li>We will register your claim and send you an acknowledgement.</li>
                            <li>We will gather information and medical evidence to support your claim.</li>
                           <li>After careful consideration of all the evidence, a decision will be made.</li>
                            <li>We will contact you with the outcome of your claim.</li>
                        </ul>
                        <p>Depending on the nature of the injury/illness and the complexity of your claim, consideration of the evidence can take several months.
                        Please be assured we will contact you as soon as a decision is made.</p>';


    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/check-before',
                    'value' => 1,
                    'validation' => 'required',
                ],
            ],
        ];
    }
}
