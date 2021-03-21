<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou;


use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceName;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceNumber;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class ServiceDetails extends BaseTask
{
    use Stackable;

    protected $summaryPage = null;

    protected $postTask = null;

    protected $name = 'Service details';

    protected $_title = 'Service details';

    protected $_addStackLabel = 'Add a period of service';

    protected $_preTask = [
        [
            'type' => 'body',
            'content' => 'You can add details for more than one period of service.'
        ],
        [
            'type' => 'inset',
            'content' => 'A period of service is defined as a term of service between enlistment and discharge within one service type.'
        ]
    ];

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->pages = [
            0 => [
                'page' => new ServiceName($this->namespace),
                'next' => 1,
            ],
            1 => [
                'page' => new ServiceNumber($this->namespace),
                'condition' => false
            ]
        ];
    }
}
