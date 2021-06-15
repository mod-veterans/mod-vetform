<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Jumbojett\OpenIDConnectClient;

class GdsLoginController extends Controller
{
    public function index()
    {
        $endpoint = 'https://di-auth-oidc-provider.london.cloudapps.digital';
        $oidc = new OpenIDConnectClient($endpoint,
            '07da504c-3f1c-46b2-82a9-0fb12bec76f5',
            '3066a7fc-6363-41d2-8987-4d36bdf4a58d');

        $oidc->setResponseTypes(['code']);
        $oidc->addScope(['openid']);
        $oidc->addAuthParam(['response_mode' => 'query']);
        // $oidc->setRedirectURL('http://127.0.0.1:8000/gds-test/callback');
        $oidc->setRedirectURL('https://modvets-dev2.london.cloudapps.digital/gds-test/callback');
        $oidc->authenticate();
        $sub = $oidc->getVerifiedClaims('sub');
    }

    /**
     * Callback which GDS will call
     */
    public function callback()
    {

        $code = request('code');

        $curl = curl_init('https://di-auth-oidc-provider.london.cloudapps.digital/token');
        $post =
            'grant_type=authorization_code&' .
            'code=' . $code . '&' .
            'client_id=07da504c-3f1c-46b2-82a9-0fb12bec76f5&' .
            'client_secret=3066a7fc-6363-41d2-8987-4d36bdf4a58d';

        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type' => 'application/x-www-form-urlencoded']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($curl));

        Log::info('TOKEN::: ' . $response->access_token);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://di-auth-oidc-provider.london.cloudapps.digital/userinfo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$response->access_token}"
            ],
        ]);

        $response = json_decode(curl_exec($curl));

        return view('callback', ['response' => $response]);
    }

    /**
     * Get a token from GDS
     *
     * @throws GuzzleException
     */
    public function login()
    {
        $client = new Client([]);

        $response = $client->post(GDS_TOKEN_ENDPOINT, []);
        $statusCode = $response->getStatusCode();


    }
}
