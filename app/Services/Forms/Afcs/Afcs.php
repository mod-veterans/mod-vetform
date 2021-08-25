<?php


namespace App\Services\Forms\Afcs;


use App\Services\Forms\Afcs\Groups\AboutYou;
use App\Services\Forms\Afcs\Groups\ApplicationSubmission;
use App\Services\Forms\Afcs\Groups\CheckBefore;
use App\Services\Forms\Afcs\Groups\NominateRepresentative;
use App\Services\Forms\Afcs\Groups\OtherDetails;
use App\Services\Forms\Afcs\Groups\PaymentDetails;
use App\Services\Forms\Afcs\Groups\SupportingDocuments;
use App\Services\Forms\Afcs\Groups\YourClaim;
use App\Services\Forms\BaseForm;

class Afcs extends BaseForm
{
    const SECTION_CHECK_BEFORE = 0;
    const SECTION_ABOUT_YOU = 1;
    const SECTION_YOUR_CLAIM = 2;
    const SECTION_OTHER_DETAILS = 4;
    const SECTION_PAYMENT_DETAILS = 8;
    const SECTION_NOMINATE_REP = 16;
    const SECTION_SUPPORTING_DOCS = 32;
    const SECTION_DECLARATION = 64;

    const NAME = 'afcs';

    /**
     * @var string
     */
//    protected string $name = 'Apply for an Armed Forces Compensation or War Pension Payment';
    protected string $name = 'Apply for an armed forces or war pension payment';

    /**
     * @var string[]
     */
    protected $groups = [
    ];

    /**
     * @var array|string[]
     */
    protected array $_identifier = [
        'afcs/about-you/personal-details/your-name/last-name',
        'afcs/about-you/personal-details/date-of-birth/date-of-birth',
        'afcs/about-you/personal-details/national-insurance/ni-number'
    ];

    protected string $_identifierEmail = 'afcs/about-you/personal-details/email-address/email-address';

    protected string $_identifierMobile = 'afcs/about-you/personal-details/contact-number/mobile-number';

    protected string $_userEmailField   = 'afcs/about-you/personal-details/email-address/email-address';

    public function __construct()
    {
        $this->init(self::NAME);

        /**
         * Class which when flow ends, submits form
         */
        $this->_consentPage = ApplicationSubmission::class;

        $this->groups = [
            self::SECTION_CHECK_BEFORE => new CheckBefore(self::NAME, []),
            self::SECTION_NOMINATE_REP => new NominateRepresentative(self::NAME, []),
            self::SECTION_ABOUT_YOU => new AboutYou(self::NAME, []),
            self::SECTION_YOUR_CLAIM => new YourClaim(self::NAME),
            self::SECTION_OTHER_DETAILS => new OtherDetails(self::NAME, []),
            self::SECTION_PAYMENT_DETAILS => new PaymentDetails(self::NAME, []),
            self::SECTION_SUPPORTING_DOCS => new SupportingDocuments(self::NAME, []),
            self::SECTION_DECLARATION => new ApplicationSubmission(self::NAME, [])
        ];

    }
}
