<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative;


use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\ApplicantSelection;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\NomineeAddress;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant\NomineeDetails;
use App\Services\Forms\BaseTask;

class Applicant extends BaseTask
{
    protected string $name = 'Who is making this application?';

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->pages = [
            0 => [
                'page' => new ApplicantSelection($this->namespace),
                'next' => function () {
                    session()->save();
                    $field = $this->pages[0]['page']->questions[0]['options']['field'];

                    return session($field, null) == 'The person named on this claim is making the application.' ? null : 'nominee-address';
                },
            ],

            'nominee-address' => [
                'page' => new NomineeAddress($this->namespace),
                'next' => 'nominee-details'
            ],

            'nominee-details' => [
                'page' => new NomineeDetails($this->namespace),
            ]
        ];
    }
}
