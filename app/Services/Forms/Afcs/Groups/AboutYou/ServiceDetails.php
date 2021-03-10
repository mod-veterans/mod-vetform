<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou;


use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceName;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails\ServiceNumber;
use App\Services\Forms\BaseTask;

class ServiceDetails extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected $name = 'Service details';

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
