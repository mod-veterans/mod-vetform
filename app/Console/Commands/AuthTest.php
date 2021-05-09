<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Jumbojett\OpenIDConnectClient;

class AuthTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gds:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $endpoint = 'https://di-auth-oidc-provider.london.cloudapps.digital';
        $oidc = new OpenIDConnectClient($endpoint,
            '78209109-621d-400a-9875-46c81bac1f89',
            '364f6a69-a6d4-4dfc-85ee-1b9f2f819c13');

//        $oidc->setVerifyPeer(false);
//        $oidc->setVerifyHost(false);

        $oidc->authenticate();
        $name = $oidc->requestUserInfo('email');

        dd($name);
    }
}
