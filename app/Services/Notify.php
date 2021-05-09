<?php


namespace App\Services;


use GuzzleHttp\Client;

class Notify
{
    /** @var Client */
    private $client;

    /**
     * @var Application
     */
    private static $instance = null;

    private function __construct()
    {
//        $this->client = new;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Notify();
        }

        return self::$instance;
    }

    public function sendSms($data)
    {
    }

    public function sendEmail($data)
    {
    }
}
