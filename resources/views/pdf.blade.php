<?php
namespace App\Http\Controllers;
// Reference the Dompdf namespace
use Dompdf\Dompdf;

// Instantiate and use the dompdf class
$dompdf = new Dompdf();

?>
@include('framework.functions')
<?php
$userID = $_SESSION['vets-user'];
$data = getData($userID);
$content = '';
$reference_number = 'WPS/AFCS/MOD/'.$data['settings']['customer_ref'];




$html = '


<hr /><h2>Time Started</h2>
'.date('d-m-Y, H:i:s', strtotime($data['settings']['time_started'])).'

<hr /><h2>Who is making this application</h2>
';

if (!empty($data['sections']['applicant-who']['who is making this application'])) {
switch ($data['sections']['applicant-who']['who is making this application']) {

	case "The person named on this claim is making the application.":

$html .= '<br /><br /><strong>
Who is making this application


</strong><br />The person named on this claim is making the application.

';


if(!empty($data['sections']['applicant-who']['apply-yourself']['epaw']['served'])) {
$html .= '<br /><br /><strong>
Have you ever served in or supported the Special Forces?


</strong><br />'.$data['sections']['applicant-who']['apply-yourself']['epaw']['served'].'

';
}

if(!empty($data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-1'])) {
$html .= '<br /><br /><strong>EPAW reference number


</strong><br />'.$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-1'].' - '.$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-2'].' / '.$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-3'].' / '.$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-4'].'

';
}



break;

case "I am making an application for someone else and I have legal authority to act on their behalf.":

$html .= '<br /><br /><strong>
Who is making this application


</strong><br />'.@$data['sections']['applicant-who']['who is making this application'].'

';

if(!empty($data['sections']['applicant-who']['legal-authority']['epaw']['served'])) {
$html .= '<br /><br /><strong>
Has the person you are applying for ever served in or supported the special forces?


</strong><br />'.$data['sections']['applicant-who']['legal-authority']['epaw']['served'].'

';
}

if(!empty($data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1'])) {
$html .= '<br /><br /><strong>
EPAW reference number


</strong><br />'.$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1'].' - '.$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-2'].' / '.$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-3'].' / '.$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-4'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['fullname'])) {
$html .= '<br /><br /><strong>Your full name


</strong><br />'.@$data['sections']['applicant-who']['legal authority']['fullname'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['address1'])) {
$html .= '<br /><br /><strong>Building and street


</strong><br />'.@$data['sections']['applicant-who']['legal authority']['address1'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['address2'])) {
$html .= '<br /><br /><strong>
</strong><br />'.@$data['sections']['applicant-who']['legal authority']['address2'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['town'])) {
$html .= '<br /><br /><strong>
</strong><br />'.@$data['sections']['applicant-who']['legal authority']['town'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['county'])) {
$html .= '<br /><br /><strong>
</strong><br />'.@$data['sections']['applicant-who']['legal authority']['county'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['country'])) {
$html .= '<br /><br /><strong>
</strong><br />'.@$data['sections']['applicant-who']['legal authority']['country'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['postcode'])) {
$html .= '<br /><br /><strong>
</strong><br />'.@$data['sections']['applicant-who']['legal authority']['postcode'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['nominee-number'])) {
$html .= '<br /><br /><strong>Telephone number


</strong><br />'.@$data['sections']['applicant-who']['legal authority']['nominee-number'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['details'])) {
$html .= '<br /><br /><strong>What legal authority do you have to make a claim on behalf of the person named?


</strong><br />'.@$data['sections']['applicant-who']['legal authority']['details'].'

';
}



break;


case "I am helping someone else make this application.":
$html .= '<br /><br /><strong>Who is making this application


</strong><br />I am helping someone else make this application.


<br /><br /><strong>Name of assistant making this claim


</strong><br />'.@$data['sections']['applicant-who']['helper']['name'].'


<br /><br /><strong>Relationship to claimant


</strong><br />'.@$data['sections']['applicant-who']['helper']['relationship'].'


';

if(!empty($data['sections']['applicant-who']['helper']['relationship-when'])) {

$html .='

<br /><br /><strong>When did the person you are helping first contact you?


</strong><br />'.@$data['sections']['applicant-who']['helper']['relationship-when']['whendate'].' '.@$data['sections']['applicant-who']['helper']['relationship-when']['dontknow'];

}


$html .='

<br /><br /><strong>Assisted claim declaration understood


</strong><br />'.@$data['sections']['applicant-who']['helper']['declaration'].'


<br /><br /><strong>Has the person you are helping ever served in or supported the special forces?


</strong><br />'.@$data['sections']['applicant-who']['helper']['epaw']['served'].'

';

if(!empty($data['sections']['applicant-who']['helper']['epaw']['epaw-reference-1'])) {

$html .= '<br /><br /><strong>
EPAW Reference Number</strong><br />

'.$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-1'].' - '.$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-2'].' / '.$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-3'].' / '.$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-4'].'

';

}


break;


}
}


$html .= '

<hr /><h2>Nominate a representative</h2>

';

