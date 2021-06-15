<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class PneumoconisosPayment extends BasePage
{
    protected string $_title = 'Have you received payment under The Workers Compensation 1979 Pneumoconiosis Act?';

    public string $summary = '
    <p class="govuk-body">
    The Pneumoconiosis etc. (Workers’ Compensation) Act 1979 provides lump sum payments to sufferers of certain
    dust related industrial diseases.
    </p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/pneumoconisos-payment',
                    'label' => 'Have you received payment under The Workers Compensation 1979 Pneumoconiosis Act?',
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
