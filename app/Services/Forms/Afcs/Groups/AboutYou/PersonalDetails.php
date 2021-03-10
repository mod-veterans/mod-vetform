<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou;


use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\ContactAddress;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\DateOfBirth;
use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails\YourName;
use App\Services\Forms\BaseTask;

class PersonalDetails extends BaseTask
{
    /**
     * @var bool
     */
    protected $hasSummary = true;

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
    protected $name = 'Personal details';

    /**
     *
     */
    function setPages(): void
    {
        $this->pages = [
            0 => [
                'page' => new YourName($this->namespace),
                'next' => 1,
            ],
            1 => [
                'page' => new ContactAddress($this->namespace),
            ],
            2 => [
                'page' => new DateOfBirth($this->namespace),
                'next' => 2,
            ],
        ];
    }
}