if (!empty($data['sections']['nominate-representative']['nominate-representative'])) {
switch ($data['sections']['nominate-representative']['nominate-representative']) {

case "Yes":

$html .= '<br /><br /><strong>Would you like to nominate a representative?


</strong><br />Yes';


if(!empty($data['sections']['nominate-representative']['nominated representative']['fullname'])) {
$html .= '<br /><br /><strong>Representative\'s full name


</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['fullname'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['address1'])) {
$html .= '<br /><br /><strong>Building and street


</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['address1'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['address2'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['address2'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['town'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['town'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['county'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['county'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['country'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['country'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['postcode'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['postcode'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['nominee-number'])) {
$html .= '<br /><br /><strong>Telephone number


</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['nominee-number'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['email-address'])) {
$html .= '<br /><br /><strong>Email address


</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['email-address'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['role'])) {
$html .= '<br /><br /><strong>What is your representative&#039;s role?


</strong><br />'.$data['sections']['nominate-representative']['nominated representative']['role'].'

';
}


break;

case "No":
$html .='


<br /><br /><strong>Would you like to nominate a representative?


</strong><br />'.@$data['sections']['nominate-representative']['nominate-representative'].'

';

break;

}
}


$html .= '
<hr /><h2>Personal details</h2>
';

if(!empty($data['sections']['about-you']['name']['lastname'])) {
$html .='

<br /><br /><strong>Surname or family name


</strong><br />'.$data['sections']['about-you']['name']['lastname'].'

';
}

if(!empty($data['sections']['about-you']['name']['firstname'])) {
$html .='

<br /><br /><strong>All other names in full


</strong><br />'.$data['sections']['about-you']['name']['firstname'].'

';
}

if(!empty($data['sections']['about-you']['name']['title'])) {
$html .='

<br /><br /><strong>Title


</strong><br />'.$data['sections']['about-you']['name']['title'].'

';
}


if(!empty($data['sections']['about-you']['contact-address']['address1'])) {
$html .='

<br /><br /><strong>Address Building and street


</strong><br />'.$data['sections']['about-you']['contact-address']['address1'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['address2'])) {
$html .='
<br />'.$data['sections']['about-you']['contact-address']['address2'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['town'])) {
$html .='
<br />'.$data['sections']['about-you']['contact-address']['town'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['county'])) {
$html .='
<br />'.$data['sections']['about-you']['contact-address']['county'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['country'])) {
$html .='
<br />'.$data['sections']['about-you']['contact-address']['country'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['postcode'])) {
$html .='
<br />'.$data['sections']['about-you']['contact-address']['postcode'].'

';
}

if(!empty($data['sections']['about-you']['dob'])) {
$html .='

<br /><br /><strong>Date of birth


</strong><br />'.$data['sections']['about-you']['dob']['day'].' / '.$data['sections']['about-you']['dob']['month'].' / '.$data['sections']['about-you']['dob']['year'].'

';
}

if (!empty($data['sections']['about-you']['telephonenumber']['doyouhavemobile'])) {
    $html .='

Mobile telephone number?';
    if ($data['sections']['about-you']['telephonenumber']['doyouhavemobile'] == 'No') {
        $html .= '<br /><br /><strong>

</strong><br />No';
    }elseif ($data['sections']['about-you']['telephonenumber']['doyouhavemobile'] == 'Yes') { $html .='



</strong><br />'.$data['sections']['about-you']['telephonenumber']['mobile'].'

';
    }


if (!empty($data['sections']['about-you']['telephonenumber']['mobilepermission'])) {

$html .='

Mobile contact permission:

</strong><br />'.$data['sections']['about-you']['telephonenumber']['mobilepermission'].'

';
}


}



if (!empty($data['sections']['about-you']['telephonenumber']['doyouhavealternative'])) {
    $html .='

Alternative telephone number:';
    if ($data['sections']['about-you']['telephonenumber']['doyouhavealternative'] == 'No') {
    $html .='

No';
    }elseif ($data['sections']['about-you']['telephonenumber']['doyouhavealternative'] == 'Yes') {
    $html .='



</strong><br />'.$data['sections']['about-you']['telephonenumber']['telephone'].'

';
    }
}

if(!empty($data['sections']['about-you']['email'])) {
$html .='

What is your email address


</strong><br />'.$data['sections']['about-you']['email'].'

';
}


if (!empty($data['sections']['about-you']['email-address']['emailpermission'])) {

$html .='

Email contact permission:

</strong><br />'.$data['sections']['about-you']['email-address']['emailpermission'].'

';
}





if(!empty($data['sections']['about-you']['ninumber'])) {
$html .='

NI Number

</strong><br />'.$data['sections']['about-you']['ninumber'].'

';
}

if(!empty($data['sections']['about-you']['pensionscheme'])) {
$html .='

Pension scheme


</strong><br />'.$data['sections']['about-you']['pensionscheme'].'

';
}

if(!empty($data['sections']['about-you']['previous-claim'])) {
$html .='

Previous claim made


</strong><br />'.$data['sections']['about-you']['previous-claim'].'

';
}

if(!empty($data['sections']['about-you']['refnum'])) {
$html .='

Previous claim reference number


</strong><br />'.$data['sections']['about-you']['refnum'].'

';
}

if(!empty($data['sections']['about-you']['epaw']['served'])) {
$html .='

Express Prior Authority in Writing (EPAW) reference


</strong><br />'.$data['sections']['about-you']['epaw']['served'].'

';
}

if(!empty($data['sections']['about-you']['epaw']['epaw-reference'])) {
$html .='

EPAW reference number


</strong><br />'.$data['sections']['about-you']['epaw']['epaw-reference'] ?? 'not served with Special Forces';
}


$html .='


<hr /><h2>Doctor or medical officer (if serving)</h2>
';

if(!empty($data['sections']['about-you']['medical-officer']['contactname'])) {
$html .='

Medical Officer or GP&#039;s full name (if known)


</strong><br />'.$data['sections']['about-you']['medical-officer']['contactname'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['address1'])) {
$html .='

Practice, Building and street (Medical officer or GP)


</strong><br />'.$data['sections']['about-you']['medical-officer']['address1'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['address2'])) {
$html .='
</strong><br />'.$data['sections']['about-you']['medical-officer']['address2'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['town'])) {
$html .='
</strong><br />'.$data['sections']['about-you']['medical-officer']['town'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['county'])) {
$html .='
</strong><br />'.$data['sections']['about-you']['medical-officer']['county'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['country'])) {
$html .='
</strong><br />'.$data['sections']['about-you']['medical-officer']['country'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['postcode'])) {
$html .='
</strong><br />'.$data['sections']['about-you']['medical-officer']['postcode'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['telephonenumber'])) {
$html .='
</strong><br />'.$data['sections']['about-you']['medical-officer']['telephonenumber'].'

';
}


$html .='


<hr /><h2>Service details</h2>
';

if (!empty($data['sections']['service-details']['records'])) {
$serviceCount = 1;
foreach ($data['sections']['service-details']['records'] as $serviceRecord) {

$html .='



#Service Record '.$serviceCount.'</h2>
';


if(!empty($serviceRecord['differentname'])) {
$html .='

Did you have a different name during this period of service?

</strong><br />'.$serviceRecord['differentname'].'

';

}

if (!empty($serviceRecord['nameinservice'])) {

$html .='

Enter the full name in service

</strong><br />'.$serviceRecord['nameinservice'];

}

if (!empty($serviceRecord['donotwanttodisclose'])) {

$html .='

Do not want to disclose

</strong><br />'.$serviceRecord['donotwanttodisclose'];

}





if(!empty($serviceRecord['servicenumber'])) {
$html .='

Service number


</strong><br />'.$serviceRecord['servicenumber'].'

';
}

if(!empty($serviceRecord['servicebranch'])) {
$html .='

Service branch


</strong><br />'.$serviceRecord['servicebranch'].'

';
}

if(!empty($serviceRecord['servicetype'])) {
$html .='

Service type?


</strong><br />'.$serviceRecord['servicetype'].'

';
}

if(!empty($serviceRecord['service-rank'])) {
$html .='

Service rank


</strong><br />'.$serviceRecord['service-rank'].'

';
}

if(!empty($serviceRecord['specialism1'])) {
$html .='

Service trades and durations

</strong><br /> 1. '.@$serviceRecord['specialism1'].' - '.@$serviceRecord['specialism1Duration'].'
';
}

if(!empty($serviceRecord['specialism2'])) {
$html .='
</strong><br /> 2. '.@$serviceRecord['specialism2'].' - '.@$serviceRecord['specialism2Duration'].'
';
}

if(!empty($serviceRecord['specialism3'])) {
$html .='
</strong><br /> 3. '.@$serviceRecord['specialism3'].' - '.@$serviceRecord['specialism3Duration'].'
';
}

if(!empty($serviceRecord['specialism4'])) {
$html .='
</strong><br /> 4. '.@$serviceRecord['specialism4'].' - '.@$serviceRecord['specialism4Duration'].'
';
}

if(!empty($serviceRecord['specialism5'])) {
$html .='
</strong><br /> 5. '.@$serviceRecord['specialism5'].' - '.@$serviceRecord['specialism5Duration'].'
';
}

if(!empty($serviceRecord['specialism6'])) {
$html .='
</strong><br /> 6. '.@$serviceRecord['specialism6'].' - '.@$serviceRecord['specialism6Duration'].'
';
}

if(!empty($serviceRecord['specialism7'])) {
$html .='
</strong><br /> 7. '.@$serviceRecord['specialism7'].' - '.@$serviceRecord['specialism7Duration'].'
';
}

if(!empty($serviceRecord['specialism8'])) {
$html .='
</strong><br /> 8. '.@$serviceRecord['specialism8'].' - '.@$serviceRecord['specialism8Duration'].'
';
}

if(!empty($serviceRecord['specialism9'])) {
$html .='
</strong><br /> 9. '.@$serviceRecord['specialism9'].' - '.@$serviceRecord['specialism9Duration'].'
';
}

if(!empty($serviceRecord['specialism10'])) {
$html .='
</strong><br /> 10. '.@$serviceRecord['specialism10'].' - '.@$serviceRecord['specialism10Duration'].'
';
}








if(!empty($serviceRecord['service-enlistmentdate']['year'])) {
$html .='

Enlistment Date


</strong><br />'.@$serviceRecord['service-enlistmentdate']['day'].' / '.@$serviceRecord['service-enlistmentdate']['month'].' / '.$serviceRecord['service-enlistmentdate']['year'].'

';
}

if ( (!empty($serviceRecord['service-enlistmentdate']['approximate'])) && ($serviceRecord['service-enlistmentdate']['approximate'] == 'Yes') ) {
$html .='



</strong><br />(This date is approximate)';

}

if(!empty($serviceRecord['service-dischargedate']['year'])) {
$html .='

Discharge date


</strong><br />'.@$serviceRecord['service-dischargedate']['day'].' /  '.@$serviceRecord['service-dischargedate']['month'].' /  '.$serviceRecord['service-dischargedate']['year'].'

';


 if ( (!empty($serviceRecord['service-dischargedate']['approximate'])) && ($serviceRecord['service-dischargedate']['approximate'] == 'Yes') ) {
 $html .='



</strong><br />(This date is approximate)';
 }


}

if(!empty($serviceRecord['service-dischargedate']['stillserving'])) {
$html .='

Still serving


</strong><br />'.$serviceRecord['service-dischargedate']['stillserving'].'

';
}

if(!empty($serviceRecord['service-dischargedate']['dischargereason'])) {
$html .='

Discharge reason


</strong><br />'.$serviceRecord['service-dischargedate']['dischargereason'].'

';
}

if(!empty($serviceRecord['unit-address']['address1'])) {
$html .='

Last Unit - Base, Building and Street


</strong><br />'.$serviceRecord['unit-address']['address1'].'

';
}

if(!empty($serviceRecord['unit-address']['address2'])) {
$html .='
</strong><br />'.$serviceRecord['unit-address']['address2'].'

';
}

if(!empty($serviceRecord['unit-address']['town'])) {
$html .='
</strong><br />'.$serviceRecord['unit-address']['town'].'

';
}

if(!empty($serviceRecord['unit-address']['county'])) {
$html .='
</strong><br />'.$serviceRecord['unit-address']['county'].'

';
}

if(!empty($serviceRecord['unit-address']['country'])) {
$html .='
</strong><br />'.$serviceRecord['unit-address']['country'].'

';
}

if(!empty($serviceRecord['unit-address']['postcode'])) {
$html .='
</strong><br />'.$serviceRecord['unit-address']['postcode'].'

';
}

$serviceCount++;
} //end foreach
} //end if service


//Claim

$html .= '<br /><br /><strong>

<hr /><h2>Claims</h2>

';


if (!empty($data['sections']['claims']['records'])) {

$claimCount = 1;


foreach ($data['sections']['claims']['records'] as $claimRecord) {


$html .='
#Claim Record '.$claimCount.'</h2>
';


if(!empty($claimRecord['type'])) {
$html .='

Type of medical condition


</strong><br />'.$claimRecord['type'].'

';
}

if(!empty($claimRecord['non-specific']['condition'])) {
$html .='

What medical condition(s) are you claiming for?


</strong><br />'.$claimRecord['non-specific']['condition'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['name'])) {
$html .='

Diagnosing Medical Practitioner (if known)


</strong><br />'.$claimRecord['non-specific']['hospital-address']['name'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['address1'])) {
$html .='
</strong><br />'.$claimRecord['non-specific']['hospital-address']['address1'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['address2'])) {
$html .='
</strong><br />'.$claimRecord['non-specific']['hospital-address']['address2'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['town'])) {
$html .='
</strong><br />'.$claimRecord['non-specific']['hospital-address']['town'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['county'])) {
$html .='
</strong><br />'.$claimRecord['non-specific']['hospital-address']['county'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['country'])) {
$html .='
</strong><br />'.$claimRecord['non-specific']['hospital-address']['country'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['postcode'])) {
$html .='
</strong><br />'.$claimRecord['non-specific']['hospital-address']['postcode'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['telephone'])) {
$html .='

Telephone number


</strong><br />'.$claimRecord['non-specific']['hospital-address']['telephone'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['email'])) {
$html .='

Email


</strong><br />'.$claimRecord['non-specific']['hospital-address']['email'].'

';
}

if(!empty($claimRecord['condition-start-date']['year'])) {
$html .='

What was the date your condition started?


</strong><br />'.@$claimRecord['condition-start-date']['day'].' / '.@$claimRecord['condition-start-date']['month'].' /  '.$claimRecord['condition-start-date']['year'].'

';
}

if(!empty($claimRecord['condition-start-date']['approximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['condition-start-date']['approximate'].'

';
}

if(!empty($claimRecord['related-conditions'])) {
$html .='

What is your illness/condition related to


</strong><br />'.$claimRecord['related-conditions'].'

';
}

if(!empty($claimRecord['related-exposure'])) {
$html .='

Illness/condition due to exposure to? (Cold / Heat / Noise, for example gunfire / Vibration, for example from using tools /Chemical exposure)


</strong><br />'.$claimRecord['related-exposure'].'

';
}

if(!empty($claimRecord['exposure-date']['substances'])) {
$html .='

Chemical Exposure - what substances were you exposed to?


</strong><br />'.$claimRecord['exposure-date']['substances'].'

';
}

if(!empty($claimRecord['exposure-date']['year'])) {
$html .='

Chemical Exposure - date of first exposure?


</strong><br />'.@$claimRecord['exposure-date']['day'].' / '.@$claimRecord['exposure-date']['month'].' / '.$claimRecord['exposure-date']['year'].'

';
}

if(!empty($claimRecord['exposure-date']['length'])) {
$html .='

Chemical Exposure - length of exposure?


</strong><br />'.$claimRecord['exposure-date']['length'].'

';
}

if(!empty($claimRecord['medical-attention']['year'])) {
$html .='

When did you first seek medical attention?


</strong><br />'.@$claimRecord['medical-attention']['day'].' / '.@$claimRecord['medical-attention']['month'].' /  '.$claimRecord['medical-attention']['year'].'

';
}

if(!empty($claimRecord['medical-attention']['approximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['medical-attention']['approximate'].'

';
}

if(!empty($claimRecord['downgraded'])) {
$html .='

Were you downgraded for any of the conditions on this claim?


</strong><br />'.$claimRecord['downgraded'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-start']['fromyear'])) {
$html .='

Date downgraded start


</strong><br />'.@$claimRecord['non-specific']['downgraded-start']['fromday'].' / '.@$claimRecord['non-specific']['downgraded-start']['frommonth'].' / '.$claimRecord['non-specific']['downgraded-start']['fromyear'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-start']['datesapproximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['non-specific']['downgraded-start']['datesapproximate'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-end']['toyear'])) {
$html .='

Date downgraded end


</strong><br />'.@$claimRecord['non-specific']['downgraded-end']['today'].' / '.@$claimRecord['non-specific']['downgraded-end']['tomonth'].' / '.$claimRecord['non-specific']['downgraded-end']['toyear'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-end']['datesapproximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['non-specific']['downgraded-end']['datesapproximate'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-end']['stilldowngraded'])) {
$html .='

Still downgraded?


</strong><br />'.$claimRecord['non-specific']['downgraded-end']['stilldowngraded'].'

';
}

if(!empty($claimRecord['non-specific']['medical-categories']['frommedical'])) {
$html .='

What medical category were you downgraded from?


</strong><br />'.$claimRecord['non-specific']['medical-categories']['frommedical'].'

';
}

if(!empty($claimRecord['non-specific']['medical-categories']['tomedical'])) {
$html .='

What medical category were you downgraded to?


</strong><br />'.$claimRecord['non-specific']['medical-categories']['tomedical'].'

';
}

if(!empty($claimRecord['non-specific']['medical-categories']['multiple'])) {
$html .='

I was downgraded and upgraded more than once within different categories?


</strong><br />'.$claimRecord['non-specific']['medical-categories']['multiple'].'

';
}

if(!empty($claimRecord['non-specific']['why'])) {
$html .='

Why is your condition related to your armed forces service?


</strong><br />'.$claimRecord['non-specific']['why'].'

';
}



if(!empty($claimRecord['specific']['pt-related'])) {
$html .='

Was the incident or accident related to sport, adventure training or physical training?


</strong><br />'.$claimRecord['specific']['pt-related'].'

';
}


if(!empty($claimRecord['specific']['non-pt']['conditions'])) {
$html .='

What medical condition(s) are you claiming for?


</strong><br />'.$claimRecord['specific']['non-pt']['conditions'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['name'])) {
$html .='

Diagnosing Medical Practitioner (if known)


</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['name'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['address1'])) {
$html .='
</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['address1'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['address2'])) {
$html .='
</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['address2'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['town'])) {
$html .='
</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['town'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['county'])) {
$html .='
</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['county'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['country'])) {
$html .='
</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['country'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['postcode'])) {
$html .='
</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['postcode'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['telephone'])) {
$html .='

Telephone number


</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['telephone'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['email'])) {
$html .='

Email


</strong><br />'.$claimRecord['specific']['non-pt']['hospital-address']['email'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['condition-start-date']['year'])) {
$html .='

What was the date your condition started?


</strong><br />'.@$claimRecord['specific']['non-pt']['condition-start-date']['day'].' / '.@$claimRecord['specific']['non-pt']['condition-start-date']['month'].' / '.$claimRecord['specific']['non-pt']['condition-start-date']['year'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['condition-start-date']['approximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['specific']['non-pt']['condition-start-date']['approximate'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['on-duty'])) {
$html .='

Were you on duty at the time of the incident?


</strong><br />'.$claimRecord['specific']['non-pt']['on-duty'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['report-incident'])) {
$html .='

Did you report the incident?


</strong><br />'.$claimRecord['specific']['non-pt']['report-incident'].'

';
}


if ((!empty($claimRecord['specific']['non-pt']['report-incident'])) && ($claimRecord['specific']['non-pt']['report-incident'] == 'Yes')) {

if(!empty($claimRecord['specific']['non-pt']['who-reported'])) {
$html .='

Who did you report the incident to?


</strong><br />'.$claimRecord['specific']['non-pt']['who-reported'].'

';
}
}

if(!empty($claimRecord['specific']['non-pt']['accident-form'])) {
$html .='

Was an accident form completed?


</strong><br />'.$claimRecord['specific']['non-pt']['accident-form'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['where-were-you'])) {
$html .='

Where were you when the incident happened?


</strong><br />'.$claimRecord['specific']['non-pt']['where-were-you'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['rta'])) {
$html .='

Was the incident a road traffic accident?


</strong><br />'.$claimRecord['specific']['non-pt']['rta'].'

';
}


if ( (!empty($claimRecord['specific']['non-pt']['rta'])) && ($claimRecord['specific']['non-pt']['rta'] == 'Yes')) {

    if(!empty($claimRecord['specific']['non-pt']['journey-reason'])) {
    $html .='

What was the reason for your journey?


</strong><br />'.$claimRecord['specific']['non-pt']['journey-reason'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['journey-start'])) {
    $html .='

Where did your journey start?


</strong><br />'.$claimRecord['specific']['non-pt']['journey-start'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['journey-end'])) {
    $html .='

Where did your journey end?


</strong><br />'.$claimRecord['specific']['non-pt']['journey-end'].'

';
    }

}

if(!empty($claimRecord['specific']['non-pt']['police-reported'])) {
$html .='

Was the incident reported to the civilian or military police?


</strong><br />'.$claimRecord['specific']['non-pt']['police-reported'].'

';
}


if ((!empty($claimRecord['specific']['non-pt']['police-reported'])) && ($claimRecord['specific']['non-pt']['police-reported'] == 'Yes')) {
$html .='

Police reference?


</strong><br />Civilian Case Ref: '.$claimRecord['specific']['non-pt']['police-report']['civilian-ref'].'


</strong><br />Military Case Ref: '.$claimRecord['specific']['non-pt']['police-report']['military-ref'].'


</strong><br />I don\'t know: '.$claimRecord['specific']['non-pt']['police-report']['dontknow'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['authorised-leave'])) {
$html .='

Were you on authorised leave?


</strong><br />'.$claimRecord['specific']['non-pt']['authorised-leave'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['witnesses'])) {
$html .='

Were there any witnesses?


</strong><br />'.$claimRecord['specific']['non-pt']['witnesses'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['firstaid'])) {
$html .='

Did you receive first aid treatment?


</strong><br />'.$claimRecord['specific']['non-pt']['firstaid'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital'])) {
$html .='

Did you go to, or were you taken to, a hospital or medical facility?


</strong><br />'.$claimRecord['specific']['non-pt']['hospital'].'

';
}

if ( (!empty($claimRecord['specific']['non-pt']['hospital'])) && ($claimRecord['specific']['non-pt']['hospital'] == 'Yes')) {

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['name'])) {
    $html .='

Name of hospital/Medical Practitioner (if known)


</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['name'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['address1'])) {
    $html .='
</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['address1'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['address2'])) {
    $html .='
</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['address2'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['town'])) {
    $html .='
</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['town'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['county'])) {
    $html .='
</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['county'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['country'])) {
    $html .='
</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['country'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['postcode'])) {
    $html .='
</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['postcode'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['telephone'])) {
    $html .='

Telephone number


</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['telephone'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['email'])) {
    $html .='

Email


</strong><br />'.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['email'].'

';
    }

}


if(!empty($claimRecord['specific']['non-pt']['downgraded'])) {
$html .='

Were you downgraded for any of the conditions on this claim?


</strong><br />'.$claimRecord['specific']['non-pt']['downgraded'].'

';
}


if (!empty($claimRecord['specific']['non-pt']['downgraded-start']['fromyear'])) {
$html .='

Date downgraded from


</strong><br />'.@$claimRecord['specific']['non-pt']['downgraded-start']['fromday'].' / '.@$claimRecord['specific']['non-pt']['downgraded-start']['frommonth'].' / '.$claimRecord['specific']['non-pt']['downgraded-start']['fromyear'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['downgraded-start']['datesapproximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['specific']['non-pt']['downgraded-start']['datesapproximate'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['downgraded-end']['toyear'])) {
$html .='

Date downgraded to


</strong><br />'.@$claimRecord['specific']['non-pt']['downgraded-end']['today'].' / '.@$claimRecord['specific']['non-pt']['downgraded-end']['tomonth'].' /

</strong><br />'.$claimRecord['specific']['non-pt']['downgraded-end']['toyear'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['downgraded-end']['datesapproximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['specific']['non-pt']['downgraded-end']['datesapproximate'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['downgraded-end']['stilldowngraded'])) {
$html .='

Still downgraded?


</strong><br />'.$claimRecord['specific']['non-pt']['downgraded-end']['stilldowngraded'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['medical-categories']['frommedical'])) {
$html .='

What medical category were you downgraded from?


</strong><br />'.$claimRecord['specific']['non-pt']['medical-categories']['frommedical'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['medical-categories']['tomedical'])) {
$html .='

What medical category were you downgraded from?


</strong><br />'.$claimRecord['specific']['non-pt']['medical-categories']['tomedical'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['medical-categories']['multiple'])) {
$html .='

I was downgraded and upgraded more than once within different categories?


</strong><br />'.$claimRecord['specific']['non-pt']['medical-categories']['multiple'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['why'])) {
$html .='

Why is your condition related to your armed forces service?


</strong><br />'.$claimRecord['specific']['non-pt']['why'].'

';
}


if(!empty($claimRecord['specific']['pt']['conditions'])) {
$html .='

What medical condition(s) are you claiming for?


</strong><br />'.$claimRecord['specific']['pt']['conditions'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['name'])) {
$html .='

Diagnosing Medical Practitioner (if known)


</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['name'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['address1'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['address1'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['address2'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['address2'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['town'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['town'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['county'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['county'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['country'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['country'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['postcode'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['postcode'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['telephone'])) {
$html .='

Telephone number


</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['telephone'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['email'])) {
$html .='

Email


</strong><br />'.$claimRecord['specific']['pt']['hospital-address']['email'].'

';
}

if(!empty($claimRecord['specific']['pt']['condition-start-date']['year'])) {
$html .='

What was the date your condition started?


</strong><br />'.@$claimRecord['specific']['pt']['condition-start-date']['day'].' / '.@$claimRecord['specific']['pt']['condition-start-date']['month'].' / '.$claimRecord['specific']['pt']['condition-start-date']['year'].'

';
}

if(!empty($claimRecord['specific']['pt']['condition-start-date']['approximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['specific']['pt']['condition-start-date']['approximate'].'

';
}

if( (!empty($claimRecord['specific']['pt'])) && (!empty($claimRecord['related-conditions'])) ) {
$html .='

What is your illness/condition related to


</strong><br />'.$claimRecord['related-conditions'].'

';
}

if(!empty($claimRecord['specific']['pt']['activity'])) {
$html .='

What was the activity?


</strong><br />'.$claimRecord['specific']['pt']['activity'].'

';
}

if(!empty($claimRecord['specific']['pt']['authorised'])) {
$html .='

Was the activity authorised or organised by the Armed Forces?


</strong><br />'.$claimRecord['specific']['pt']['authorised'].'

';
}

if(!empty($claimRecord['specific']['pt']['representing'])) {
$html .='

Were you representing your Unit?


</strong><br />'.$claimRecord['specific']['pt']['representing'].'

';
}

if(!empty($claimRecord['specific']['pt']['where'])) {
$html .='

Where were you when the incident happened?


</strong><br />'.$claimRecord['specific']['pt']['where'].'

';
}




if(!empty($claimRecord['specific']['pt']['incident-reported'])) {
$html .='

Did you report the incident?


</strong><br />'.$claimRecord['specific']['pt']['incident-reported'].'

';
}


if(!empty($claimRecord['specific']['pt']['who-reported'])) {
$html .='

Who did you report this incident to?


</strong><br />'.$claimRecord['specific']['pt']['who-reported'].'

';
}



if(!empty($claimRecord['specific']['pt']['witnesses'])) {
$html .='

Were there any witnesses?


</strong><br />'.$claimRecord['specific']['pt']['witnesses'].'

';
}

if(!empty($claimRecord['specific']['pt']['firstaid'])) {
$html .='

Did you receive first aid treatment?


</strong><br />'.$claimRecord['specific']['pt']['firstaid'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital'])) {
$html .='

Did you go to, or were you taken to, a hospital or medical facility?


</strong><br />'.$claimRecord['specific']['pt']['hospital'].'

';
}


if ( (!empty($claimRecord['specific']['pt']['hospital'])) && ($claimRecord['specific']['pt']['hospital'] == 'Yes')) {


if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['name'])) {
$html .='

Name of the hospital / Medical Practitioner (if known)


</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['name'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['address1'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['address1'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['address2'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['address2'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['town'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['town'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['county'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['county'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['country'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['country'].'

';
}


if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['postcode'])) {
$html .='
</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['postcode'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['telephone'])) {
$html .='

Telephone number


</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['telephone'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['email'])) {
$html .='

Email


</strong><br />'.$claimRecord['specific']['pt']['first-aid-hospital-address']['email'].'

';
}


}


if(!empty($claimRecord['specific']['pt']['downgraded'])) {
$html .='

Were you downgraded for any of the conditions on this claim?


</strong><br />'.$claimRecord['specific']['pt']['downgraded'].'

';
}


if ( (!empty($claimRecord['specific']['pt']['downgraded'])) && ($claimRecord['specific']['pt']['downgraded'] == 'Yes')) {


if(!empty($claimRecord['specific']['pt']['downgraded-start']['fromyear'])) {
$html .='

Date downgraded from


</strong><br />'.@$claimRecord['specific']['pt']['downgraded-start']['fromday'].' / '.@$claimRecord['specific']['pt']['downgraded-start']['frommonth'].' / '.$claimRecord['specific']['pt']['downgraded-start']['fromyear'].'

';
}

if(!empty($claimRecord['specific']['pt']['downgraded-start']['datesapproximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['specific']['pt']['downgraded-start']['datesapproximate'].'

';
}

if(!empty($claimRecord['specific']['pt']['downgraded-end']['toyear'])) {
$html .='

Date downgraded to


</strong><br />'.@$claimRecord['specific']['pt']['downgraded-end']['today'].' / '.@$claimRecord['specific']['pt']['downgraded-end']['tomonth'].' / '.$claimRecord['specific']['pt']['downgraded-end']['toyear'].'

';
}

if(!empty($claimRecord['specific']['pt']['downgraded-end']['datesapproximate'])) {
$html .='

Approximate date


</strong><br />'.$claimRecord['specific']['pt']['downgraded-end']['datesapproximate'].'

';
}

if(!empty($claimRecord['specific']['pt']['downgraded-end']['stilldowngraded'])) {
$html .='

Still downgraded?


</strong><br />'.$claimRecord['specific']['pt']['downgraded-end']['stilldowngraded'].'

';
}

if(!empty($claimRecord['specific']['pt']['medical-categories']['frommedical'])) {
$html .='

What medical category were you downgraded from?


</strong><br />'.$claimRecord['specific']['pt']['medical-categories']['frommedical'].'

';
}

if(!empty($claimRecord['specific']['pt']['medical-categories']['tomedical'])) {
$html .='

What medical category were you downgraded to?


</strong><br />'.$claimRecord['specific']['pt']['medical-categories']['tomedical'].'

';
}

if(!empty($claimRecord['specific']['pt']['medical-categories']['multiple'])) {
$html .='

I was downgraded and upgraded more than once within different categories


</strong><br />'.$claimRecord['specific']['pt']['medical-categories']['multiple'].'

';
}

}


if(!empty($claimRecord['specific']['pt']['why'])) {
$html .='

Why is your condition related to your armed forces service?


</strong><br />'.$claimRecord['specific']['pt']['why'].'

';
}


$claimCount++;
}
}



$html .= '<br /><br /><strong>

<hr /><h2>Other Medical Treatment</h2>

';

if (!empty($data['sections']['medical-treatment']['received'])) {
$html .= '<br /><br /><strong>

Have you received further hospital or medical treatment?


</strong><br />'.$data['sections']['medical-treatment']['received'].'

';
}


if (!empty($data['sections']['medical-treatment']['records'])) {
$medicalCount = 1;
foreach ($data['sections']['medical-treatment']['records'] as $medicalRecord) {

$html .='
#Medical Record '.$medicalCount.'</h2>
';


if (!empty($medicalRecord['hospital-address']['name'])) {
$html .= '<br /><br /><strong>Hospital/Medical facility


</strong><br />'.$medicalRecord['hospital-address']['name'].'

';
}

if (!empty($medicalRecord['hospital-address']['address1'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$medicalRecord['hospital-address']['address1'].'

';
}


if (!empty($medicalRecord['hospital-address']['address2'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$medicalRecord['hospital-address']['address2'].'

';
}

if (!empty($medicalRecord['hospital-address']['town'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$medicalRecord['hospital-address']['town'].'

';
}

if (!empty($medicalRecord['hospital-address']['county'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$medicalRecord['hospital-address']['county'].'

';
}

if (!empty($medicalRecord['hospital-address']['country'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$medicalRecord['hospital-address']['country'].'

';
}

if (!empty($medicalRecord['hospital-address']['postcode'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$medicalRecord['hospital-address']['postcode'].'

';
}

if (!empty($medicalRecord['hospital-address']['telephone'])) {
$html .= '<br /><br /><strong>Telephone number


</strong><br />'.$medicalRecord['hospital-address']['telephone'].'

';
}

if (!empty($medicalRecord['hospital-address']['email'])) {
$html .= '<br /><br /><strong>Email


</strong><br />'.$medicalRecord['hospital-address']['email'].'

';
}

if (!empty($medicalRecord['conditions'])) {
$html .= '<br /><br /><strong>Condition treated


</strong><br />'.$medicalRecord['conditions'].'

';
}

if (!empty($medicalRecord['treatment-start']['year'])) {
$html .= '<br /><br /><strong>Date your treatment started


</strong><br />'.@$medicalRecord['treatment-start']['day'].' / '.@$medicalRecord['treatment-start']['month'].' / '.$medicalRecord['treatment-start']['year'].'

';
}



if (!empty($medicalRecord['treatment-start']['approximate'])) {
$html .= '<br /><br /><strong>Approximate date?


</strong><br />'.$medicalRecord['treatment-start']['approximate'].'

';
}

if (!empty($medicalRecord['treatment-start']['waiting-list'])) {
$html .= '<br /><br /><strong>I am still on a waiting list


</strong><br />'.$medicalRecord['treatment-start']['waiting-list'].'

';
}

if (!empty($medicalRecord['treatment-end']['year'])) {
$html .= '<br /><br /><strong>Date your treatment ended.


</strong><br />'.@$medicalRecord['treatment-end']['day'].' / '.@$medicalRecord['treatment-end']['month'].' / '.$medicalRecord['treatment-end']['year'].'

';
}

if (!empty($medicalRecord['treatment-end']['approximate'])) {
$html .= '<br /><br /><strong>Approximate date?


</strong><br />'.$medicalRecord['treatment-end']['approximate'].'

';
}

if (!empty($medicalRecord['treatment-end']['waiting-list'])) {
$html .= '<br /><br /><strong>This treatment has not yet ended


</strong><br />'.$medicalRecord['treatment-end']['waiting-list'].'

';
}

if (!empty($medicalRecord['type'])) {
$html .= '<br /><br /><strong>What type of medical treatment did you receive?


</strong><br />'.$medicalRecord['type'].'

';
}

$medicalCount++;
}
}



$html .= '<br /><br /><strong>

<hr /><h2>Other Compensation</h2>
';


if(!empty($data['sections']['other-compensation']['received-compensation'])) {
$html .= '<br /><br /><strong>Claiming or have you received compensation payments from other sources?


</strong><br />'.$data['sections']['other-compensation']['received-compensation'].'

';
}

if(!empty($data['sections']['other-compensation']['conditions'])) {
$html .= '<br /><br /><strong>What medical condition(s)?


</strong><br />'.$data['sections']['other-compensation']['conditions'].'

';
}

if(!empty($data['sections']['other-compensation']['outcome'])) {
$html .= '<br /><br /><strong>Who did you claim from/amount?


</strong><br />'.$data['sections']['other-compensation']['outcome'].'

';
}

if(!empty($data['sections']['other-compensation']['payment'])) {
$html .= '<br /><br /><strong>Did you receive a payment?


</strong><br />'.$data['sections']['other-compensation']['payment'].'

';
}

if ( (!empty($data['sections']['other-compensation']['payment'])) && ($data['sections']['other-compensation']['payment'] == 'Yes') ) {


if(!empty($data['sections']['other-compensation']['amount'])) {
$html .= '<br /><br /><strong>Amount paid


</strong><br />'.$data['sections']['other-compensation']['amount'].'

';
}

if(!empty($data['sections']['other-compensation']['type'])) {
$html .= '<br /><br /><strong>What type of payment was this?


</strong><br />'.$data['sections']['other-compensation']['type'].'

';
}

if(!empty($data['sections']['other-compensation']['payment-date']['year'])) {
$html .= '<br /><br /><strong>When did you receive this payment?


</strong><br />'.@$data['sections']['other-compensation']['payment-date']['day'].' / '.@$data['sections']['other-compensation']['payment-date']['month'].' /  '.$data['sections']['other-compensation']['payment-date']['year'].'

';
}

if(!empty($data['sections']['other-compensation']['payment-date']['approximate'])) {
$html .= '<br /><br /><strong>Appoximate date?


</strong><br />'.$data['sections']['other-compensation']['payment-date']['approximate'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitorhelp'])) {
$html .= '<br /><br /><strong>Did a solicitor help you with your claim for other compensation?


</strong><br />'.$data['sections']['other-compensation']['solicitorhelp'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['fullname'])) {
$html .= '<br /><br /><strong>Solicitors&#039; full name


</strong><br />'.$data['sections']['other-compensation']['solicitor-address']['fullname'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['address1'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['other-compensation']['solicitor-address']['address1'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['address2'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['other-compensation']['solicitor-address']['address2'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['town'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['other-compensation']['solicitor-address']['town'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['county'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['other-compensation']['solicitor-address']['county'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['postcode'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['other-compensation']['solicitor-address']['postcode'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['country'])) {
$html .= '<br /><br /><strong>
</strong><br />'.$data['sections']['other-compensation']['solicitor-address']['country'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['telephone'])) {
$html .= '<br /><br /><strong>Contact number


</strong><br />'.$data['sections']['other-compensation']['solicitor-address']['telephone'].'

';
}

}



$html .= '<br /><br /><strong>

<hr /><h2>Other Benefits</h2>
';

if(!empty($data['sections']['other-benefits']['benefits'])) {
$html .= '<br /><br /><strong>Are you receiving Tax Credits, Housing Benefit, Council Tax Benefit or Industrial Injuries Disablement Benefit?


</strong><br />'.$data['sections']['other-benefits']['benefits'].'

';
}

if(!empty($data['sections']['other-benefits']['other-paid'])) {
$html .= '<br /><br /><strong>Have you ever received a payment for Mesothelioma or Pneumoconiosis?


</strong><br />'.$data['sections']['other-benefits']['other-paid'].'

';
}


if ( (!empty($data['sections']['other-benefits']['other-paid'])) && ($data['sections']['other-benefits']['other-paid'] == 'Yes') ) {

if(!empty($data['sections']['other-benefits']['details']['diffuse2014'])) {
$html .= '<br /><br /><strong>Diffuse Mesothelioma 2014 Scheme


</strong><br />'.$data['sections']['other-benefits']['details']['diffuse2014'].'

';
}

if(!empty($data['sections']['other-benefits']['details']['diffuse2008'])) {
$html .= '<br /><br /><strong>Diffuse Mesothelioma 2008 Scheme


</strong><br />'.$data['sections']['other-benefits']['details']['diffuse2008'].'

';
}

if(!empty($data['sections']['other-benefits']['details']['worker1979'])) {
$html .= '<br /><br /><strong>The Workers Compensation 1979 Pneumoconiosis Act


</strong><br />'.$data['sections']['other-benefits']['details']['worker1979'].'

';
}

}


$html .= '<br /><br /><strong>

<hr /><h2>Payment details</h2>
';

if(!empty($data['sections']['bank-account']['providebank'])) {
$html .= '<br /><br /><strong>Do you wish to provide your bank account details?


</strong><br />'.$data['sections']['bank-account']['providebank'].'

';
}

if ( (!empty($data['sections']['bank-account']['bank-address']))  &&  ($data['sections']['bank-account']['providebank'] == 'Yes') ) {

 if(!empty($data['sections']['bank-account']['banklocation'])) {
$html .= '<br /><br /><strong>Where is your bank account?


</strong><br />'.$data['sections']['bank-account']['banklocation'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['bankname'])) {
$html .= '<br /><br /><strong>Name of bank, building society or other account provider


</strong><br />'.$data['sections']['bank-account']['bank-address']['bankname'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['accountname'])) {
$html .= '<br /><br /><strong>Name on the account


</strong><br />'.$data['sections']['bank-account']['bank-address']['accountname'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['sortcode'])) {
$html .= '<br /><br /><strong>Sort code


</strong><br />'.$data['sections']['bank-account']['bank-address']['sortcode'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['accountnumber'])) {
$html .= '<br /><br /><strong>Account number


</strong><br />'.$data['sections']['bank-account']['bank-address']['accountnumber'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['rollnumber'])) {
$html .= '<br /><br /><strong>Building society roll number


</strong><br />'.$data['sections']['bank-account']['bank-address']['rollnumber'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['accountreason'])) {
$html .= '<br /><br /><strong>If this is not your bank account, please tell us whose account it is and why you have chosen this account


</strong><br />'.$data['sections']['bank-account']['bank-address']['accountreason'].'

';
}

}

if ( (!empty($data['sections']['bank-account']['overseas-bank-address'])) &&  ($data['sections']['bank-account']['providebank'] == 'Yes') ) {



if(!empty($data['sections']['bank-account']['banklocation'])) {
$html .= '<br /><br /><strong>Where is your bank account?


</strong><br />'.$data['sections']['bank-account']['banklocation'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['bankname'])) {
$html .= '<br /><br /><strong>Name of bank or other account provider


</strong><br />'.$data['sections']['bank-account']['overseas-bank-address']['bankname'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['accountname'])) {
$html .= '<br /><br /><strong>Name on the account


</strong><br />'.$data['sections']['bank-account']['overseas-bank-address']['accountname'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['iban'])) {
$html .= '<br /><br /><strong>International Bank Account Number (IBAN)


</strong><br />'.$data['sections']['bank-account']['overseas-bank-address']['iban'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['bsbcode'])) {
$html .= '<br /><br /><strong>BSB Code


</strong><br />'.$data['sections']['bank-account']['overseas-bank-address']['bsbcode'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['swiftcode'])) {
$html .= '<br /><br /><strong>Bank Identifier Code (BIC)


</strong><br />'.$data['sections']['bank-account']['overseas-bank-address']['swiftcode'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['transitroute'])) {
$html .= '<br /><br /><strong>Transit Routing Number


</strong><br />'.$data['sections']['bank-account']['overseas-bank-address']['transitroute'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['typeofaccount'])) {
$html .= '<br /><br /><strong>Type of account


</strong><br />'.$data['sections']['bank-account']['overseas-bank-address']['typeofaccount'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['accountreason'])) {
$html .= '<br /><br /><strong>If this is not your bank account, please tell us whose account it is and why you have chosen this account


</strong><br />'.$data['sections']['bank-account']['overseas-bank-address']['accountreason'].'

';
}

}




$html .= '<br /><br /><strong>

<hr /><h2>File Uploads</h2>

';


    if (!empty($data['sections']['supporting-documents']['files'])) {



        foreach ($data['sections']['supporting-documents']['files'] as $k => $file) {


$html .='



'.$file['name'].'

 ';


        }

} else {

$html .'
No files added
';

}

if (!empty($data['sections']['supporting-documents']['file-information'])) {
$html .= '<br /><br /><strong>
File comments

</strong><br />'.$data['sections']['supporting-documents']['file-information'].'

';
}

$html .= '<br /><br /><strong>

<hr /><h2>Declaration</h2>

Read and agreed to the declaration


</strong><br />'.@$data['submission']['declaration'].'


';

// Load HTML content
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($reference_number.'.pdf');


