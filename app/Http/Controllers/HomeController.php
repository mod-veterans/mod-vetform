<?php

namespace App\Http\Controllers;

use App\Services\Application;
use App\Services\Forms\BaseForm;

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
                if (request('flush')) {
                    session()->flush();
                }

                $formName = request('form');
                $form = "App\Services\Forms\\" . $formName . '\\' . $formName;
                session(['form' => $form]);

                return redirect('/');
            }
        } elseif (Application::getInstance()->form instanceof BaseForm) {
            return view('forms.' . Application::getInstance()->form->getId() . '.index');
        }

        abort(404);
    }

    public function catchall()
    {
    }
}
