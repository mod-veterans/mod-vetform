<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim;


use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllness;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessAddress;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessCondition;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessDate;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessDueto;
use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails\ClaimIllnessRelated;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class ClaimDetails extends BaseTask
{
    use Stackable;

    protected $summaryPage = null;
    protected $postTask = null;

    protected string $name = 'Claim and medical details';

    protected string $_title = 'Claim and medical details';

    protected $_addStackLabel = 'Add a claim';

    protected $_preTask = [
        [
            'type' => 'body',
            'content' => 'This form allows you to make multiple claims based on individual injuries, illnesses or conditions that have occured at different points in time as a result of your service.'
        ],
        [
            'type' => 'body',
            'content' => 'For a specific accident or incident you can add all of the injuries and conditions sustained in a single claim.'
        ],
    ];


    /**
     * @return void
     */
    function setPages(): void
    {
        $this->_pages = [
            0 => [
                'page' => new ClaimIllness($this->namespace),
                'next' => function () {
                    session()->save();
                    $field = $this->pages[0]['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack'));

                    if ($answers[$field] == 'A condition, injury or illness that is the result of a specific accident or incident')
                        return 'claim-accident-condition';

                    return 'claim-illness-condition';
                },
            ],
            'claim-illness-condition' => [
                'page' => new ClaimIllnessCondition($this->namespace),
                'next' => 'claim-illness-surgery-address',
            ],
            'claim-illness-surgery-address' => [
                'page' => new ClaimIllnessAddress($this->namespace),
                'next' => 'claim-illness-date'
            ],
            'claim-illness-date' => [
                'page' => new ClaimIllnessDate($this->namespace),
                'next' => 'claim-illness-condition-related'
            ],
            'claim-illness-condition-related' => [
                'page' => new ClaimIllnessRelated($this->namespace),
                'next' => 'claim-illness-condition-dueto'
            ],
            'claim-illness-condition-dueto' => [
                'page' => new ClaimIllnessDueto($this->namespace),
                'next' => function () {
                    session()->save();
                    $field = $this->pages[0]['page']->questions[0]['options']['field'];
                    $answers = $this->getStackBranch(request('stack'));

                    if ($answers[$field] == 'A condition, injury or illness that is the result of a specific accident or incident')
                        return 'claim-accident-condition';

                    return 'claim-illness-first-medical-attention-date';
                }
            ],

            'claim-accident-condition' => [

            ]
        ];
    }
}
