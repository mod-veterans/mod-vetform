<?php
namespace App\Http\Controllers;
use App\Services\Notify;
?>

@include('framework.functions')
@php



$userID = $_SESSION['vets-user'];


$content = 'Hello this is the content';
$reference_number = 'AFCS/MOD/359325927725985';





Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_USER_CONFIRMATION'));

@endphp



This should send an email
