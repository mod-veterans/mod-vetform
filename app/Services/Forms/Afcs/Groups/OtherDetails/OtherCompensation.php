<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails;


use App\Services\Forms\BaseTask;

class OtherCompensation extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected $name = 'Other compensation';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        // TODO: Implement setPages() method.
    }
}
