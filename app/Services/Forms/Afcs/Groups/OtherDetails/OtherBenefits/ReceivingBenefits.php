<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;


use App\Services\Forms\BasePage;

class ReceivingBenefits extends BasePage
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
        $this->_questions = [
            [
                'component' => 'checkbox-group',
                'options' => [
                    'field' => $this->namespace . '/receiving-benefits',
                    'label' => 'Are you receiving any of the following?',
                    'hideLabel' => true,
                    'options' => [
                        ['label' => 'Tax credits paid to you or your family', 'children' => []],
                        ['label' => 'Housing Benefit or Council Tax Benefit', 'children' => []],
                        ['label' => 'Industrial Injuries Disablement Benefit', 'children' => []],
                    ],
                ],
            ]
        ];
    }
}
