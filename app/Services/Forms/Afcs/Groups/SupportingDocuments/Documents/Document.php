<?php


namespace App\Services\Forms\Afcs\Groups\SupportingDocuments\Documents;


use App\Services\Forms\BasePage;

class Document extends BasePage
{
    protected string $_title = 'Supporting documents';

    public string $summary = '
    <p class="govuk-body">You can upload PDF, PNG, JPG or DOCX file to support your application</p>
    <p class="govuk-body">Your file must be no larger than 5Mb</p>
    ';

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
                    'hideLabel' => true,
                    'validation' => 'required|file',
                ]
            ]
        ];
    }
}
