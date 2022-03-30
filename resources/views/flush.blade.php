@include('framework.functions')
@php

$userID = $_SESSION['vets-user'];

deleteData($userID);


header("Location: /");
die();

@endphp
