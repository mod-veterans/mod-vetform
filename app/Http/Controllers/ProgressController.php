<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthcodeRequest;
use App\Http\Requests\TwoFactorRequest;
use App\Models\StoredSession;
use App\Services\Application;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use stdClass;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Services\Notify;
use Http\Client\Exception\HttpException;
use Symfony\Component\HttpFoundation\Exception\SessionNotFoundException;

class ProgressController extends Controller
{
    private $application;

    public function callAction($method, $parameters)
    {
        $this->application = Application::getInstance();

        return parent::callAction($method, $parameters);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     */
    public function restore()
    {
        $view = 'restore-application';
        if (view()->exists('forms.' . $this->application->form->getId() . '.' . $view)) {
            $view = 'forms.' . $this->application->form->getId() . '.' . $view;
        }

        $qualifiers = $this->application->form->identifier;
        $questions = [];

        foreach ($qualifiers as $qualifier) {
            $question = $this->application->getQuestionByFieldname($qualifier);
            unset($question['options']['hideLabel']);
            unset($question['options']['hint']);
            array_push($questions, $question);
        }

        return view($view, ['questions' => $questions]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm(TwoFactorRequest $request)
    {
        $storedSessionId = (new StoredSession())->getSessionFromIDRequest($request);
        $authcode = strtoupper(rand(1000, 9999));

        session()->flash('stored_session_id', $storedSessionId);

        $storedSessionQuery = StoredSession::where('id', $storedSessionId);
        $storedSessionQuery->update([
            'authcode' => $authcode,
            'authcode_expiration' => Carbon::now()->addMinutes(50)->timestamp
        ]);

        $storedUser = $storedSessionQuery->first();
        $this->sendCode($authcode, Crypt::decryptString($storedUser->mobile), Crypt::decryptString($storedUser->email));

        session(['stored_application' => $storedUser]);
        return redirect()->route('restore-application-2fa');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     */
    public function authcode()
    {
        $view = 'restore-application-2fa';
        if (view()->exists('forms.' . $this->application->form->getId() . '.' . $view)) {
            $view = 'forms.' . $this->application->form->getId() . '.' . $view;
        }

        session()->keep(['stored_session_id']);

        return view($view);
    }

    /**
     * @param AuthcodeRequest $request
     */
    public function authenticate(AuthcodeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $storedSessionId = session('stored_session_id', false);
        if (!$storedSessionId) {
            abort(419, 'Verification expired');
        }

        $storedSession = StoredSession::find($storedSessionId);
        if (!$storedSession) {
            abort(419, 'Verification expired');
        }

        try {
            $payload = Crypt::decrypt($storedSession->payload);
        } catch (DecryptException $e) {
            abort(419, 'Invalid form data');
        }

        session()->flush();

        foreach ($payload as $key => $item) {
            if (!in_array($key, ['_token', '_flash', '_previous'])) {
                session([$key => $item]);
            }
        }

        session([StoredSession::SESSION_REFERENCE_KEY, $storedSessionId]);

        return redirect()->route('home');
    }


    public function resend()
    {
        session()->keep(['stored_session_id']);

        $storedSessionId = session('stored_session_id', false);
        if (!$storedSessionId) {
            abort(419, 'Verification expired');
        }

        $authcode = strtoupper(rand(1000, 9999));
        $storedSessionQuery = StoredSession::where('id', $storedSessionId);
        $storedSessionQuery->update([
            'authcode' => $authcode,
            'authcode_expiration' => Carbon::now()->addMinutes(50)->timestamp
        ]);

        $storedUser = $storedSessionQuery->first();
        $this->sendCode($authcode, Crypt::decryptString($storedUser->mobile), Crypt::decryptString($storedUser->email));

        $stored_application = session('stored_application');
        $this->sendCode($stored_application->authcode, $stored_application->mobile, $stored_application->email);

        return redirect()->route('restore-application-2fa');
    }

    protected function sendCode($authcode, $mobile = null, $email = null)
    {
        $notify =Notify::getInstance()
            ->setData(['auth_code' => $authcode, 'service' => $this->application->form]);

        if($mobile) {
            try {
                $notify->sendSms($mobile, env('NOTIFY_2FA_SMS', false));
            } catch (\Exception $e) {
            }
        }

        if($email) {
            try {
                $notify->sendEmail($email, env('NOTIFY_2FA_EMAIL', false));
            } catch (\Exception $e) {
            }
        }
    }
}
