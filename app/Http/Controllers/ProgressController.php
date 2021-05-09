<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProgressController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function save()
    {
        $view = new \stdClass();
        $view->title = 'Save progress';
        $view->summary = [];

        return view('save-progress', [
            'view' => $view
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request): RedirectResponse
    {
        $isEmail = filter_var($request->get('identity'), FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE);

        $session = DB::table('sessions')->where('id', Session::getId())->first();
        DB::table('identity')->updateOrInsert(['data', 'identity'], [$session->payload, 'identity']);

        return redirect('saved-progress');
    }

    public function close(): \Illuminate\Contracts\View\View
    {
        // Clear the session
        Session::flush();

        return view('saved-progress', []);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function retrieve()
    {
        return view('restore-progress');
    }

    /**
     * @param Request $request
     */
    public function restore(Request $request)
    {
        $isEmail = filter_var($request->get('identity'), FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE);

        $rows = DB::table('sessions')->select('key', 'value')
            ->where(!$isEmail ? 'mobile' : 'email', $request->get('identity'))
            ->where('code', $request->get('code'))
            ->get();

        foreach ($rows as $row) {
            session([$row['key'] => $row['value']]);
        }

        redirect('/');
    }
}
