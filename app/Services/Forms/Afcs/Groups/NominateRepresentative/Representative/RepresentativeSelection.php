<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class RepresentativeSelection extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'Do you want to nominate a representative?';

    public string $summary = '<p class="govuk-body">If someone is helping you make your claim, e.g. a charity welfare officer
 or a solicitor, you can nominate them as a representative to ask us how your claim is progressing or receive copies of
 our enquiries and decision letters.</p>
                       <p class="govuk-body">We can only give them this information if we have your written agreement.
                       When a decision on your claim is made, we will, with your agreement, send a copy of the
                        notification to your nominated representative.</p>
                       <p class="govuk-body"><strong>Please be aware</strong> that the decision notification contains
                       personal information. This may include details of your bank or building society account and any
                       medical conditions that we have considered as part of your claim. It may also show how we have
                       calculated your award.</p>
                       <p class="govuk-body">You can nominate 1 representative here but you can add further
                       representatives or change their details by writing to us at any time.</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/nominated-representative',
                    'label' => 'Would you like to nominate a representative?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you would like to nominate a representative',
                    ],
                ],
            ]
        ];
    }
}
