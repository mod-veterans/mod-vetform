<?php


namespace App\Services\Forms\Afcs\Groups\SupportingDocuments;


use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;
use App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative;
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

    protected $_hasSummary = false;

    protected $_preTask = [
        ['type' => 'body', 'content' => 'Once submitted, your claim will be fully investigated and we will gather any information we need to make a decision.  However, if you have supporting documents or relevant evidence already in your possession, you can upload copies here.  Below is a list of examples of documents that will help us make a decision.  Please only send us documents related to the circumstances of your claim or the medical condition(s) you are claiming for.'],
        ['type' => 'list', 'content' => [
            '<strong>Letters and reports from people who have treated you for the condition(s) you are claiming for.</strong> For example GPs, hospital doctors, psychiatrists or psychologists at consultant grade, occupational therapists, physiotherapists',
            '<strong>Service documents</strong> such as Unit/Company orders, admin instructions, authorisation papers, accident report forms, hurt certificates, service medical records.',
            '<strong>Medical test results including</strong> scans, audiology, reports of x-rays (but not the x-rays themselves)',
            '<strong>Letters about other compensation received for the conditions</strong> you are claiming for on this application, including criminal injuries compensation, civil negligence compensation, industrial injuries disablement benefit.',
            '<strong>Documents showing legal authority to act on behalf of others,</strong> if you are making this application on behalf of someone else.'
        ]],
        ['type' => 'title', 'content' => 'I don’t have any evidence.'],
        ['type' => 'body', 'content' => 'Please don’t delay your claim by gathering evidence you don’t already have. We will make our own enquiries to get the information we need.'],
        ['type' => 'title', 'content' => 'I only have paper copies'],
        ['type' => 'body', 'content' => 'If you have a scanner or smartphone, please take a scan or an image of the document(s) and upload it/them here. '],
        ['type' => 'body', 'content' => '__stackButton__'],
        ['type' => 'body', 'content' => '__continueButton__'],
        ['type' => 'title', 'content' => 'I prefer to send copies in the post'],
        ['type' => 'body', 'content' => 'If you have too many documents to upload, you can send us copies in the post to.'],
        ['type' => 'address', 'content' => [
            'Veterans UK',
            'Ministry of Defence',
            'Norcross',
            'Thornton Cleveleys',
            'FY5 3WP',
            'United Kingdom'
        ]],
        ['type' => 'body', 'content' => 'Please include a covering letter quoting your name, address, date of birth and National Insurance Number on it.'],
    ];

    public function __construct($namespace) {

        $this->mnemonic =  [
            '/documents/document/file' => 'mnemonic'
        ];
        $this->mnemonicCount = false;
        $this->_addStackLabel = 'Upload a document';
        $this->_addSubsequentStackLabel = 'Upload another document';

        parent::__construct($namespace);
    }

    public function __get($value)
    {
        if ($value == 'mnemonic') {
            return [
                '/documents/document/file' => 'mnemonic'
            ];
        } else {
            return parent::__get($value);
        }
    }

    protected array $_requiredTasks = [
        ThingsToKnow::class,
        Applicant::class,
        Representative::class,
        PersonalDetails::class
    ];

    /**
     * @return mixed
     */
    protected function setPages()
    {
        $this->_pages = [
            0 => [
                'page' => new Document($this->namespace)
            ],
        ];
    }
}
