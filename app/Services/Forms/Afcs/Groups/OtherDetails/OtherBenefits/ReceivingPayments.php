<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ReceivingPayments extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'Have you ever been paid any of the following?';

    public string $summary = '<p class="govuk-body">These schemes make payments for certain illnesses caused by exposure to asbestos and dust.</p>
                       <ul>
                         <li>Diffuse Mesothelioma 2014 Scheme</li>
                         <li>Diffuse Mesothelioma 2008 Scheme</li>
                         <li>The Workers Compensation 1979 Pneumoconiosis Act</li>
                       </ul>';


    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/payments',
                    'label' => 'Have you ever been paid any of the following?',
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
