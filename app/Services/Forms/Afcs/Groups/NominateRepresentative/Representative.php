<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative;


use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative\RepresentativeAddress;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative\RepresentativeRole;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative\RepresentativeSelection;
use App\Services\Forms\BaseTask;

class Representative extends BaseTask
{
    protected string $name = 'Do you want to nominate a representative?';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new RepresentativeSelection($this->namespace),
                'next' => function () {
                    $field = $this->_pages[0]['page']->questions[0]['options']['field'];

                    return session($field, null) == 'No' ? null : 'representative-address';
                },
            ],
            'representative-address' => [
                'page' => new RepresentativeAddress($this->namespace),
                'next' => 'representative-role'
            ],
            'representative-role' => [
                'page' => new RepresentativeRole($this->namespace),
            ]
        ];
    }
}
