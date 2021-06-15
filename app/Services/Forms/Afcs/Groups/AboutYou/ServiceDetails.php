<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou;


use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceBranch;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceDischarge;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceEnlistmentDate;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceName;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceNumber;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceRank;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceTrade;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceType;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\UnitAddress;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class ServiceDetails extends BaseTask
{
    use Stackable;

    protected $summaryPage = null;

    protected $postTask = null;

    protected string $name = 'Service details';

    protected string $_title = 'Service details';

    protected $_addStackLabel = 'Add a period of service';

    protected $_preTask = [
        [
            'type' => 'body',
            'content' => 'We need to know about each period of service you have had in HM Armed Forces. A period of
                         service is defined as a term of service between enlistment and discharge within one service type.'
        ],

        [
            'type' => 'body',
            'content' => 'If you have had more than one period of service,or changed branches services for example from
                         Royal Navy to Army, please tell us about each period separately. You will be able to add further
                         periods of service at the end of this section.'
        ],

    ];

    public function __get($property) {
        if($property == 'mnemonic') {
            return 'afcs/about-you/service-details/service-branch/service-branch';
        } else {
            return parent::__get($property);
        }
    }

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new ServiceName($this->namespace),
                'next' => 'service-number',
            ],
            'service-number' => [
                'page' => new ServiceNumber($this->namespace),
                'next' => 'service-branch',
            ],
            'service-branch' => [
                'page' => new ServiceBranch($this->namespace),
                'next' => 'service-type',
            ],
            'service-type' => [
                'page' => new ServiceType($this->namespace),
                'next' => 'service-rank',
            ],
            'service-rank' => [
                'page' => new ServiceRank($this->namespace),
                'next' => 'service-trade',
            ],
            'service-trade' => [
                'page' => new ServiceTrade($this->namespace),
                'next' => 'service-enlistment-date',
            ],
            'service-enlistment-date' => [
                'page' => new ServiceEnlistmentDate($this->namespace),
                'next' => 'service-discharge',
            ],
            'service-discharge' => [
                'page' => new ServiceDischarge($this->namespace),
                'next' => 'unit-address',
            ],
            'unit-address' => [
                'page' => new UnitAddress($this->namespace)
            ]
        ];
    }
}
