<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou;


use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\ContactAddress;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\ContactNumber;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\DateOfBirth;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\EmailAddress;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\NationalInsurance;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\PensionScheme;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\PreviousClaim;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\YourName;
use App\Services\Forms\BaseTask;

class PersonalDetails extends BaseTask
{
    /**
     * @var bool
     */
    protected $_hasSummary = true;

    /**
     * @var null
     */
    protected $preTask = null;

    /**
     * @var null
     */
    protected $postTask = null;

    /**
     * @var string
     */
    protected string $name = 'Personal details';

    /**
     * @inheritDoc
     */
    function setPages(): void
    {
        $this->pages = [
            0 => [
                'page' => new YourName($this->namespace),
                'next' => 1,
            ],
            1 => [
                'page' => new ContactAddress($this->namespace, false),
                'next' => 2,
            ],
            2 => [
                'page' => new DateOfBirth($this->namespace),
                'next' => 3,
            ],
            3 => [
                'page' => new ContactNumber($this->namespace),
                'next' => 4,
            ],
            4 => [
                'page' => new EmailAddress($this->namespace),
                'next' => 5,
            ],
            5 => [
                'page' => new NationalInsurance($this->namespace),
                'next' => 6,
            ],
            6 => [
                'page' => new PensionScheme($this->namespace),
                'next' => 7,
            ],
            7 => [
                'page' => new PreviousClaim($this->namespace),
            ]
        ];
    }
}
