<?php


namespace App\Services\Forms\Afcs\Groups\SupportingDocuments;


use App\Services\Forms\Afcs\Groups\SupportingDocuments\Documents\Document;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class Documents extends BaseTask
{
    use Stackable;

    protected $name = 'Supporting documents';

    protected $summaryPage = null;

    protected $postTask = null;

    protected $_title = 'Supporting documents';

    protected $_addStackLabel = 'Upload a document';

    protected $_preTask = [
//        [
//            'type' => 'body',
//            'content' => 'You can add details for more than one period of service.'
//        ],
//        [
//            'type' => 'inset',
//            'content' => 'A period of service is defined as a term of service between enlistment and discharge within one service type.'
//        ]
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
