<?php
namespace App\Http\Controllers;
use App\Services\Notify;
?>

@include('framework.functions')
@php

$reference_number = 'REFNUM1242424';
$emailContent = '


Hi David / Jo - Can you let me know appears to work for printing on the below?


---
# Current Format
---

';

$emailContent .= 'Where is your bank account?


^ this is my content


';



$emailContent .= '

---
# HTML Character Format
---

';

$emailContent .= 'Where is your bank account?


&#9621; this is my content


▕ this is my content

&#9616; this is my content

▐ this is my content


&#9475; this is my content

┃ this is my content


';



$emailContent .= '

---
# Bullet Points
---

';

$emailContent .= 'Where is your bank account?


* this is my content


* this is an answer with lots of characters I dont know what or how notify will handle it Ive never typed exactly this sentence before and  certainly not in a Notify email, but I have done similar things to measure the length of things I suppose. No, not THAT. Text-based things. In HTML and other such outputs.


';





Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_CLAIM_SUBMITTED'));

Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));


Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('Joanne.McGee103@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));


@endphp



This should send an email
