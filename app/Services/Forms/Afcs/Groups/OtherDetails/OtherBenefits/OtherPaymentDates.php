<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;


use App\Services\Forms\BasePage;

class OtherPaymentDates extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'Please tell us the date you received the payment(s) and the amount you received.';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/service-discharge-reason',
                    'label' => 'Diffuse Mesothelioma 2014 Scheme',
                    'validation' => 'max:100',
//                    'messages' => [
//                        'max' => 'Discharge reason must be 40 characters or fewer'
//                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/service-discharge-reason',
                    'label' => 'Diffuse Mesothelioma 2008 Scheme',
                    'validation' => 'max:100',
//                    'messages' => [
//                        'max' => 'Discharge reason must be 40 characters or fewer'
//                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/service-discharge-reason',
                    'label' => 'The Workers Compensation 1979 Pneumoconiosis Act',
                    'validation' => 'max:100',
//                    'messages' => [
//                        'max' => 'Discharge reason must be 40 characters or fewer'
//                    ],
                ],
            ]
        ];
    }
}
