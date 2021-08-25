<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class SaveAndReturn extends BasePage
{
    protected string $_title = 'Save and Return Later';

    public string $summary = '

                        <p class="govuk-body">As you have now completed the Personal Details section, you can now save
                        your progress and return to a part-completed application within 3 months.</p>
                        <p class="govuk-body">Your progress will be saved at the end of each page when you click on
                        "Save and continue". To exit, simply navigate away from your claim or close your browser.</p>

                        <h1 class="govuk-heading-m">To return to an application already started</h1>
                        <p class="govuk-body">To access your part-completed application after exiting, simply click on
                        "Return to an application already started" on the Start Page (under "Start Now").
                        Please note you will need to enter your:</p>
                        <ul>
                            <li>Surname</li>
                            <li>Email address</li>
                            <li>National Insurance Number</li>
                        </ul>
                        <p class="govuk-body">You will also need to have your mobile phone or access to the email
                        address you have entered as we will send an access code to you and ask you to enter that on screen.</p>

                        <h1 class="govuk-heading-m">Fully completed applications</h1>
                        <p class="govuk-body">If you fully complete your application and press "submit", your claim will
                        be sent to Veterans UK and you will no longer have access to it. You will need to contact us if
                        you wish to make any changes</p>
                       ';


    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/save-and-return',
                    'value' => 1,
                    'validation' => 'required',
                ],
            ],
        ];
    }
}
