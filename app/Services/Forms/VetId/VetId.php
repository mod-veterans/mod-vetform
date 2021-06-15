<?php

namespace App\Services\Forms\VetId;


use App\Services\Forms\BaseForm;
use App\Services\Forms\VetId\Groups\AboutYou;
use App\Services\Forms\VetId\Groups\Service;
use App\Services\Forms\VetId\Groups\Submission;

class VetId extends BaseForm
{
    const SECTION_CHECK_BEFORE = 0;
    const SECTION_ABOUT_YOU = 1;
    const SECTION_SERVICE = 2;
    const SECTION_DECLARATION = 64;

    const NAME = 'VetId';

    /**
     * @var string
     */
    protected string $name = 'Apply for a Veterans ID Card';


    /**
     * @var string[]
     */
    protected $groups = [
    ];

    public function __construct()
    {
        parent::__construct();
        $this->init(self::NAME);

        /**
         * Class which when flow ends, submits form
         */
        $this->_consentPage = Submission::class;

        $this->groups = [
//            self::SECTION_CHECK_BEFORE => new CheckBefore(self::NAME, []),
            self::SECTION_ABOUT_YOU => new AboutYou(self::NAME, []),
            self::SECTION_SERVICE => new Service(self::NAME, []),
            self::SECTION_DECLARATION => new Submission(self::NAME, []),
        ];

    }
}
