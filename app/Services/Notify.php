<?php


namespace App\Services;


use GuzzleHttp\Client;
use Alphagov\Notifications\Client as NotifyClient;

class Notify
{
    /** @var Client */
    private $client;

    private $data = [];

    /**
     * @var Application
     */
    private static $instance = null;

    /**
     * Notify constructor.
     */
    private function __construct()
    {
        $this->client = new NotifyClient([
            'apiKey' => env('NOTIFY_API_KEY', ''),
            'httpClient' => new Client
        ]);
    }

    /**
     * @return Application|Notify|null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Notify();
        }

        return self::$instance;
    }

    public function setData($data = [])
    {
        $this->data = $data;

        return $this;
    }

    public function sendSms($data)
    {
    }

    public function sendEmail($emailAddress, $templateID)
    {
        $this->client->sendEmail(
            $emailAddress, $templateID, $this->data
        );

        return $this;
    }
}
