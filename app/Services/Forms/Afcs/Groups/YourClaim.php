<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;
use App\Services\Forms\BaseGroup;

class YourClaim extends BaseGroup
{
    /**
     * @var string
     */
    protected string $name = 'Your claim';

    /**
     * YourClaim constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->_tasks = [
            new ClaimDetails($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
