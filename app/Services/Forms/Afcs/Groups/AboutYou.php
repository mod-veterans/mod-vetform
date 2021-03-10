<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;
use App\Services\Forms\BaseGroup;

class AboutYou extends BaseGroup
{
    /**
     * @var string
     */
    protected $name = 'About you';

    /**
     * @var array
     */
    protected $tasks = [
    ];

    /**
     * AboutYou constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->tasks = [
            new PersonalDetails($this->namespace),
            new ServiceDetails($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
