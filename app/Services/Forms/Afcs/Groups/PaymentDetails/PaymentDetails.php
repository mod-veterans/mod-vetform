<?php


namespace App\Services\Forms\Afcs\Groups\PaymentDetails;


use App\Services\Forms\BaseTask;

class PaymentDetails extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected $name = 'Payment details';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        // TODO: Implement setPages() method.
    }
}
