<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\CheckBefore\ThingsToKnow;
use App\Services\Forms\BaseGroup;

class CheckBefore extends BaseGroup
{
    protected $summaryPage = null;
    protected $preTask = null;
    protected $postTask = null;

    protected $name = 'Check before you start';

    protected $tasks = [];

    public function __construct($namespace)
    {
        $this->tasks = [
            new ThingsToKnow($this->namespace)
        ];

        parent::__construct($namespace);
    }
}
