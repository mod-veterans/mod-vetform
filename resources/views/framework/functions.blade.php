@php
session_start();


if (empty($_SESSION['vets-user'])) {
    $userID = md5(rand(0,65535).microtime().rand(0,65535));
    $_SESSION['vets-user'] = $userID;
} else {
    $userID = $_SESSION['vets-user'];
}


if (empty($data['settings']['customer_ref'])) {
    $data = getData($userID);
    $data['settings']['customer_ref'] = substr($userID,0,10);
    storeData($userID,$data);
}





//temp passphrase - to be moved to env



function DOencrypt($data) {
$passphrase = hex2bin(getenv('DATA_PASS_PHRASE'));
$iv = hex2bin(getenv('DATA_PASS_SEED'));
    $data = base64_encode($data);
    return openssl_encrypt($data, 'AES-256-CBC', $passphrase, OPENSSL_RAW_DATA, $iv);
}



function DOdecrypt($data) {
$passphrase = hex2bin(getenv('DATA_PASS_PHRASE'));
$iv = hex2bin(getenv('DATA_PASS_SEED'));
    $data = openssl_decrypt($data, 'AES-256-CBC', $passphrase, OPENSSL_RAW_DATA, $iv);
    $data = base64_decode($data);
    return $data;
}



function storeData($userID, $data) {
    $data = json_encode($data);
    $data = DOencrypt($data);
    $_SESSION[$userID] = $data;
    return TRUE;
}





function getData($userID) {
    if (empty($_SESSION[$userID])) {
        return FALSE;
    }

    $data = $_SESSION[$userID];
    $data = DOdecrypt($data);
    $data = json_decode($data,TRUE);
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





@endphp

