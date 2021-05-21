<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimIllnessNote extends BasePage
{
    protected string $_title = 'Why is your condition related to your armed forces service?';

    public string $summary = '
    <p class="govuk-body">Tell us in your own words why you feel your claimed medical condition or injury is caused or
    made worse by your service in the Armed Forces. Include information you think is relevant but do not include details
    of operations. If you are claiming for a Road Traffic Accident and you were not on a direct route between your
    starting point and destination, please tell us why here.</p>

    <p class="govuk-body"><strong>Note:</strong> You MUST NOT include information classified as Secret or above. If you
    need to tell us information classified as Secret or above, please write "Classified  Information" we will contact
    you after we receive your claim.</p>

    <p class="govuk-body">If you have served or are serving (whether directly or in a support role) with the United
    Kingdom Special Forces (UKSF), you must seek advice from the MOD A Block Disclosure Cell BEFORE completing this
    section. The Disclosure Cell can be contacted by emailing MAB-J1-Disclosures-ISA-Mailbox@mod.gov.uk.</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/claim-illness-note',
                    'label' => 'Why is your condition related to your armed forces service?',
                    'hideLabel' => true,
                    'validation' => 'required|max:1500',
                    'message' => [
                        'required' => 'Enter why your condition is related to your armed forces service'
                    ]
                ],
            ]
        ];
    }
}
