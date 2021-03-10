<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * @param null $form
     */
    public function index()
    {
        if (request('form', false)) {
            $form = app_path() . '/Services/Forms/' . request('form', null);

            if (is_dir($form)) {
                $formName = request('form');
                $form = 'App\Services\Forms\\' . $formName . '\\' . $formName;
                session(['form' => new $form]);
                session(['form_name' => Str::title($formName)]);
                return view('forms.' . $formName . '.index');
            }
        }

        abort(404);
    }

    public function catchall()
    {
    }
}
