@php
session_start();


if (empty($_SESSION['vets-user'])) {
    $userID = md5(rand(0,65535).microtime().rand(0,65535));
    $_SESSION['vets-user'] = $userID;
} else {
    $userID = $_SESSION['vets-user'];
}


//temp passphrase - to be moved to env



function DOencrypt($data) {
$passphrase = hex2bin('5ae1b8a17bad4da4fdac796f64c16ecd');
$iv = hex2bin('34857d973953e44afb49ea9d61104d8c');

    $data = base64_encode($data);
    return openssl_encrypt($data, 'AES-256-CBC', $passphrase, OPENSSL_RAW_DATA, $iv);
}



function DOdecrypt($data) {
$passphrase = hex2bin('5ae1b8a17bad4da4fdac796f64c16ecd');
$iv = hex2bin('34857d973953e44afb49ea9d61104d8c');
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






@endphp

