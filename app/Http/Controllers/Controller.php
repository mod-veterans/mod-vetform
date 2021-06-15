<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $formName = null;

    /**
     * @param string $method
     * @param array $parameters
     * @return Response
     */
    public function callAction($method, $parameters)
    {
        if (request('flush')) {
            session()->flush();
            session()->save();
        }



        if (!session('form', false)) {

            if (request('form')) {
                $form = request('form');
                $form = "App\Services\Forms\\$form\\$form";
            } else {
                $form = "App\Services\Forms\Afcs\Afcs";
            }

            session(['form' => $form]);
            session()->save();
        }
        return parent::callAction($method, $parameters);
    }
}
