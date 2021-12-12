@include('framework.functions')
@php

$userID = $_SESSION['vets-user'];


unset ($_SESSION[$userID]);
unset ($_SESSION['vets-user']);


header("Location: /");
die();

@endphp
