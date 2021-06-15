<?php


namespace App\Services\Forms\Medals\Groups\Service;

use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use App\Services\Forms\Medals\Groups\Service\Branch\ServiceBranch;
use App\Services\Forms\Medals\Groups\Service\Branch\ServiceMedal;
use App\Services\Forms\Medals\Groups\Service\Branch\ServiceMedalRaf;

class ServiceDetails extends BaseTask
{
    public string $name = 'Your distinguished service';

    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new ServiceBranch($this->namespace),
                 'next' => function () {
        $field = $this->_pages[0]['page']->questions[0]['options']['field'];

        return session($field, null) == 'Royal Air Force' ? 'service-medal-raf' : 'service-medal';
    },

            ],
            'service-medal' => [
                'page' => new ServiceMedal($this->namespace),
            ],
            'service-medal-raf' => [
                'page' => new ServiceMedalRaf($this->namespace),
            ]
        ];
    }
}
