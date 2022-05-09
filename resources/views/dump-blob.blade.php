<?php

\Sentry\captureMessage('test message');

if ($_SERVER['SERVER_NAME'] != 'modvets.local') {
    die();
}




?>

@include('framework.functions')
@php
$userID = $_SESSION['vets-user'];
$data = getData($userID);
$content = '';
$reference_number = 'WPS/AFCS/MOD/'.$data['settings']['customer_ref'];






//Safety dump

$string = '';

function returnData($arr) {
   GLOBAL $string;

    foreach($arr as $k=>$v) {
        if (is_array($v)) {
           returnData($v);
        } else {
            $string .= '

# '.$k.'<br />'.$v.'<br />

<br />
---
<br />
';
        }
    }
    return $string;
}


$fullContent = returnData($data);


echo "<pre>";
var_dump($data);

echo "</pre>";

@endphp






@include('framework.header')


    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

                <div class="govuk-panel govuk-panel--confirmation">
                  <h1 class="govuk-panel__title">
                    Application complete
                  </h1>
                  <div class="govuk-panel__body">
                    Your online claim reference is<br><strong>{{$reference_number}}</strong>
                  </div>
                </div>
            @php echo $fullContent; @endphp
            </div>
        </div>
    </main>
</div>






@include('framework.footer')
