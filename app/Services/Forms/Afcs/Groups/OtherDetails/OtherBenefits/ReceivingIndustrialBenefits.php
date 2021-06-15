<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ReceivingIndustrialBenefits extends BasePage
{
    protected string $_title = 'Are you receiving Industrial Injuries Disablement Benefit (IIDB)?';

    public string $summary = '
    <p class="govuk-body">
    You may receive an Industrial Injuries Disablement Benefit (IIDB) if you became ill
    or are disabled because of an accident or disease either at work or on an approved
    employment training scheme or course.
    </p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/industrial-benefits',
                    'label' => 'Are you receiving Industrial Injuries Disablement Benefit',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Make a selection',
                    ],
                ],
            ]
        ];
    }
}
