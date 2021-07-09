<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative;


use App\Services\Forms\BasePage;

class RepresentativeRole extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'What is your representative\'s role?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/representative-role',
                    'label' => 'What is your representative\'s role?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Veterans UK welfare manager', 'children' => []],
                        ['label' => 'Charity welfare manager', 'children' => []],
                        ['label' => 'Solicitor', 'children' => []],
                        ['label' => 'Friend or relative', 'children' => []],
                        ['label' => 'Other', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you would like to nominate a representative',
                    ],
                ],
            ]
        ];
    }
}
