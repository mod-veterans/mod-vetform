<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\BaseGroup;

class PaymentDetails extends BaseGroup
{
    /**
     * @var string
     */
    protected string $name = 'Your payment details';

    /**
     * PaymentDetails constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->_tasks = [
            new PaymentDetails\PaymentDetails($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
