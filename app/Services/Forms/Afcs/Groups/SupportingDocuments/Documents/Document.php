<?php


namespace App\Services\Forms\Afcs\Groups\SupportingDocuments\Documents;


use App\Services\Forms\BasePage;
use App\Services\Traits\Stackable;

class Document extends BasePage
{
    use Stackable;

    protected $title = 'Supporting documents';

    /**
     *
     */
    function setQuestions(): void
    {
        $this->_questions = [
            'name' => [
                'component' => 'fileUpload',
                'options' => [
                    'field' => 'name',
                    'label' => 'Upload file',
                    'validation' => 'required',
                    'autocomplete' => 'given_name'
                ]
            ]
        ];
    }
}
