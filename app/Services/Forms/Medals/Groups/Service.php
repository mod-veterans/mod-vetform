<?php


namespace App\Services\Forms\Medals\Groups;


use App\Services\Forms\Medals\Groups\AboutYou\ApplicantPersonal;
use App\Services\Forms\Medals\Groups\Service\ServiceDetails;

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
