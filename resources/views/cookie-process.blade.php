<?php

if (!empty($_POST['cookies'])) {

    if ($_POST['cookies'] == 'Y') {
       setcookie('vet-COOKIE', 'Y', time() + (86400 * 30 * 365), '/');
       setcookie('vet-GA', 'Y', time() + (86400 * 30 * 365), '/');
       $showcookie = 'N';

    }

    if ($_POST['cookies'] == 'N') {
       setcookie('vet-COOKIE', 'N', time() + (86400 * 30 * 365), '/');
       $showcookie = 'N';
    }
}

if (!empty($_POST['refURL'])) {
    $refURL = urldecode($_POST['refURL']);
} else {
    $refURL = '/';
}

header("Location: ".$refURL);
die();
