<?php
namespace App\Http\Controllers;
use App\Services\Notify;
?>

@include('framework.functions')
@php
$userID = $_SESSION['vets-user'];
$data = getData($userID);
$content = '';
$reference_number = 'AFCS/MOD/'.$data['settings']['customer_ref'];





Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_USER_CONFIRMATION'));
Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail('Joanne.McGee103@mod.gov.uk', env('NOTIFY_USER_CONFIRMATION'));
//Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail('Yoann.Muya100@mod.gov.uk', env('NOTIFY_USER_CONFIRMATION'));
Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_USER_CONFIRMATION'));

if (!empty($data['sections']['about-you']['email'])) {
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail($data['sections']['about-you']['email'], env('NOTIFY_USER_CONFIRMATION'));
}


//send office email

$emailContent = '

---
#Personal details
---
#Surname or family name
'.@$data['sections']['about-you']['name']['lastname'].'

#All other names in full
'.@$data['sections']['about-you']['name']['firstname'].'

#Building and street
'.@$data['sections']['about-you']['contact-address']['address1'].'

#Building and street line 2 of 2
'.@$data['sections']['about-you']['contact-address']['address2'].'

#Town or city
'.@$data['sections']['about-you']['contact-address']['town'].'

#County
'.@$data['sections']['about-you']['contact-address']['county'].'

#Country
'.@$data['sections']['about-you']['contact-address']['country'].'

#Postcode
'.@$data['sections']['about-you']['contact-address']['postcode'].'

#Date of birth
'.@$data['sections']['about-you']['dob']['day'].' / '.@$data['sections']['about-you']['dob']['month'].' / '.@$data['sections']['about-you']['dob']['year'].'

#Do you have a mobile telephone number?
'.@$data['sections']['about-you']['telephonenumber']['doyouhavemobile'].' '.@$data['sections']['about-you']['telephonenumber']['mobile'].'


#Is there another number you can be contacted on?
'.@$data['sections']['about-you']['telephonenumber']['doyouhavealternative'].' '.@$data['sections']['about-you']['telephonenumber']['telephone'].'

#What is your email address
'.@$data['sections']['about-you']['telephonenumber']['email'].'

#NI Number
'.@$data['sections']['about-you']['ninumber'].'

#Pension scheme
'.@$data['sections']['about-you']['pensionscheme'].'

#Previously made a claim
'.@$data['sections']['about-you']['previous-claim'].'

#Previous claim reference number
'.@$data['sections']['about-you']['refnum'].'

#Have you served with or supported the Special Forces?
'.@$data['sections']['about-you']['epaw']['served'].'

#Express Prior Authority in Writing (EPAW) reference
'.@$data['sections']['about-you']['epaw']['epaw-reference'].'

---
#Medical Officer
---

#Medical Officer or GPs full name (if known
'.@$data['sections']['about-you']['medical-officer']['contactname'].'

#Building and street
'.@$data['sections']['about-you']['medical-officer']['address1'].'

#Building and street line 2 of 2
'.@$data['sections']['about-you']['medical-officer']['address2'].'

#Town or city
'.@$data['sections']['about-you']['medical-officer']['town'].'

#County
'.@$data['sections']['about-you']['medical-officer']['county'].'

#Country
'.@$data['sections']['about-you']['medical-officer']['country'].'

#Postcode
'.@$data['sections']['about-you']['medical-officer']['postcode'].'

#Telephone number
'.@$data['sections']['about-you']['medical-officer']['telephonenumber'].'

---
#Service details
---
';

