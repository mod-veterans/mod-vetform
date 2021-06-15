<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class MesotheliomaPayment extends BasePage
{
    protected string $_title = 'Have you received payment under the Diffuse Mesothelioma Payment Scheme (DMPS)?';

    public string $summary = '
    <p class="govuk-body">
    You may be claiming for this if you were diagnosed with diffuse mesothelioma on or after 25 July 2012.
    </p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/mesothelioma-payment',
                    'label' => 'Have you received payment under the Diffuse Mesothelioma Payment Scheme (DMPS)?',
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
