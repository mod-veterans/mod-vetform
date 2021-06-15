<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim;


use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class HospitalVisit extends BaseTask
{
    use Stackable;

    protected string $name = 'Hospital treatments';

    protected string $_title = 'Claim and medical details';


    protected function setPages()
    {
        // TODO: Implement setPages() method.
    }
}
