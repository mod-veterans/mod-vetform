<?php

namespace App\Http\Controllers;

use App\Services\Application;
use App\Services\Forms\BaseForm;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * @param null $form
     */
    public function index()
    {
//        $files = Storage::disk('s3')->allFiles();
//
//        foreach($files as $file) {
//            print Storage::url($file) . '<br>';
//        }
//
//        dd($files);
//        $files = Storage::files();
//        // dd($files);
//        $file = Storage::url('/some_file.jpg');
//        dd($file);



//        if (request('form', false)) {
//            dd('OK!');
//            $form = app_path() . '/Services/Forms/' . request('form', 'Afcs');
//
//            if (is_dir($form)) {
//                if (request('flush')) {
//                    session()->flush();
//                    session()->save();
//                    dd('Flushing');
//                }
//
//                $formName = request('form');
//                $form = "App\Services\Forms\\" . $formName . '\\' . $formName;
//                session(['form' => $form]);
//
//                return redirect('/');
//            }
//        } else
if (Application::getInstance()->form instanceof BaseForm) {
            return view('forms.' . Application::getInstance()->form->getId() . '.index');
        }

        abort(404);
    }

    public function start() {
//        $form = 'App\Services\Forms\Afcs\Afcs';
//        session(['form' => $form]);

        return view('forms.' . Application::getInstance()->form->getId() . '.start');
    }
}
