<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $formName = null;

    /**
     * @param string $method
     * @param array $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        if(!session('form', false)) {
            $form = "App\Services\Forms\Afcs\Afcs";

            session(['form' => $form]);
            session()->save();
        }
        return parent::callAction($method, $parameters);
    }

    /**
     *
     */
    public function save() {

    }
}
