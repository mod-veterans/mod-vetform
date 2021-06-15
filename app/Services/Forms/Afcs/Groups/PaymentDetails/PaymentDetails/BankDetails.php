<?php


namespace App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class BankDetails extends BasePage
{
    protected string $_title = 'Providing your bank account details';

    public string $summary = '<p class="govuk-body">Providing your bank account details now will speed up the payment process if your claim is successful.
                       If you would prefer not to provide your account details now, we will contact you again if any money
                       is due to you after your claim is assessed, although this will mean any payment will take longer
                       to be received by you.</p>
                       <p class="govuk-body">
                           <strong>Note for Serving Personnel only:</strong>
                           If you are currently serving and receive your pay via the JPA system, we will pay any money due into the account your salary is paid into.
                       </p>';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/bank-details',
                    'label' => 'Do you wish to provide your bank account details?',
                    'hideLabel' => false,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => 'No I am still serving so any payments will be made into my JPA salary account', 'children' => []],
                        ['label' => 'No I do not want to provide details now.  Please contact me again if my claim is successful', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you wish to provide bank account details',
                    ],
                ],
            ],
        ];
    }
}
