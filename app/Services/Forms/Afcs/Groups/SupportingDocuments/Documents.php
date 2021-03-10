<?php


namespace App\Services\Forms\Afcs\Groups\SupportingDocuments;


use App\Services\Forms\Afcs\Groups\SupportingDocuments\Documents\Document;
use App\Services\Forms\BaseTask;
use App\Services\Traits\Stackable;

class Documents extends BaseTask
{
    use Stackable;

    protected $name = 'Supporting documents';

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
