<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;


use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class MedicalTreatment extends BaseTask
{
    use Stackable;

    protected string $_title = 'Other Medical Treatment';

    public function setQuestions(): void
    {
        $this->_questions = [];
    }
}
