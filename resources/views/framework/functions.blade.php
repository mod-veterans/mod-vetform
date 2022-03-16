@php
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
}


if (empty($_SESSION['vets-user'])) {
    $userID = md5(rand(0,65535).microtime().rand(0,65535));
    $_SESSION['vets-user'] = $userID;
    $data = array();
    $data['bigBang'] = date('Y-m-d H:i:s');
    storeData($userID,$data,'INSERT');
    header('Location: /');
    die();
} else {
    $userID = $_SESSION['vets-user'];
}



$data = getData($userID);
if ($data == 'NOPE') {

        //we have no matching user ID, reset
        unset($_SESSION['vets-user']);

        header("Location: /");
        die();

} else {
    if (empty($data['settings']['customer_ref'])) {
        $data['settings']['customer_ref'] = substr($userID,0,10);
        storeData($userID,$data,'UPDATE');
        header('Location: /');
        die();
    }
}



function storeData($userID, $data, $type='UPDATE') {


    $data = json_encode($data);
    $data = DOencrypt($data);
    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");

    if ($type == 'INSERT') {
        pg_query($db, "INSERT INTO modvetdevusertable(datetimeadded,data,userid) VALUES(now(),'$data','$userID')");
    } elseif ($type == 'UPDATE') {
        pg_query($db, "UPDATE modvetdevusertable SET datelastaccessed = now(), data = '$data' WHERE userid = '$userID'");
    } else {
        return FALSE;
    }

    return TRUE;
}








function getData($userID) {

    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");
    $result = pg_query($db, "SELECT * FROM modvetdevusertable WHERE userid = '$userID'");
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
    return TRUE;
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
    $content = strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $content));
    return $content;
}





@endphp
