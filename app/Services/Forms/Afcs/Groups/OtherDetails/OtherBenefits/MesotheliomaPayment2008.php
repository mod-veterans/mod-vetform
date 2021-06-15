<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class MesotheliomaPayment2008 extends BasePage
{
    protected string $_title = 'Have you received payment under the Diffuse Mesothelioma 2008 Scheme?';

    public string $summary = '
    <p class="govuk-body">
    You may be claiming for this if you were diagnosed with diffuse mesothelioma before 25 July 2012.
    </p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/mesothelioma-payment-2008',
                    'label' => 'Have you received payment under the Diffuse Mesothelioma 2008 Scheme?',
                    'hideLabel' => true,
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Make a selection',
                    ],
                ],
            ]
        ];
    }
}
