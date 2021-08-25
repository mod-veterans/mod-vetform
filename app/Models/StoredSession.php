<?php


namespace App\Models;


use App\Services\Application;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class StoredSession extends Model
{
    const SESSION_REFERENCE_KEY = 'stored_session_key';

    protected $_storedSession = null;

    protected $_sessionReferenceKey = null;

    protected $_ignorePayloadKeys = [
        '_token',
        '_flash',
        '_previous',
        self::SESSION_REFERENCE_KEY
    ];

    public $fillable = [
        'identifier',
        'payload',
        'two_factor',
        'two_factor_expiration'
    ];

    public function storeApplication()
    {
        $sessionID = session(self::SESSION_REFERENCE_KEY, $this->generateSessionReference());
        $payload = Crypt::encrypt(session()->all(), true);
        $email = Crypt::encryptString(session(Application::getInstance()->form->identifierEmail ?? ''));
        $mobile = Crypt::encryptString(session(Application::getInstance()->form->identifierMobile ?? ''));

        if ($sessionID) {
            DB::table('stored_sessions')
                ->where('id', $sessionID)
                ->update([
                    'payload' => $payload,
                    'email' => $email,
                    'mobile' => $mobile,
                    'updated_at' => now()
                ]);
        }
    }

    public function generateSessionReference()
    {
        $idKeys = $idHash = [];
        $storedSessionQuery = DB::table('stored_sessions');
        $application = Application::getInstance();
        $storeResponseIdentifier = $application->form->identifier ?? [];
        $allSessions = $storedSessionQuery->get();
        $canStore = true;
        $sessionID = false;

        foreach ($storeResponseIdentifier as $identifier) {
            if (!session($identifier)) {
                $canStore = false;
                break;
            }

            $idKeys[$identifier] = strtolower(session($identifier));
            $idHash[$identifier] = Crypt::encryptString(strtolower(session($identifier)));
        }

        if ($canStore) {
            $sessionID = false;
            foreach ($allSessions as $idSession) {
                $identifier = json_decode($idSession->identifier);
                $sessionID = $idSession->id;

                foreach ($identifier as $key => $value) {
                    try {
                        if (Crypt::decryptString($value) !== $idKeys[$key] ?? null) {
                            $sessionID = false;
                            break;
                        }
                    } catch (DecryptException $e) {
                        $sessionID = false;
                        break;
                    }
                }

                if ($sessionID == $idSession->id) {
                    break;
                }
            }

            if (!$sessionID) {
                $payload = Crypt::encrypt(session()->all(), true);
                $email = Crypt::encryptString(session(Application::getInstance()->form->identifierEmail ?? ''));
                $mobile = Crypt::encryptString(session(Application::getInstance()->form->identifierMobile ?? ''));

                $sessionID = $storedSessionQuery->insertGetId([
                    'identifier' => json_encode($idHash),
                    'payload' => $payload,
                    'email' => $email,
                    'mobile' => $mobile,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return $sessionID ?? false;
    }

    public function getSessionFromIDRequest($request = null)
    {
        $idKeys = [];
        $storedSessionQuery = DB::table('stored_sessions');
        $application = Application::getInstance();
        $storeResponseIdentifier = $application->form->identifier ?? [];
        $allSessions = $storedSessionQuery->get();

        foreach ($storeResponseIdentifier as $identifier) {
            if ($request) {
                $idKeys[$identifier] = strtolower($request->get($identifier));
            } else {
                $idKeys[$identifier] = strtolower(request()->get($identifier));
            }
        }

        $response = false;
        foreach ($allSessions as $idSession) {
            $identifier = json_decode($idSession->identifier);
            $response = $idSession->id;

            foreach ($identifier as $key => $value) {
                try {
                    if (Crypt::decryptString($value) !== $idKeys[$key] ?? null) {
                        $response = false;
                        break;
                    }
                } catch (DecryptException $e) {
                    $response = false;
                    break;
                }
            }

            if ($response == $idSession->id) {
                break;
            }
        }

        return $response;
    }
}
