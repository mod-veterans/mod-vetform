<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;


class ReceivingBenefits extends \App\Services\Forms\BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'Other benefits, allowances or entitlements you receive.';

    public string $summary = '<p class="govuk-body">Payments from the Armed Forces Compensation Scheme and War Pension Scheme MAY affect
                       related benefits from the Department for Work and Pensions or other authorities.
                       It is your responsibility to inform the relevant Benefit Office, local authority or
                       Tax Credit Office if you receive payments under one of their schemes.</p>';


    function setQuestions(): void
    {
        $this->questions = [];
    }
}
