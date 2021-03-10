<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\BaseGroup;

class PaymentDetails extends BaseGroup
{
    /**
     * @var string
     */
    protected $name = 'Your payment details';

    /**
     * @var PaymentDetails\PaymentDetails[]|array
     */
    protected $tasks = [];

    /**
     * PaymentDetails constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->tasks = [
            new PaymentDetails\PaymentDetails($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
