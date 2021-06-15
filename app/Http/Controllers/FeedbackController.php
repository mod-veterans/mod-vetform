<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Services\Notify;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('feedback');
    }

    public function send(FeedbackRequest $request)
    {
                Notify::getInstance()
                    ->setData( [
                        'feedback-satisfaction' => $request->input('feedback-satisfaction'),
                        'feedback-improvement' => (null !== $request->input('feedback-improvement') ? $request->input('feedback-improvement') : 'No feedback given')
                    ])
                    ->sendEmail('toby@codesure.co.uk', env('FEEDBACK_NOTIFICATION'))
                    ->sendEmail('David.Johnson833@mod.gov.uk', env('FEEDBACK_NOTIFICATION'));


        return redirect()->route('feedback.complete');
//        $notifyClient = new \Alphagov\Notifications\Client([
//            'apiKey' => env('NOTIFY_API_KEY', 'srrdigitalproduction-8ae4b688-c5e2-45ff-a873-eb149b3e23ff-ed3db9dd-d928-4d4c-89dc-8d22b4265e75'),
//            'httpClient' => new Client
//        ]);
//
//        try {
//            $params = [
//                'service' => $request->input('feedback-satisfaction'),
//                'feedback' => (null !== $request->input('feedback-improvement') ? $request->input('feedback-improvement') : 'No feedback given')
//            ];
//            $notifyClient->sendEmail(
//                env('FEEDBACK_EMAIL', 'liam.cusack582@mod.gov.uk'),
//                '0f3b68c3-4589-4466-a743-73f73e841187',
//                $params);
//
//        } catch (Exception $e) {
//            return $e;
//        }
    }

    /**
     * @return Application|Factory|View
     */
    public function complete()
    {
        return view('feedback-complete');
    }
}
