<?php


namespace App\Services\Forms\Afcs\Groups\CheckBefore;


use App\Services\Forms\BaseTask;

class ThingsToKnow extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected $name = 'Things to know before you start';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        // TODO: Implement setPages() method.
    }
}
