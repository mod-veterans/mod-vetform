@include('framework.functions')
@php

if (!empty($_SESSION['vets-user'])) {
    if ($userID = $_SESSION['vets-user']) {
        deleteData($userID);
    }
}

header("Location: /");
die();

@endphp