if (!empty($data['sections']['service-details']['records'])) {
foreach ($data['sections']['service-details']['records'] as $serviceRecord) {

if (!empty($serviceRecord['nameinservice'])) {
    $nameshow = $serviceRecord['nameinservice'];
    if ($serviceRecord['donotwanttodisclose'] == 'Yes') {
        $nameshow = 'Would rather not disclose';
    }
} else {
    $nameshow = 'no different name';
}


$emailContent .= '


#Did you have a different name during this period of service
'.@$serviceRecord['differentname'].'

#Enter the full name in service
'.@$nameshow.'

#Enter the service number
'.@$serviceRecord['servicenumber'].'

#Select your service branch
'.@$serviceRecord['servicebranch'].'

#What was/is your service type?
'.@$serviceRecord['servicetype'].'

#Service rank
'.@$serviceRecord['service-rank'].'

#Service trade
'.@$serviceRecord['specialism'].'

#Date of enlistment
'.@$serviceRecord['service-enlistmentdate']['day'].' / '.@$serviceRecord['service-enlistmentdate']['month'].' // '.@$serviceRecord['service-enlistmentdate']['year'];

if ($serviceRecord['service-enlistmentdate']['approximate'] == 'Yes') {
$emailContent .= '(This date is approximate)';
}

$emailContent .= '


#Discharge date
'.@$serviceRecord['service-dischargedate']['day'].' / '.@$serviceRecord['service-dischargedate']['month'].' / '.@$serviceRecord['service-dischargedate']['year'];

if ($serviceRecord['service-dischargedate']['approximate'] == 'Yes') {
$emailContent .= '(This date is approximate)';
}

$emailContent .= '

#I am still serving
'.@$serviceRecord['service-dischargedate']['stillserving'].'

#Discharge reason
'.@$serviceRecord['service-dischargedate']['dischargereason'].'

#last unit address - Base, Building and Street
'.@$serviceRecord['unit-address']['address1'].'

#Building and street line 2 of 2
'.@$serviceRecord['unit-address']['address2'].'

#Town or city
'.@$serviceRecord['unit-address']['town'].'

#County
'.@$serviceRecord['unit-address']['county'].'

#Country
'.@$serviceRecord['unit-address']['country'].'

#Postcode
'.@$serviceRecord['unit-address']['postcode'].'


';

}
}









Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_CLAIM_SUBMITTED'));
Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $fullContent])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));
Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $fullContent])->sendEmail('Joanne.McGee103@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));






@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Your application has been submitted</h1>
    <p class="govuk-body">Thank you for completing an application for an Armed forces compensation or war pension payment.</p>
    <p class="govuk-body">Your online claim reference number is <strong>{{$reference_number}}</strong>.</p>
    <p class="govuk-body">Please note that as your claim has now been fully submitted, you can no longer access your application online. If you need to make any changes to your application, or would like a copy of it, please <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">contact us</a>, quoting your national insurance number.</p>


    <h2>We welcome your feedback</h2>
    <p class="govuk-body">We would like to know your views about using our online claims service today. Please consider completing our short <a href="https://surveys.mod.uk/index.php/892274?lang=en" target="_New">user survey</a> to tell us how we can improve.</p>

    <h2>What happens next</h2>
    <p class="govuk-body">Your application has now been received at Veterans UK. We will carefully consider the information you have told us and will obtain any evidence we need to assess your claim. We will contact you if we need any more information. The assessment process can be complex and involves gathering information from many sources. This can take some time and whilst we will process your claim as quickly as possible, it may take 3 to 9 months to receive a decision.</p>

    <h2>How to get in touch</h2>
    <p class="govuk-body">We will write and tell you the outcome of your claim as soon as a decision has been made. In the meantime, you can <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">contact us</a> if you would like an update on progress or if you have any questions.</p>

    <h2 class="govuk-heading-m">Do you need further help or support?</h2>
    <p class="govuk-body">All veterans and their families are entitled to free help and support from Veterans UK at any time. This includes a free helpline and Veterans Welfare Service that can assist with welfare information including benefits, help in the home, employment and financial support. More information can be found at <a href="https://www.gov.uk/guidance/urgent-help-for-veterans" target="_New">https://www.gov.uk/guidance/urgent-help-for-veterans</a> </p>

 <p class="govuk-body">Thank you<br />MOD Veterans UK</p>


            </div>
        </div>
    </main>
</div>






@include('framework.footer')
