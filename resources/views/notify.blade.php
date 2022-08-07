<?php
namespace App\Http\Controllers;
use App\Services\Notify;
?>

@include('framework.functions')
@php

$reference_number = 'REFNUM1242424';


$emailContent = '

---
# HTML Character Format
---

';

$emailContent .= 'Where is your bank account?


▐ this is my content


Another question


▐ this is my content 2



Filename.mp4 ( '.wordwrap('https://www.powered-byreason.co.uk/thisisaverylong-URLthatca-annotbenatu-rallybrokend-uetoithavingnonatural-breakingpointss-uchasspacesandtheo-bjectiveistotr-yandwrapitwhi-lstretainingi-tbeingcopiableasaurl',60,'
',FALSE).')



';






Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_CLAIM_SUBMITTED'));

Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));


Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('Joanne.McGee103@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));


@endphp



This should send an email
