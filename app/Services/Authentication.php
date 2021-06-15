<?php


namespace App\Services;


use GuzzleHttp\Psr7\Request;

class Authentication
{
    private $instance = null;

    private $client = null;

    private function __construct()
    {
    }

    public function getInstance() {}


    public function login(string $username, string $password)
    {
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/user', [
            'auth' => ['user', 'pass']
        ]);
        echo $res->getStatusCode();
        echo $res->getHeader('content-type')[0];
        echo $res->getBody();

        // {"type":"User"...'

        // Send an asynchronous request.
        $request = new Request('GET', 'http://httpbin.org');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
    }
}
