<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou;


use App\Services\Constant;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\ContactAddress;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\ContactNumber;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\DateOfBirth;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\EmailAddress;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\NationalInsurance;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\PensionScheme;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\PreviousClaim;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\PreviousClaimReference;
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
        $this->_pages = [
            0 => [
                'page' => new YourName($this->namespace),
                'next' => 'contact-address',
            ],
            'contact-address' => [
                'page' => new ContactAddress($this->namespace),
                'next' => 'date-of-birth',
            ],
            'date-of-birth' => [
                'page' => new DateOfBirth($this->namespace),
                'next' => 'contact-number',
            ],
            'contact-number' => [
                'page' => new ContactNumber($this->namespace),
                'next' => 'email-address',
            ],
            'email-address' => [
                'page' => new EmailAddress($this->namespace),
                'next' => 'national-insurance',
            ],
            'national-insurance' => [
                'page' => new NationalInsurance($this->namespace),
                'next' => 'pension-scheme',
            ],
            'pension-scheme' => [
                'page' => new PensionScheme($this->namespace),
                'next' => 'previous-claim',
            ],
            'previous-claim' => [
                'page' => new PreviousClaim($this->namespace),
                'next' => function () {
                    $field = $this->_pages['previous-claim']['page']->questions[0]['options']['field'];

                    return session($field, null) == Constant::YES ? 'previous-claim-reference' : null;
                },
            ],
            'previous-claim-reference' => [
                'page' => new PreviousClaimReference($this->namespace)
            ]
        ];
    }
}
