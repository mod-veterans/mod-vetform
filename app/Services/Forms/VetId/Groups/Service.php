<?php


namespace App\Services\Forms\VetId\Groups;


use App\Services\Forms\VetId\Groups\AboutYou\ApplicantPersonal;
use App\Services\Forms\VetId\Groups\Service\ServiceDetails;

class Service extends \App\Services\Forms\BaseGroup
{
    /**
     * @var string
     */
    protected string $name = 'Your Service Details';

    /**
     * AboutYou constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        parent::__construct($namespace);

        $this->_tasks = [
            new ServiceDetails($this->namespace),
        ];
    }
}
