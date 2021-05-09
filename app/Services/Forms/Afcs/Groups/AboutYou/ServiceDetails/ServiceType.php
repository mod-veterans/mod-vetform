<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;


use App\Services\Forms\BasePage;

class ServiceType extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'What was/is your service type?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/service-type',
                    'label' => 'Select your service branch',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Regular', 'children' => []],
                        ['label' => 'Reserve (includes Full Time Reserve Service)', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select your service type',
                    ],
                ],
            ],
        ];
    }

}
