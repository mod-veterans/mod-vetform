<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ReceivedCompensation extends BasePage
{
    /**
     * @var string
     */
    protected $_id = 'received-compensation';

    /**
     * @var string
     */
    protected string $_title = 'Are you claiming for or have you received compensation payments from other sources?';

    /**
     * @var string
     */
    public string $summary =
        '<p class="govuk-body">You only need to tell us about compensation for the medical conditions you are claiming for on this application.</p>
         <p class="govuk-body">Compensation includes any payments from MOD for criminal injuries; civil negligence payments received via the courts;
                               compensation from civil authorities in Great Britain and Northern Ireland for criminal injuries or any other compensation
                               payments received for the medical conditions you are claiming for.</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/received-compensation',
                    'label' => 'Are you claiming for or have you received compensation payments from other sources?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Have you received other compensation',
                    ],
                ],
            ]
        ];
    }
}
