<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails;


use App\Services\Constant;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits\OtherPaymentDates;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits\OtherPaymentDetails;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits\ReceivingOtherBenefits;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits\ReceivingPayments;
use App\Services\Forms\BaseTask;

class OtherBenefits extends BaseTask
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected string $name = 'Other benefits, allowances or entitlement';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new ReceivingOtherBenefits($this->namespace),
                'next' => 'other-payment-details'
            ],
            'other-payment-details' => [
                'page' => new ReceivingPayments($this->namespace),
                'next' => function () {
                    $field = $this->pages['other-payment-details']['page']->questions[0]['options']['field'];

                    return session($field, null) == Constant::YES ? 'other-payment-dates' : null;
                },
            ],
            'other-payment-dates' => [
                'page' => new OtherPaymentDates($this->namespace),
                'next' => null
            ],
        ];
    }
}
