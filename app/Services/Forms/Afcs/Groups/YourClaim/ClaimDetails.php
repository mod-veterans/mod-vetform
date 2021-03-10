<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim;


use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class ClaimDetails extends BaseTask
{
    use Stackable;

    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected $name = 'Claim and medical details';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        // TODO: Implement setPages() method.
    }
}
