<?php

session_start();

//DB Connection Details


if (empty (getenv('DB_PASSWORD'))) {

    $dbCredentialsUrl = $_ENV['DATABASE_URL'] ?? null;
    $dbCredentials = parse_url($dbCredentialsUrl);


    $_ENV['DB_HOST']   = $dbCredentials['host'];
    $_ENV['DB_PORT']     = '5432';
    $_ENV['DB_DATABASE'] = trim($dbCredentials['path'], '/');
    $_ENV['DB_USERNAME'] = $dbCredentials['user'];
    $_ENV['DB_PASSWORD'] = $dbCredentials['pass'];


} else {

    $_ENV['DB_HOST'] =  getenv('DB_HOST');
    $_ENV['DB_PORT']  = getenv('DB_PORT');
    $_ENV['DB_DATABASE']     = getenv('DB_DATABASE');
    $_ENV['DB_USERNAME'] = getenv('DB_USERNAME');
    $_ENV['DB_PASSWORD'] = getenv('DB_PASSWORD');
    $_ENV['DATABASE_TABLE'] = getenv('DATABASE_TABLE');
}


//do we have a DB connection? Show a friendly non-DB page if not
if (!@$db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."")) {
    //cannot connect to DB
    header("Location: /maintenance");
    die();
}

if (!@pg_query($db, "SELECT * FROM ".$_ENV['DATABASE_TABLE']."")) {
    //cannot connect to table
    header("Location: /maintenance");
    die();
}




    if (empty($_SESSION['vets-user'])) {
        $userID = md5(rand(0,65535).microtime().rand(0,65535));
        $_SESSION['vets-user'] = $userID;
        $data = array();
        $data['bigBang'] = date('Y-m-d H:i:s');
        storeData($userID,$data,'INSERT');
        // \Sentry\captureMessage('User session was started');
        header('Location: /');
        die();
    } else {
        $userID = $_SESSION['vets-user'];
    }

if (empty($skipCheck)) {

    $data = getData($userID);
    if ($data == 'NOPE') {

            //we have no matching user ID, reset
            unset($_SESSION['vets-user']);
           // \Sentry\captureMessage('User was booted back to start because of no data match assigned to this ID');
            header("Location: /");
            die();

    } else {
        if (empty($data['settings']['customer_ref'])) {
            $data['settings']['customer_ref'] = substr($userID,0,10);
            storeData($userID,$data,'UPDATE');
            // \Sentry\captureMessage('User has been given a customer ref');
            header('Location: /');
            die();
        }
    }

}

function storeData($userID, $data, $type='UPDATE') {

   //we should only ever get a alphanumeric hash
    if (!ctype_alnum($userID)) {
        die();
    }

    $data = json_encode($data);
    $data = DOencrypt($data);
    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");

    if ($type == 'INSERT') {
        pg_query($db, "INSERT INTO ".$_ENV['DATABASE_TABLE']."(datetimeadded,data,userid) VALUES(now(),'$data','$userID')");
    } elseif ($type == 'UPDATE') {
        pg_query($db, "UPDATE ".$_ENV['DATABASE_TABLE']." SET datelastaccessed = now(), data = '$data' WHERE userid = '$userID'");
    } else {
        return FALSE;
    }

    return TRUE;
}








function getData($userID) {

   //we should only ever get a alphanumeric hash
    if (!ctype_alnum($userID)) {
        die();
    }

    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");
    $result = pg_query($db, "SELECT * FROM ".$_ENV['DATABASE_TABLE']." WHERE userid = '$userID'");
    if ($row = pg_fetch_assoc($result)) {

        $data = $row['data'];
        $data = DOdecrypt($data);
        $data = json_decode($data,TRUE);
        return $data;

    } else {
        return 'NOPE';
    }
}



function DOencrypt($data) {
$passphrase = hex2bin(getenv('DATA_PASS_PHRASE'));
$iv = hex2bin(getenv('DATA_PASS_SEED'));
    $data = openssl_encrypt($data, 'AES-256-CBC', $passphrase, OPENSSL_RAW_DATA, $iv);
    return base64_encode($data);
}


