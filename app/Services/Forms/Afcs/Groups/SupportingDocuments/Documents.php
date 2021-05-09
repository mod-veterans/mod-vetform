<?php


namespace App\Services\Forms\Afcs\Groups\SupportingDocuments;


use App\Services\Forms\Afcs\Groups\SupportingDocuments\Documents\Document;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class Documents extends BaseTask
{
    use Stackable;

    protected string $name = 'Supporting documents';

    protected $summaryPage = null;

    protected $postTask = null;

    protected string $_title = 'Uploading supporting documents';

    protected $_addStackLabel = 'Upload a document';

    protected $_preTask = [
//        ['type' => 'body', 'content' => 'Uploading supporting documents'],
        ['type' => 'body', 'content' => 'Once submitted, your claim will be fully investigated and we will gather any information we need to make a decision.  However, if you have supporting documents or relevant evidence already in your possession, you can upload copies here.  Below is a list of examples of documents that will help us make a decision.  Please only send us documents related to the circumstances of your claim or the medical condition(s) you are claiming for.'],
        ['type' => 'list', 'content' => [
            '<strong>Letters and reports from people who have treated you for the condition(s) you are claiming for.</strong> For example GPs, hospital doctors, psychiatrists or psychologists at consultant grade, occupational therapists, physiotherapists',
            '<strong>Service documents</strong> such as Unit/Company orders, admin instructions, authorisation papers, accident report forms, hurt certificates, service medical records.',
            '<strong>Medical test results including</strong> scans, audiology, reports of x-rays (but not the x-rays themselves)',
            '<strong>Letters about other compensation received for the conditions</strong> you are claiming for on this application, including criminal injuries compensation, civil negligence compensation, industrial injuries disablement benefit.',
            '<strong>Documents showing legal authority to act on behalf of others,</strong> if you are making this application on behalf of someone else.'
        ]],
        ['type' => 'title', 'content' => 'I don’t have any evidence.'],
        ['type' => 'body', 'content' => 'I only have paper copies'],
        ['type' => 'body', 'content' => 'Upload a file'],
        ['type' => 'body', 'content' => 'I prefer to send copies in the post'],
        ['type' => 'body', 'content' => 'If you have too many documents to upload, you can send us copies in the post to.'],
        ['type' => 'address', 'content' => [
            'Veterans UK',
            'Ministry of Defence',
            'Norcross',
            'Thornton Cleveleys',
            'FY5 3WP',
            'United Kingdom'
        ]],
        ['type' => 'body', 'content' => 'Please include a covering letter quoting your name, address, date of birth and National Insurance Number on it.']
    ];

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->pages = [
            0 => [
                'page' => new Document($this->namespace)
            ],
        ];
    }
}
