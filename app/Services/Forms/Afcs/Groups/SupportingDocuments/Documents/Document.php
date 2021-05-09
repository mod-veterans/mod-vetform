<?php


namespace App\Services\Forms\Afcs\Groups\SupportingDocuments\Documents;


use App\Services\Forms\BasePage;

class Document extends BasePage
{
    protected string $_title = 'Supporting documents';

    /**
     *
     */
    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'fileUpload',
                'options' => [
                    'field' => $this->namespace . '/file',
                    'label' => 'Upload file',
                    'validation' => 'required|file',
                ]
            ]
        ];
    }
}
