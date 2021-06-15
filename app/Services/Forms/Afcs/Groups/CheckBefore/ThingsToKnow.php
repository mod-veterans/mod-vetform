<?php


namespace App\Services\Forms\Afcs\Groups\CheckBefore;


use App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow\Overview;
use App\Services\Forms\BaseTask;

class ThingsToKnow extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected string $name = 'Things to know before you start';
    protected string $_title = 'Things to know before you start';
    protected $_hasSummary = false;

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new Overview($this->namespace),
            ]
        ];
    }
}