function DOdecrypt($data) {
$passphrase = hex2bin(getenv('DATA_PASS_PHRASE'));
$iv = hex2bin(getenv('DATA_PASS_SEED'));
    $data = base64_decode($data);
    $data = openssl_decrypt($data, 'AES-256-CBC', $passphrase, OPENSSL_RAW_DATA, $iv);
    return $data;
}


function cleanTextData($data) {
    return $data;
}


function cleanNumericData($data) {
    return $data;
}


function cleanURL($data) {
    return $data;
}


function validateEmail($data) {
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return FALSE;
    } else {
        return TRUE;
    }
}


function validateNINUmber($data) {

    if (strlen($data) < 9) {
        return FALSE;
    } else {
        return TRUE;
    }

}


function cleanRecordID($data) {
    return $data;
}

function genHash($len=32) {
    $hash = md5(rand(0,65535).microtime().rand(0,65535));
    $hash = substr($hash, 0, $len);
    return $hash;
}


function simplify($content) {
    $content = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $content));
    return $content;
}

function simplify_w_spaces($content) {
    $content = strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $content));
    return $content;
}


function clearSessionData($userid) {
    unset ($_SESSION[$userid]);
    unset ($_SESSION['vets-user']);
    return TRUE;
}



function deleteData($userid) {
    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");
    $result = pg_query($db, "DELETE FROM ".$_ENV['DATABASE_TABLE']." WHERE userid = '".$userid."'");
    if ($row = pg_fetch_assoc($result)) {
        //it was done

    }
    unset ($_SESSION[$userid]);
    unset ($_SESSION['vets-user']);
    return TRUE;
}

function houseKeeping() {
    //DELETE records more than 93 days old
    $days93 = strtotime('-93 days');
    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");
    $result = pg_query($db, "DELETE FROM ".$_ENV['DATABASE_TABLE']." WHERE extract(epoch from datetimeadded) < ".$days93."");
    if ($row = pg_fetch_assoc($result)) {
        //it was done
    }

    //DELETE FILES from S3





}



function cookiesOK($type='GA') {
    switch ($type) {
        case 'GA':
        default:
            if (!empty($_COOKIE['vet-GA'])) {
                return TRUE;
            } else {
                return FALSE;
            }
        break;
        case 'general':
            if (!empty($_COOKIE['vet-COOKIE'])) {
                return TRUE;
            } else {
                return FALSE;
            }
        break;

    }
return FALSE; //default to false
}


function logSM($message) {
\Sentry\captureMessage($message);
}


function validateMobile11($data) {
    if (strlen(simplify($data)) != 11) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function validateMobile07($data) {
    if (substr($data, 0, 2) == '07') {
        return TRUE;
    } else {
        return FALSE;
    }
}



function checkDOB($month, $day, $year) {
    $theirdate = strtotime($year.'-'.$month.'-'.$day);
    $date14yrsago = strtotime(date('Y-m-d')." -14 years");
    if ($date14yrsago < $theirdate) {
        return FALSE;
    } else {
        return TRUE;
    }
}


function year2YearsFuture($year) {
    if (!is_numeric($year)) {
        return FALSE;
    }
    $thisYear = date('Y');
    if (($year - $thisYear) > 2) {
        return FALSE;
    } else {
        return TRUE;
    }
}


function yearInFuture($year) {
    if (!is_numeric($year)) {
        return FALSE;
    }
    $thisYear = date('Y');
    if ($year > $thisYear) {
        return FALSE;
    } else {
        return TRUE;
    }
}


function dateInFuture($month,$day,$year) {


    $theirDate = strtotime($year.'-'.$month.'- '.$day);
    $now = strtotime(date('Y-m-d'));
    if ($theirDate > $now) {
        return FALSE;
    } else {
        return TRUE;
    }
}






?>
