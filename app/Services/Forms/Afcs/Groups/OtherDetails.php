<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;
use App\Services\Forms\BaseGroup;

class OtherDetails extends BaseGroup
{
    /**
     * @var string
     */
    protected $name = 'Other details';

    /**
     * @var string[]
     */
    protected $tasks = [];

    /**
     * OtherDetails constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->tasks = [
            new OtherCompensation($this->namespace),
            new OtherBenefits($this->getId()),
        ];
        parent::__construct($namespace);
    }
}
