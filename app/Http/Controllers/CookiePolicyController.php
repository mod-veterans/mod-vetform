<?php

namespace App\Http\Controllers;

use App\Models\StoredSession;
use App\Services\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CookiePolicyController extends Controller
{
    public $cookies = [];

    public function callAction($method, $parameters)
    {
        $this->cookies = [
            'usage' => [
                ['name' => '_ga', 'purpose' => 'Used to distinguish users', 'expires' => '2 years',],
                ['name' => '_gat', 'purpose' => 'Used to throttle request rate', 'expires' => '10 minutes',],
                ['name' => '_gcl_au', 'purpose' => 'Used by Google AdSense for experimenting with advertisement efficiency across websites using their services', 'expires' => '3 months',],
                ['name' => '_gid', 'purpose' => 'Used to distinguish users', 'expires' => '24 hours',],
                ['name' => '_gac', 'purpose' => 'Contains campaign related information for the user', 'expires' => '90 days',],
            ],
            'essential' => [
                ['name' => 'XSRF-TOKEN', 'purpose' => 'A standard cookie used to prevent a malicious exploit of a website', 'expires' => '2 hours'],
                ['name' => Str::slug(env('APP_NAME', 'laravel'), '_').'_session',
                    'purpose' => 'Holds session data to complete the application', 'expires' => 'When you close your browser'],
                ['name' => 'cookies_preference_set', 'purpose' => 'Registers the input cookie preference', 'expires' => 'When you close your browser'],
                ['name' => 'cookies_policy', 'purpose' => 'Register the response to cookies permission question', 'expires' => 'When you close your browser'],
            ],
            'settings' => [],
            'campaigns' => [],
        ];

        return parent::callAction($method, $parameters);
    }

    public function index()
    {
        $view = 'cookie-policy';
        if (view()->exists('forms.' . Application::getInstance()->form->getId() . '.' . $view)) {
            $view = 'forms.' . Application::getInstance()->form->getId() . '.' . $view;
        }

        return view($view, [
            'cookies' => $this->cookies
        ]);
    }

    public function save(Request $request)
    {
        session()->flash('flash', 'Your cookie settings were saved');
        return redirect()->route('cookie-policy');
    }
}
