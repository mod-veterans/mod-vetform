<?php


namespace App\Services\Forms\Afcs\Groups\PaymentDetails;


use App\Services\Constant;
use App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails\BankDetails;
use App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails\BankLocation;
use App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails\BankOverseas;
use App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails\BankUnitedKingdom;
use App\Services\Forms\BaseTask;

class PaymentDetails extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected string $name = 'Payment details';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->pages = [
            0 => [
                'page' => new BankDetails($this->namespace),
                'next' => function () {
                    session()->save();
                    $field = $this->pages[0]['page']->questions[0]['options']['field'];

                    return session($field, null) == Constant::YES ? 'bank-location' : null;
                },
            ],
            'bank-location' => [
                'page' => new BankLocation($this->namespace),
                'next' => function () {
                    session()->save();
                    $field = $this->pages['bank-location']['page']->questions[0]['options']['field'];

                    return session($field, null) == 'In the United Kingdom' ? 'bank-united-kingdom' : 'bank-overseas';
                },
            ],
            'bank-united-kingdom' => [
                'page' => new BankUnitedKingdom($this->namespace),
                'next' => null
            ],
            'bank-overseas' => [
                'page' => new BankOverseas($this->namespace),
                'next' => null
            ]
        ];
    }
}
