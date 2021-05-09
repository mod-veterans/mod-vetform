<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails;


use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits\ReceivingBenefits;
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
        $this->pages = [
            0 => [
                'page' => new ReceivingBenefits($this->namespace),
//                'next' => function () {

//                    return null;
//                    session()->save();
//                    $field = $this->pages[0]['page']->questions[0]['options']['field'];
//
//                    return session($field, null) == 'No' ? null : 'payment-details';
//                },
            ],
//            'payment-details' => [
//                'page' => new ReceivingPayments($this->namespace),
//                'next' => null
//            ]
        ];
    }
}
