<?php
namespace App\Http\Controllers;
use App\Services\Notify;
?>

@include('framework.functions')
<?php
$userID = $_SESSION['vets-user'];
$data = getData($userID);
$content = '';
$reference_number = 'WPS/AFCS/MOD/'.$data['settings']['customer_ref'];

//set the user ref for the application complete page, as we unset data on this page
$_SESSION['userRef'] = $reference_number;


$ipstring = '';
$hoststring = '';
if (!empty($_SERVER['REMOTE_ADDR'])) { $ipstring = $_SERVER['REMOTE_ADDR'];}
if (!empty($_SERVER['REMOTE_HOST'])) { $hoststring = $_SERVER['REMOTE_HOST'];}

$data['settings']['userString'] = $ipstring.' - '.$hoststring;




//send office email

$emailContent = '


---
#Time Started
---
'.@$data['settings']['time_started'].'

---
#Who is making this application
---
';

if (!empty($data['sections']['applicant-who']['who is making this application'])) {
switch ($data['sections']['applicant-who']['who is making this application']) {

	case "The person named on this claim is making the application.":

$emailContent .= '
Who is making this application


▐ The person named on this claim is making the application.

';


if(!empty($data['sections']['applicant-who']['apply-yourself']['epaw']['served'])) {
$emailContent .= '
Have you ever served in or supported the Special Forces?


▐ '.$data['sections']['applicant-who']['apply-yourself']['epaw']['served'].'

';
}

if(!empty($data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-1'])) {
$emailContent .= 'EPAW reference number


▐ '.$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-1'].' - '.$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-2'].' / '.$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-3'].' / '.$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference-4'].'

';
}



break;

case "I am making an application for someone else and I have legal authority to act on their behalf.":

$emailContent .= '
Who is making this application


▐ '.@$data['sections']['applicant-who']['who is making this application'].'

';

if(!empty($data['sections']['applicant-who']['legal-authority']['epaw']['served'])) {
$emailContent .= '
Has the person you are applying for ever served in or supported the special forces?


▐ '.$data['sections']['applicant-who']['legal-authority']['epaw']['served'].'

';
}

if(!empty($data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1'])) {
$emailContent .= '
EPAW reference number


▐ '.$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1'].' - '.$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-2'].' / '.$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-3'].' / '.$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-4'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['fullname'])) {
$emailContent .= 'Your full name


▐ '.@$data['sections']['applicant-who']['legal authority']['fullname'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['address1'])) {
$emailContent .= 'Building and street


▐ '.@$data['sections']['applicant-who']['legal authority']['address1'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['address2'])) {
$emailContent .= '
▐ '.@$data['sections']['applicant-who']['legal authority']['address2'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['town'])) {
$emailContent .= '
▐ '.@$data['sections']['applicant-who']['legal authority']['town'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['county'])) {
$emailContent .= '
▐ '.@$data['sections']['applicant-who']['legal authority']['county'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['country'])) {
$emailContent .= '
▐ '.@$data['sections']['applicant-who']['legal authority']['country'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['postcode'])) {
$emailContent .= '
▐ '.@$data['sections']['applicant-who']['legal authority']['postcode'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['nominee-number'])) {
$emailContent .= 'Telephone number


▐ '.@$data['sections']['applicant-who']['legal authority']['nominee-number'].'

';
}

if(!empty($data['sections']['applicant-who']['legal authority']['details'])) {
$emailContent .= 'What legal authority do you have to make a claim on behalf of the person named?


▐ '.@$data['sections']['applicant-who']['legal authority']['details'].'

';
}



break;


case "I am helping someone else make this application.":
$emailContent .= 'Who is making this application


▐ I am helping someone else make this application.


Name of assistant making this claim


▐'.@$data['sections']['applicant-who']['helper']['name'].'


Relationship to claimant


▐ '.@$data['sections']['applicant-who']['helper']['relationship'].'


';

if(!empty($data['sections']['applicant-who']['helper']['relationship-when'])) {

$emailContent .='

When did the person you are helping first contact you?


▐ '.@$data['sections']['applicant-who']['helper']['relationship-when']['whendate'].' '.@$data['sections']['applicant-who']['helper']['relationship-when']['dontknow'];

}


$emailContent .='

Assisted claim declaration understood


▐ '.@$data['sections']['applicant-who']['helper']['declaration'].'


Has the person you are helping ever served in or supported the special forces?


▐ '.@$data['sections']['applicant-who']['helper']['epaw']['served'].'

';

if(!empty($data['sections']['applicant-who']['helper']['epaw']['epaw-reference-1'])) {

$emailContent .= '
EPAW Reference Number

'.$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-1'].' - '.$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-2'].' / '.$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-3'].' / '.$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-4'].'

';

}


break;


}
}


$emailContent .= '

---
#Nominate a representative
---

';

if (!empty($data['sections']['nominate-representative']['nominate-representative'])) {
switch ($data['sections']['nominate-representative']['nominate-representative']) {

case "Yes":

$emailContent .= 'Would you like to nominate a representative?


▐ Yes';


if(!empty($data['sections']['nominate-representative']['nominated representative']['fullname'])) {
$emailContent .= 'Representative\'s full name


▐ '.$data['sections']['nominate-representative']['nominated representative']['fullname'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['address1'])) {
$emailContent .= 'Building and street


▐ '.$data['sections']['nominate-representative']['nominated representative']['address1'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['address2'])) {
$emailContent .= '
▐ '.$data['sections']['nominate-representative']['nominated representative']['address2'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['town'])) {
$emailContent .= '
▐ '.$data['sections']['nominate-representative']['nominated representative']['town'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['county'])) {
$emailContent .= '
▐ '.$data['sections']['nominate-representative']['nominated representative']['county'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['country'])) {
$emailContent .= '
▐ '.$data['sections']['nominate-representative']['nominated representative']['country'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['postcode'])) {
$emailContent .= '
▐ '.$data['sections']['nominate-representative']['nominated representative']['postcode'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['nominee-number'])) {
$emailContent .= 'Telephone number


▐ '.$data['sections']['nominate-representative']['nominated representative']['nominee-number'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['email-address'])) {
$emailContent .= 'Email address


▐ '.$data['sections']['nominate-representative']['nominated representative']['email-address'].'

';
}

if(!empty($data['sections']['nominate-representative']['nominated representative']['role'])) {
$emailContent .= 'What is your representative&#039;s role?


▐ '.$data['sections']['nominate-representative']['nominated representative']['role'].'

';
}


break;

case "No":
$emailContent .='


Would you like to nominate a representative?


▐ '.@$data['sections']['nominate-representative']['nominate-representative'].'

';

break;

}
}


$emailContent .= '
---
#Personal details
---
';

if(!empty($data['sections']['about-you']['name']['lastname'])) {
$emailContent .='

Surname or family name


▐ '.$data['sections']['about-you']['name']['lastname'].'

';
}

if(!empty($data['sections']['about-you']['name']['firstname'])) {
$emailContent .='

All other names in full


▐ '.$data['sections']['about-you']['name']['firstname'].'

';
}

if(!empty($data['sections']['about-you']['name']['title'])) {
$emailContent .='

Title


▐ '.$data['sections']['about-you']['name']['title'].'

';
}


if(!empty($data['sections']['about-you']['contact-address']['address1'])) {
$emailContent .='

Address Building and street


▐ '.$data['sections']['about-you']['contact-address']['address1'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['address2'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['contact-address']['address2'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['town'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['contact-address']['town'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['county'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['contact-address']['county'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['country'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['contact-address']['country'].'

';
}

if(!empty($data['sections']['about-you']['contact-address']['postcode'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['contact-address']['postcode'].'

';
}

if(!empty($data['sections']['about-you']['dob'])) {
$emailContent .='

Date of birth


▐ '.$data['sections']['about-you']['dob']['day'].' / '.$data['sections']['about-you']['dob']['month'].' / '.$data['sections']['about-you']['dob']['year'].'

';
}

if (!empty($data['sections']['about-you']['telephonenumber']['doyouhavemobile'])) {
    $emailContent .='

Mobile telephone number?';
    if ($data['sections']['about-you']['telephonenumber']['doyouhavemobile'] == 'No') {
        $emailContent .= '

▐ No';
    }elseif ($data['sections']['about-you']['telephonenumber']['doyouhavemobile'] == 'Yes') { $emailContent .='



▐ '.$data['sections']['about-you']['telephonenumber']['mobile'].'

';
    }


if (!empty($data['sections']['about-you']['telephonenumber']['mobilepermission'])) {

$emailContent .='

Mobile contact permission:

▐ '.$data['sections']['about-you']['telephonenumber']['mobilepermission'].'

';
}


}



if (!empty($data['sections']['about-you']['telephonenumber']['doyouhavealternative'])) {
    $emailContent .='

Alternative telephone number:';
    if ($data['sections']['about-you']['telephonenumber']['doyouhavealternative'] == 'No') {
    $emailContent .='

No';
    }elseif ($data['sections']['about-you']['telephonenumber']['doyouhavealternative'] == 'Yes') {
    $emailContent .='



▐ '.$data['sections']['about-you']['telephonenumber']['telephone'].'

';
    }
}

if(!empty($data['sections']['about-you']['email'])) {
$emailContent .='

What is your email address


▐ '.$data['sections']['about-you']['email'].'

';
}


if (!empty($data['sections']['about-you']['email-address']['emailpermission'])) {

$emailContent .='

Email contact permission:

▐ '.$data['sections']['about-you']['email-address']['emailpermission'].'

';
}





if(!empty($data['sections']['about-you']['ninumber'])) {
$emailContent .='

NI Number

▐ '.$data['sections']['about-you']['ninumber'].'

';
}

if(!empty($data['sections']['about-you']['pensionscheme'])) {
$emailContent .='

Pension scheme


▐ '.$data['sections']['about-you']['pensionscheme'].'

';
}

if(!empty($data['sections']['about-you']['previous-claim'])) {
$emailContent .='

Previous claim made


▐ '.$data['sections']['about-you']['previous-claim'].'

';
}

if(!empty($data['sections']['about-you']['refnum'])) {
$emailContent .='

Previous claim reference number


▐ '.$data['sections']['about-you']['refnum'].'

';
}

if(!empty($data['sections']['about-you']['epaw']['served'])) {
$emailContent .='

Express Prior Authority in Writing (EPAW) reference


▐ '.$data['sections']['about-you']['epaw']['served'].'

';
}

if(!empty($data['sections']['about-you']['epaw']['epaw-reference'])) {
$emailContent .='

EPAW reference number


▐ '.$data['sections']['about-you']['epaw']['epaw-reference'] ?? 'not served with Special Forces';
}


$emailContent .='


---
#Doctor or medical officer (if serving)
---
';

if(!empty($data['sections']['about-you']['medical-officer']['contactname'])) {
$emailContent .='

Medical Officer or GP&#039;s full name (if known)


▐ '.$data['sections']['about-you']['medical-officer']['contactname'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['address1'])) {
$emailContent .='

Practice, Building and street (Medical officer or GP)


▐ '.$data['sections']['about-you']['medical-officer']['address1'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['address2'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['medical-officer']['address2'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['town'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['medical-officer']['town'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['county'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['medical-officer']['county'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['country'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['medical-officer']['country'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['postcode'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['medical-officer']['postcode'].'

';
}

if(!empty($data['sections']['about-you']['medical-officer']['telephonenumber'])) {
$emailContent .='
▐ '.$data['sections']['about-you']['medical-officer']['telephonenumber'].'

';
}


$emailContent .='


---
#Service details
---
';

if (!empty($data['sections']['service-details']['records'])) {
$serviceCount = 1;
foreach ($data['sections']['service-details']['records'] as $serviceRecord) {

$emailContent .='



#Service Record '.$serviceCount.'
---
';


if(!empty($serviceRecord['differentname'])) {
$emailContent .='

Did you have a different name during this period of service?

▐ '.$serviceRecord['differentname'].'

';

}

if (!empty($serviceRecord['nameinservice'])) {

$emailContent .='

Enter the full name in service

▐ '.$serviceRecord['nameinservice'];

}

if (!empty($serviceRecord['donotwanttodisclose'])) {

$emailContent .='

Do not want to disclose

▐ '.$serviceRecord['donotwanttodisclose'];

}





if(!empty($serviceRecord['servicenumber'])) {
$emailContent .='

Service number


▐ '.$serviceRecord['servicenumber'].'

';
}

if(!empty($serviceRecord['servicebranch'])) {
$emailContent .='

Service branch


▐ '.$serviceRecord['servicebranch'].'

';
}

if(!empty($serviceRecord['servicetype'])) {
$emailContent .='

Service type?


▐ '.$serviceRecord['servicetype'].'

';
}

if(!empty($serviceRecord['service-rank'])) {
$emailContent .='

Service rank


▐ '.$serviceRecord['service-rank'].'

';
}

if(!empty($serviceRecord['specialism1'])) {
$emailContent .='

Service trades and durations

▐  1. '.@$serviceRecord['specialism1'].' - '.@$serviceRecord['specialism1Duration'].'
';
}

if(!empty($serviceRecord['specialism2'])) {
$emailContent .='
▐  2. '.@$serviceRecord['specialism2'].' - '.@$serviceRecord['specialism2Duration'].'
';
}

if(!empty($serviceRecord['specialism3'])) {
$emailContent .='
▐  3. '.@$serviceRecord['specialism3'].' - '.@$serviceRecord['specialism3Duration'].'
';
}

if(!empty($serviceRecord['specialism4'])) {
$emailContent .='
▐  4. '.@$serviceRecord['specialism4'].' - '.@$serviceRecord['specialism4Duration'].'
';
}

if(!empty($serviceRecord['specialism5'])) {
$emailContent .='
▐  5. '.@$serviceRecord['specialism5'].' - '.@$serviceRecord['specialism5Duration'].'
';
}

if(!empty($serviceRecord['specialism6'])) {
$emailContent .='
▐  6. '.@$serviceRecord['specialism6'].' - '.@$serviceRecord['specialism6Duration'].'
';
}

if(!empty($serviceRecord['specialism7'])) {
$emailContent .='
▐  7. '.@$serviceRecord['specialism7'].' - '.@$serviceRecord['specialism7Duration'].'
';
}

if(!empty($serviceRecord['specialism8'])) {
$emailContent .='
▐  8. '.@$serviceRecord['specialism8'].' - '.@$serviceRecord['specialism8Duration'].'
';
}

if(!empty($serviceRecord['specialism9'])) {
$emailContent .='
▐  9. '.@$serviceRecord['specialism9'].' - '.@$serviceRecord['specialism9Duration'].'
';
}

if(!empty($serviceRecord['specialism10'])) {
$emailContent .='
▐  10. '.@$serviceRecord['specialism10'].' - '.@$serviceRecord['specialism10Duration'].'
';
}








if(!empty($serviceRecord['service-enlistmentdate']['year'])) {
$emailContent .='

Enlistment Date


▐ '.@$serviceRecord['service-enlistmentdate']['day'].' / '.@$serviceRecord['service-enlistmentdate']['month'].' / '.$serviceRecord['service-enlistmentdate']['year'].'

';
}

if ( (!empty($serviceRecord['service-enlistmentdate']['approximate'])) && ($serviceRecord['service-enlistmentdate']['approximate'] == 'Yes') ) {
$emailContent .='



▐ (This date is approximate)';

}

if(!empty($serviceRecord['service-dischargedate']['year'])) {
$emailContent .='

Discharge date


▐ '.@$serviceRecord['service-dischargedate']['day'].' /  '.@$serviceRecord['service-dischargedate']['month'].' /  '.$serviceRecord['service-dischargedate']['year'].'

';


 if ( (!empty($serviceRecord['service-dischargedate']['approximate'])) && ($serviceRecord['service-dischargedate']['approximate'] == 'Yes') ) {
 $emailContent .='



▐ (This date is approximate)';
 }


}

if(!empty($serviceRecord['service-dischargedate']['stillserving'])) {
$emailContent .='

Still serving


▐ '.$serviceRecord['service-dischargedate']['stillserving'].'

';
}

if(!empty($serviceRecord['service-dischargedate']['dischargereason'])) {
$emailContent .='

Discharge reason


▐ '.$serviceRecord['service-dischargedate']['dischargereason'].'

';
}

if(!empty($serviceRecord['unit-address']['address1'])) {
$emailContent .='

Last Unit - Base, Building and Street


▐ '.$serviceRecord['unit-address']['address1'].'

';
}

if(!empty($serviceRecord['unit-address']['address2'])) {
$emailContent .='
▐ '.$serviceRecord['unit-address']['address2'].'

';
}

if(!empty($serviceRecord['unit-address']['town'])) {
$emailContent .='
▐ '.$serviceRecord['unit-address']['town'].'

';
}

if(!empty($serviceRecord['unit-address']['county'])) {
$emailContent .='
▐ '.$serviceRecord['unit-address']['county'].'

';
}

if(!empty($serviceRecord['unit-address']['country'])) {
$emailContent .='
▐ '.$serviceRecord['unit-address']['country'].'

';
}

if(!empty($serviceRecord['unit-address']['postcode'])) {
$emailContent .='
▐ '.$serviceRecord['unit-address']['postcode'].'

';
}

$serviceCount++;
} //end foreach
} //end if service


//Claim

$emailContent .= '

---
#Claims
---

';


if (!empty($data['sections']['claims']['records'])) {

$claimCount = 1;


foreach ($data['sections']['claims']['records'] as $claimRecord) {


$emailContent .='
#Claim Record '.$claimCount.'
---
';


if(!empty($claimRecord['type'])) {
$emailContent .='

Type of medical condition


▐ '.$claimRecord['type'].'

';
}

if(!empty($claimRecord['non-specific']['condition'])) {
$emailContent .='

What medical condition(s) are you claiming for?


▐ '.$claimRecord['non-specific']['condition'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['name'])) {
$emailContent .='

Diagnosing Medical Practitioner (if known)


▐ '.$claimRecord['non-specific']['hospital-address']['name'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['address1'])) {
$emailContent .='
▐ '.$claimRecord['non-specific']['hospital-address']['address1'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['address2'])) {
$emailContent .='
▐ '.$claimRecord['non-specific']['hospital-address']['address2'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['town'])) {
$emailContent .='
▐ '.$claimRecord['non-specific']['hospital-address']['town'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['county'])) {
$emailContent .='
▐ '.$claimRecord['non-specific']['hospital-address']['county'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['country'])) {
$emailContent .='
▐ '.$claimRecord['non-specific']['hospital-address']['country'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['postcode'])) {
$emailContent .='
▐ '.$claimRecord['non-specific']['hospital-address']['postcode'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['telephone'])) {
$emailContent .='

Telephone number


▐ '.$claimRecord['non-specific']['hospital-address']['telephone'].'

';
}

if(!empty($claimRecord['non-specific']['hospital-address']['email'])) {
$emailContent .='

Email


▐ '.$claimRecord['non-specific']['hospital-address']['email'].'

';
}

if(!empty($claimRecord['condition-start-date']['year'])) {
$emailContent .='

What was the date your condition started?


▐ '.@$claimRecord['condition-start-date']['day'].' / '.@$claimRecord['condition-start-date']['month'].' /  '.$claimRecord['condition-start-date']['year'].'

';
}

if(!empty($claimRecord['condition-start-date']['approximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['condition-start-date']['approximate'].'

';
}

if(!empty($claimRecord['related-conditions'])) {
$emailContent .='

What is your illness/condition related to


▐ '.$claimRecord['related-conditions'].'

';
}

if(!empty($claimRecord['related-exposure'])) {
$emailContent .='

Illness/condition due to exposure to? (Cold / Heat / Noise, for example gunfire / Vibration, for example from using tools /Chemical exposure)


▐ '.$claimRecord['related-exposure'].'

';
}

if(!empty($claimRecord['exposure-date']['substances'])) {
$emailContent .='

Chemical Exposure - what substances were you exposed to?


▐ '.$claimRecord['exposure-date']['substances'].'

';
}

if(!empty($claimRecord['exposure-date']['year'])) {
$emailContent .='

Chemical Exposure - date of first exposure?


▐ '.@$claimRecord['exposure-date']['day'].' / '.@$claimRecord['exposure-date']['month'].' / '.$claimRecord['exposure-date']['year'].'

';
}

if(!empty($claimRecord['exposure-date']['length'])) {
$emailContent .='

Chemical Exposure - length of exposure?


▐ '.$claimRecord['exposure-date']['length'].'

';
}

if(!empty($claimRecord['medical-attention']['year'])) {
$emailContent .='

When did you first seek medical attention?


▐ '.@$claimRecord['medical-attention']['day'].' / '.@$claimRecord['medical-attention']['month'].' /  '.$claimRecord['medical-attention']['year'].'

';
}

if(!empty($claimRecord['medical-attention']['approximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['medical-attention']['approximate'].'

';
}

if(!empty($claimRecord['downgraded'])) {
$emailContent .='

Were you downgraded for any of the conditions on this claim?


▐ '.$claimRecord['downgraded'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-start']['fromyear'])) {
$emailContent .='

Date downgraded start


▐ '.@$claimRecord['non-specific']['downgraded-start']['fromday'].' / '.@$claimRecord['non-specific']['downgraded-start']['frommonth'].' / '.$claimRecord['non-specific']['downgraded-start']['fromyear'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-start']['datesapproximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['non-specific']['downgraded-start']['datesapproximate'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-end']['toyear'])) {
$emailContent .='

Date downgraded end


▐ '.@$claimRecord['non-specific']['downgraded-end']['today'].' / '.@$claimRecord['non-specific']['downgraded-end']['tomonth'].' / '.$claimRecord['non-specific']['downgraded-end']['toyear'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-end']['datesapproximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['non-specific']['downgraded-end']['datesapproximate'].'

';
}

if(!empty($claimRecord['non-specific']['downgraded-end']['stilldowngraded'])) {
$emailContent .='

Still downgraded?


▐ '.$claimRecord['non-specific']['downgraded-end']['stilldowngraded'].'

';
}

if(!empty($claimRecord['non-specific']['medical-categories']['frommedical'])) {
$emailContent .='

What medical category were you downgraded from?


▐ '.$claimRecord['non-specific']['medical-categories']['frommedical'].'

';
}

if(!empty($claimRecord['non-specific']['medical-categories']['tomedical'])) {
$emailContent .='

What medical category were you downgraded to?


▐ '.$claimRecord['non-specific']['medical-categories']['tomedical'].'

';
}

if(!empty($claimRecord['non-specific']['medical-categories']['multiple'])) {
$emailContent .='

I was downgraded and upgraded more than once within different categories?


▐ '.$claimRecord['non-specific']['medical-categories']['multiple'].'

';
}

if(!empty($claimRecord['non-specific']['why'])) {
$emailContent .='

Why is your condition related to your armed forces service?


▐ '.$claimRecord['non-specific']['why'].'

';
}



if(!empty($claimRecord['specific']['pt-related'])) {
$emailContent .='

Was the incident or accident related to sport, adventure training or physical training?


▐ '.$claimRecord['specific']['pt-related'].'

';
}


if(!empty($claimRecord['specific']['non-pt']['conditions'])) {
$emailContent .='

What medical condition(s) are you claiming for?


▐ '.$claimRecord['specific']['non-pt']['conditions'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['name'])) {
$emailContent .='

Diagnosing Medical Practitioner (if known)


▐ '.$claimRecord['specific']['non-pt']['hospital-address']['name'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['address1'])) {
$emailContent .='
▐ '.$claimRecord['specific']['non-pt']['hospital-address']['address1'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['address2'])) {
$emailContent .='
▐ '.$claimRecord['specific']['non-pt']['hospital-address']['address2'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['town'])) {
$emailContent .='
▐ '.$claimRecord['specific']['non-pt']['hospital-address']['town'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['county'])) {
$emailContent .='
▐ '.$claimRecord['specific']['non-pt']['hospital-address']['county'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['country'])) {
$emailContent .='
▐ '.$claimRecord['specific']['non-pt']['hospital-address']['country'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['postcode'])) {
$emailContent .='
▐ '.$claimRecord['specific']['non-pt']['hospital-address']['postcode'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['telephone'])) {
$emailContent .='

Telephone number


▐ '.$claimRecord['specific']['non-pt']['hospital-address']['telephone'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital-address']['email'])) {
$emailContent .='

Email


▐ '.$claimRecord['specific']['non-pt']['hospital-address']['email'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['condition-start-date']['year'])) {
$emailContent .='

What was the date your condition started?


▐ '.@$claimRecord['specific']['non-pt']['condition-start-date']['day'].' / '.@$claimRecord['specific']['non-pt']['condition-start-date']['month'].' / '.$claimRecord['specific']['non-pt']['condition-start-date']['year'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['condition-start-date']['approximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['specific']['non-pt']['condition-start-date']['approximate'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['on-duty'])) {
$emailContent .='

Were you on duty at the time of the incident?


▐ '.$claimRecord['specific']['non-pt']['on-duty'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['report-incident'])) {
$emailContent .='

Did you report the incident?


▐ '.$claimRecord['specific']['non-pt']['report-incident'].'

';
}


if ((!empty($claimRecord['specific']['non-pt']['report-incident'])) && ($claimRecord['specific']['non-pt']['report-incident'] == 'Yes')) {

if(!empty($claimRecord['specific']['non-pt']['who-reported'])) {
$emailContent .='

Who did you report the incident to?


▐ '.$claimRecord['specific']['non-pt']['who-reported'].'

';
}
}

if(!empty($claimRecord['specific']['non-pt']['accident-form'])) {
$emailContent .='

Was an accident form completed?


▐ '.$claimRecord['specific']['non-pt']['accident-form'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['where-were-you'])) {
$emailContent .='

Where were you when the incident happened?


▐ '.$claimRecord['specific']['non-pt']['where-were-you'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['rta'])) {
$emailContent .='

Was the incident a road traffic accident?


▐ '.$claimRecord['specific']['non-pt']['rta'].'

';
}


if ( (!empty($claimRecord['specific']['non-pt']['rta'])) && ($claimRecord['specific']['non-pt']['rta'] == 'Yes')) {

    if(!empty($claimRecord['specific']['non-pt']['journey-reason'])) {
    $emailContent .='

What was the reason for your journey?


▐ '.$claimRecord['specific']['non-pt']['journey-reason'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['journey-start'])) {
    $emailContent .='

Where did your journey start?


▐ '.$claimRecord['specific']['non-pt']['journey-start'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['journey-end'])) {
    $emailContent .='

Where did your journey end?


▐ '.$claimRecord['specific']['non-pt']['journey-end'].'

';
    }

}

if(!empty($claimRecord['specific']['non-pt']['police-reported'])) {
$emailContent .='

Was the incident reported to the civilian or military police?


▐ '.$claimRecord['specific']['non-pt']['police-reported'].'

';
}


if ((!empty($claimRecord['specific']['non-pt']['police-reported'])) && ($claimRecord['specific']['non-pt']['police-reported'] == 'Yes')) {
$emailContent .='

Police reference?


▐ Civilian Case Ref: '.$claimRecord['specific']['non-pt']['police-report']['civilian-ref'].'


▐ Military Case Ref: '.$claimRecord['specific']['non-pt']['police-report']['military-ref'].'


▐ I don\'t know: '.$claimRecord['specific']['non-pt']['police-report']['dontknow'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['authorised-leave'])) {
$emailContent .='

Were you on authorised leave?


▐ '.$claimRecord['specific']['non-pt']['authorised-leave'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['witnesses'])) {
$emailContent .='

Were there any witnesses?


▐ '.$claimRecord['specific']['non-pt']['witnesses'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['firstaid'])) {
$emailContent .='

Did you receive first aid treatment?


▐ '.$claimRecord['specific']['non-pt']['firstaid'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['hospital'])) {
$emailContent .='

Did you go to, or were you taken to, a hospital or medical facility?


▐ '.$claimRecord['specific']['non-pt']['hospital'].'

';
}

if ( (!empty($claimRecord['specific']['non-pt']['hospital'])) && ($claimRecord['specific']['non-pt']['hospital'] == 'Yes')) {

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['name'])) {
    $emailContent .='

Name of hospital/Medical Practitioner (if known)


▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['name'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['address1'])) {
    $emailContent .='
▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['address1'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['address2'])) {
    $emailContent .='
▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['address2'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['town'])) {
    $emailContent .='
▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['town'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['county'])) {
    $emailContent .='
▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['county'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['country'])) {
    $emailContent .='
▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['country'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['postcode'])) {
    $emailContent .='
▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['postcode'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['telephone'])) {
    $emailContent .='

Telephone number


▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['telephone'].'

';
    }

    if(!empty($claimRecord['specific']['non-pt']['first-aid-hospital-address']['email'])) {
    $emailContent .='

Email


▐ '.$claimRecord['specific']['non-pt']['first-aid-hospital-address']['email'].'

';
    }

}


if(!empty($claimRecord['specific']['non-pt']['downgraded'])) {
$emailContent .='

Were you downgraded for any of the conditions on this claim?


▐ '.$claimRecord['specific']['non-pt']['downgraded'].'

';
}


if (!empty($claimRecord['specific']['non-pt']['downgraded-start']['fromyear'])) {
$emailContent .='

Date downgraded from


▐ '.@$claimRecord['specific']['non-pt']['downgraded-start']['fromday'].' / '.@$claimRecord['specific']['non-pt']['downgraded-start']['frommonth'].' / '.$claimRecord['specific']['non-pt']['downgraded-start']['fromyear'].'

';
}

if(!empty($claimRecord['specific']['non-pt']['downgraded-start']['datesapproximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['specific']['non-pt']['downgraded-start']['datesapproximate'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['downgraded-end']['toyear'])) {
$emailContent .='

Date downgraded to


▐ '.@$claimRecord['specific']['non-pt']['downgraded-end']['today'].' / '.@$claimRecord['specific']['non-pt']['downgraded-end']['tomonth'].' /

▐ '.$claimRecord['specific']['non-pt']['downgraded-end']['toyear'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['downgraded-end']['datesapproximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['specific']['non-pt']['downgraded-end']['datesapproximate'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['downgraded-end']['stilldowngraded'])) {
$emailContent .='

Still downgraded?


▐ '.$claimRecord['specific']['non-pt']['downgraded-end']['stilldowngraded'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['medical-categories']['frommedical'])) {
$emailContent .='

What medical category were you downgraded from?


▐ '.$claimRecord['specific']['non-pt']['medical-categories']['frommedical'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['medical-categories']['tomedical'])) {
$emailContent .='

What medical category were you downgraded from?


▐ '.$claimRecord['specific']['non-pt']['medical-categories']['tomedical'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['medical-categories']['multiple'])) {
$emailContent .='

I was downgraded and upgraded more than once within different categories?


▐ '.$claimRecord['specific']['non-pt']['medical-categories']['multiple'].'

';
}

if (!empty($claimRecord['specific']['non-pt']['why'])) {
$emailContent .='

Why is your condition related to your armed forces service?


▐ '.$claimRecord['specific']['non-pt']['why'].'

';
}


if(!empty($claimRecord['specific']['pt']['conditions'])) {
$emailContent .='

What medical condition(s) are you claiming for?


▐ '.$claimRecord['specific']['pt']['conditions'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['name'])) {
$emailContent .='

Diagnosing Medical Practitioner (if known)


▐ '.$claimRecord['specific']['pt']['hospital-address']['name'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['address1'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['hospital-address']['address1'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['address2'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['hospital-address']['address2'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['town'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['hospital-address']['town'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['county'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['hospital-address']['county'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['country'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['hospital-address']['country'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['postcode'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['hospital-address']['postcode'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['telephone'])) {
$emailContent .='

Telephone number


▐ '.$claimRecord['specific']['pt']['hospital-address']['telephone'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital-address']['email'])) {
$emailContent .='

Email


▐ '.$claimRecord['specific']['pt']['hospital-address']['email'].'

';
}

if(!empty($claimRecord['specific']['pt']['condition-start-date']['year'])) {
$emailContent .='

What was the date your condition started?


▐ '.@$claimRecord['specific']['pt']['condition-start-date']['day'].' / '.@$claimRecord['specific']['pt']['condition-start-date']['month'].' / '.$claimRecord['specific']['pt']['condition-start-date']['year'].'

';
}

if(!empty($claimRecord['specific']['pt']['condition-start-date']['approximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['specific']['pt']['condition-start-date']['approximate'].'

';
}

if( (!empty($claimRecord['specific']['pt'])) && (!empty($claimRecord['related-conditions'])) ) {
$emailContent .='

What is your illness/condition related to


▐ '.$claimRecord['related-conditions'].'

';
}

if(!empty($claimRecord['specific']['pt']['activity'])) {
$emailContent .='

What was the activity?


▐ '.$claimRecord['specific']['pt']['activity'].'

';
}

if(!empty($claimRecord['specific']['pt']['authorised'])) {
$emailContent .='

Was the activity authorised or organised by the Armed Forces?


▐ '.$claimRecord['specific']['pt']['authorised'].'

';
}

if(!empty($claimRecord['specific']['pt']['representing'])) {
$emailContent .='

Were you representing your Unit?


▐ '.$claimRecord['specific']['pt']['representing'].'

';
}

if(!empty($claimRecord['specific']['pt']['where'])) {
$emailContent .='

Where were you when the incident happened?


▐ '.$claimRecord['specific']['pt']['where'].'

';
}




if(!empty($claimRecord['specific']['pt']['incident-reported'])) {
$emailContent .='

Did you report the incident?


▐ '.$claimRecord['specific']['pt']['incident-reported'].'

';
}


if(!empty($claimRecord['specific']['pt']['who-reported'])) {
$emailContent .='

Who did you report this incident to?


▐ '.$claimRecord['specific']['pt']['who-reported'].'

';
}



if(!empty($claimRecord['specific']['pt']['witnesses'])) {
$emailContent .='

Were there any witnesses?


▐ '.$claimRecord['specific']['pt']['witnesses'].'

';
}

if(!empty($claimRecord['specific']['pt']['firstaid'])) {
$emailContent .='

Did you receive first aid treatment?


▐ '.$claimRecord['specific']['pt']['firstaid'].'

';
}

if(!empty($claimRecord['specific']['pt']['hospital'])) {
$emailContent .='

Did you go to, or were you taken to, a hospital or medical facility?


▐ '.$claimRecord['specific']['pt']['hospital'].'

';
}


if ( (!empty($claimRecord['specific']['pt']['hospital'])) && ($claimRecord['specific']['pt']['hospital'] == 'Yes')) {


if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['name'])) {
$emailContent .='

Name of the hospital / Medical Practitioner (if known)


▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['name'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['address1'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['address1'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['address2'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['address2'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['town'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['town'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['county'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['county'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['country'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['country'].'

';
}


if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['postcode'])) {
$emailContent .='
▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['postcode'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['telephone'])) {
$emailContent .='

Telephone number


▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['telephone'].'

';
}

if(!empty($claimRecord['specific']['pt']['first-aid-hospital-address']['email'])) {
$emailContent .='

Email


▐ '.$claimRecord['specific']['pt']['first-aid-hospital-address']['email'].'

';
}


}


if(!empty($claimRecord['specific']['pt']['downgraded'])) {
$emailContent .='

Were you downgraded for any of the conditions on this claim?


▐ '.$claimRecord['specific']['pt']['downgraded'].'

';
}


if ( (!empty($claimRecord['specific']['pt']['downgraded'])) && ($claimRecord['specific']['pt']['downgraded'] == 'Yes')) {


if(!empty($claimRecord['specific']['pt']['downgraded-start']['fromyear'])) {
$emailContent .='

Date downgraded from


▐ '.@$claimRecord['specific']['pt']['downgraded-start']['fromday'].' / '.@$claimRecord['specific']['pt']['downgraded-start']['frommonth'].' / '.$claimRecord['specific']['pt']['downgraded-start']['fromyear'].'

';
}

if(!empty($claimRecord['specific']['pt']['downgraded-start']['datesapproximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['specific']['pt']['downgraded-start']['datesapproximate'].'

';
}

if(!empty($claimRecord['specific']['pt']['downgraded-end']['toyear'])) {
$emailContent .='

Date downgraded to


▐ '.@$claimRecord['specific']['pt']['downgraded-end']['today'].' / '.@$claimRecord['specific']['pt']['downgraded-end']['tomonth'].' / '.$claimRecord['specific']['pt']['downgraded-end']['toyear'].'

';
}

if(!empty($claimRecord['specific']['pt']['downgraded-end']['datesapproximate'])) {
$emailContent .='

Approximate date


▐ '.$claimRecord['specific']['pt']['downgraded-end']['datesapproximate'].'

';
}

if(!empty($claimRecord['specific']['pt']['downgraded-end']['stilldowngraded'])) {
$emailContent .='

Still downgraded?


▐ '.$claimRecord['specific']['pt']['downgraded-end']['stilldowngraded'].'

';
}

if(!empty($claimRecord['specific']['pt']['medical-categories']['frommedical'])) {
$emailContent .='

What medical category were you downgraded from?


▐ '.$claimRecord['specific']['pt']['medical-categories']['frommedical'].'

';
}

if(!empty($claimRecord['specific']['pt']['medical-categories']['tomedical'])) {
$emailContent .='

What medical category were you downgraded to?


▐ '.$claimRecord['specific']['pt']['medical-categories']['tomedical'].'

';
}

if(!empty($claimRecord['specific']['pt']['medical-categories']['multiple'])) {
$emailContent .='

I was downgraded and upgraded more than once within different categories


▐ '.$claimRecord['specific']['pt']['medical-categories']['multiple'].'

';
}

}


if(!empty($claimRecord['specific']['pt']['why'])) {
$emailContent .='

Why is your condition related to your armed forces service?


▐ '.$claimRecord['specific']['pt']['why'].'

';
}


$claimCount++;
}
}



$emailContent .= '

---
#Other Medical Treatment
---

';

if (!empty($data['sections']['medical-treatment']['received'])) {
$emailContent .= '

Have you received further hospital or medical treatment?


▐ '.$data['sections']['medical-treatment']['received'].'

';
}


if (!empty($data['sections']['medical-treatment']['records'])) {
$medicalCount = 1;
foreach ($data['sections']['medical-treatment']['records'] as $medicalRecord) {

$emailContent .='
#Medical Record '.$medicalCount.'
---
';


if (!empty($medicalRecord['hospital-address']['name'])) {
$emailContent .= 'Hospital/Medical facility


▐ '.$medicalRecord['hospital-address']['name'].'

';
}

if (!empty($medicalRecord['hospital-address']['address1'])) {
$emailContent .= '
▐ '.$medicalRecord['hospital-address']['address1'].'

';
}


if (!empty($medicalRecord['hospital-address']['address2'])) {
$emailContent .= '
▐ '.$medicalRecord['hospital-address']['address2'].'

';
}

if (!empty($medicalRecord['hospital-address']['town'])) {
$emailContent .= '
▐ '.$medicalRecord['hospital-address']['town'].'

';
}

if (!empty($medicalRecord['hospital-address']['county'])) {
$emailContent .= '
▐ '.$medicalRecord['hospital-address']['county'].'

';
}

if (!empty($medicalRecord['hospital-address']['country'])) {
$emailContent .= '
▐ '.$medicalRecord['hospital-address']['country'].'

';
}

if (!empty($medicalRecord['hospital-address']['postcode'])) {
$emailContent .= '
▐ '.$medicalRecord['hospital-address']['postcode'].'

';
}

if (!empty($medicalRecord['hospital-address']['telephone'])) {
$emailContent .= 'Telephone number


▐ '.$medicalRecord['hospital-address']['telephone'].'

';
}

if (!empty($medicalRecord['hospital-address']['email'])) {
$emailContent .= 'Email


▐ '.$medicalRecord['hospital-address']['email'].'

';
}

if (!empty($medicalRecord['conditions'])) {
$emailContent .= 'Condition treated


▐ '.$medicalRecord['conditions'].'

';
}

if (!empty($medicalRecord['treatment-start']['year'])) {
$emailContent .= 'Date your treatment started


▐ '.@$medicalRecord['treatment-start']['day'].' / '.@$medicalRecord['treatment-start']['month'].' / '.$medicalRecord['treatment-start']['year'].'

';
}



if (!empty($medicalRecord['treatment-start']['approximate'])) {
$emailContent .= 'Approximate date?


▐ '.$medicalRecord['treatment-start']['approximate'].'

';
}

if (!empty($medicalRecord['treatment-start']['waiting-list'])) {
$emailContent .= 'I am still on a waiting list


▐ '.$medicalRecord['treatment-start']['waiting-list'].'

';
}

if (!empty($medicalRecord['treatment-end']['year'])) {
$emailContent .= 'Date your treatment ended.


▐ '.@$medicalRecord['treatment-end']['day'].' / '.@$medicalRecord['treatment-end']['month'].' / '.$medicalRecord['treatment-end']['year'].'

';
}

if (!empty($medicalRecord['treatment-end']['approximate'])) {
$emailContent .= 'Approximate date?


▐ '.$medicalRecord['treatment-end']['approximate'].'

';
}

if (!empty($medicalRecord['treatment-end']['waiting-list'])) {
$emailContent .= 'This treatment has not yet ended


▐ '.$medicalRecord['treatment-end']['waiting-list'].'

';
}

if (!empty($medicalRecord['type'])) {
$emailContent .= 'What type of medical treatment did you receive?


▐ '.$medicalRecord['type'].'

';
}

$medicalCount++;
}
}



$emailContent .= '

---
#Other Compensation
---
';


if(!empty($data['sections']['other-compensation']['received-compensation'])) {
$emailContent .= 'Claiming or have you received compensation payments from other sources?


▐ '.$data['sections']['other-compensation']['received-compensation'].'

';
}

if(!empty($data['sections']['other-compensation']['conditions'])) {
$emailContent .= 'What medical condition(s)?


▐ '.$data['sections']['other-compensation']['conditions'].'

';
}

if(!empty($data['sections']['other-compensation']['outcome'])) {
$emailContent .= 'Who did you claim from/amount?


▐ '.$data['sections']['other-compensation']['outcome'].'

';
}

if(!empty($data['sections']['other-compensation']['payment'])) {
$emailContent .= 'Did you receive a payment?


▐ '.$data['sections']['other-compensation']['payment'].'

';
}

if ( (!empty($data['sections']['other-compensation']['payment'])) && ($data['sections']['other-compensation']['payment'] == 'Yes') ) {


if(!empty($data['sections']['other-compensation']['amount'])) {
$emailContent .= 'Amount paid


▐ '.$data['sections']['other-compensation']['amount'].'

';
}

if(!empty($data['sections']['other-compensation']['type'])) {
$emailContent .= 'What type of payment was this?


▐ '.$data['sections']['other-compensation']['type'].'

';
}

if(!empty($data['sections']['other-compensation']['payment-date']['year'])) {
$emailContent .= 'When did you receive this payment?


▐ '.@$data['sections']['other-compensation']['payment-date']['day'].' / '.@$data['sections']['other-compensation']['payment-date']['month'].' /  '.$data['sections']['other-compensation']['payment-date']['year'].'

';
}

if(!empty($data['sections']['other-compensation']['payment-date']['approximate'])) {
$emailContent .= 'Appoximate date?


▐ '.$data['sections']['other-compensation']['payment-date']['approximate'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitorhelp'])) {
$emailContent .= 'Did a solicitor help you with your claim for other compensation?


▐ '.$data['sections']['other-compensation']['solicitorhelp'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['fullname'])) {
$emailContent .= 'Solicitors&#039; full name


▐ '.$data['sections']['other-compensation']['solicitor-address']['fullname'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['address1'])) {
$emailContent .= '
▐ '.$data['sections']['other-compensation']['solicitor-address']['address1'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['address2'])) {
$emailContent .= '
▐ '.$data['sections']['other-compensation']['solicitor-address']['address2'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['town'])) {
$emailContent .= '
▐ '.$data['sections']['other-compensation']['solicitor-address']['town'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['county'])) {
$emailContent .= '
▐ '.$data['sections']['other-compensation']['solicitor-address']['county'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['postcode'])) {
$emailContent .= '
▐ '.$data['sections']['other-compensation']['solicitor-address']['postcode'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['country'])) {
$emailContent .= '
▐ '.$data['sections']['other-compensation']['solicitor-address']['country'].'

';
}

if(!empty($data['sections']['other-compensation']['solicitor-address']['telephone'])) {
$emailContent .= 'Contact number


▐ '.$data['sections']['other-compensation']['solicitor-address']['telephone'].'

';
}

}



$emailContent .= '

---
#Other Benefits
---
';

if(!empty($data['sections']['other-benefits']['benefits'])) {
$emailContent .= 'Are you receiving Tax Credits, Housing Benefit, Council Tax Benefit or Industrial Injuries Disablement Benefit?


▐ '.$data['sections']['other-benefits']['benefits'].'

';
}

if(!empty($data['sections']['other-benefits']['other-paid'])) {
$emailContent .= 'Have you ever received a payment for Mesothelioma or Pneumoconiosis?


▐ '.$data['sections']['other-benefits']['other-paid'].'

';
}


if ( (!empty($data['sections']['other-benefits']['other-paid'])) && ($data['sections']['other-benefits']['other-paid'] == 'Yes') ) {

if(!empty($data['sections']['other-benefits']['details']['diffuse2014'])) {
$emailContent .= 'Diffuse Mesothelioma 2014 Scheme


▐ '.$data['sections']['other-benefits']['details']['diffuse2014'].'

';
}

if(!empty($data['sections']['other-benefits']['details']['diffuse2008'])) {
$emailContent .= 'Diffuse Mesothelioma 2008 Scheme


▐ '.$data['sections']['other-benefits']['details']['diffuse2008'].'

';
}

if(!empty($data['sections']['other-benefits']['details']['worker1979'])) {
$emailContent .= 'The Workers Compensation 1979 Pneumoconiosis Act


▐ '.$data['sections']['other-benefits']['details']['worker1979'].'

';
}

}


$emailContent .= '

---
#Payment details
---
';

if(!empty($data['sections']['bank-account']['providebank'])) {
$emailContent .= 'Do you wish to provide your bank account details?


▐ '.$data['sections']['bank-account']['providebank'].'

';
}

if ( (!empty($data['sections']['bank-account']['bank-address']))  &&  ($data['sections']['bank-account']['providebank'] == 'Yes') ) {

 if(!empty($data['sections']['bank-account']['banklocation'])) {
$emailContent .= 'Where is your bank account?


▐ '.$data['sections']['bank-account']['banklocation'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['bankname'])) {
$emailContent .= 'Name of bank, building society or other account provider


▐ '.$data['sections']['bank-account']['bank-address']['bankname'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['accountname'])) {
$emailContent .= 'Name on the account


▐ '.$data['sections']['bank-account']['bank-address']['accountname'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['sortcode'])) {
$emailContent .= 'Sort code


▐ '.$data['sections']['bank-account']['bank-address']['sortcode'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['accountnumber'])) {
$emailContent .= 'Account number


▐ '.$data['sections']['bank-account']['bank-address']['accountnumber'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['rollnumber'])) {
$emailContent .= 'Building society roll number


▐ '.$data['sections']['bank-account']['bank-address']['rollnumber'].'

';
}

if(!empty($data['sections']['bank-account']['bank-address']['accountreason'])) {
$emailContent .= 'If this is not your bank account, please tell us whose account it is and why you have chosen this account


▐ '.$data['sections']['bank-account']['bank-address']['accountreason'].'

';
}

}

if ( (!empty($data['sections']['bank-account']['overseas-bank-address'])) &&  ($data['sections']['bank-account']['providebank'] == 'Yes') ) {



if(!empty($data['sections']['bank-account']['banklocation'])) {
$emailContent .= 'Where is your bank account?


▐ '.$data['sections']['bank-account']['banklocation'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['bankname'])) {
$emailContent .= 'Name of bank or other account provider


▐ '.$data['sections']['bank-account']['overseas-bank-address']['bankname'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['accountname'])) {
$emailContent .= 'Name on the account


▐ '.$data['sections']['bank-account']['overseas-bank-address']['accountname'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['iban'])) {
$emailContent .= 'International Bank Account Number (IBAN)


▐ '.$data['sections']['bank-account']['overseas-bank-address']['iban'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['bsbcode'])) {
$emailContent .= 'BSB Code


▐ '.$data['sections']['bank-account']['overseas-bank-address']['bsbcode'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['swiftcode'])) {
$emailContent .= 'Bank Identifier Code (BIC)


▐ '.$data['sections']['bank-account']['overseas-bank-address']['swiftcode'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['transitroute'])) {
$emailContent .= 'Transit Routing Number


▐ '.$data['sections']['bank-account']['overseas-bank-address']['transitroute'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['typeofaccount'])) {
$emailContent .= 'Type of account


▐ '.$data['sections']['bank-account']['overseas-bank-address']['typeofaccount'].'

';
}

if(!empty($data['sections']['bank-account']['overseas-bank-address']['accountreason'])) {
$emailContent .= 'If this is not your bank account, please tell us whose account it is and why you have chosen this account


▐ '.$data['sections']['bank-account']['overseas-bank-address']['accountreason'].'

';
}

}




$emailContent .= '

---
#File Uploads
---

';


    if (!empty($data['sections']['supporting-documents']['files'])) {



        foreach ($data['sections']['supporting-documents']['files'] as $k => $file) {


$emailContent .='



'.$file['name'].' ('.$file['downloadURL'].')

 ';


        }

} else {

$emailContent .'
No files added
';

}

if (!empty($data['sections']['supporting-documents']['file-information'])) {
$emailContent .= '
File comments

▐ '.$data['sections']['supporting-documents']['file-information'].'

';
}

$emailContent .= '

---
#Declaration
---

Read and agreed to the declaration


▐ '.@$data['submission']['declaration'].'


';


//Safety dump

$string = '';

function returnData($arr) {
   GLOBAL $string;

    foreach($arr as $k=>$v) {
        if (is_array($v)) {
           returnData($v);
        } else {
            $string .= '

# '.$k.'

'.$v.'


---

';
        }
    }
    return $string;
}


$fullContent = returnData($data);


$appstage = getenv('APP_STAGE');
if (empty($appstage)) {
    $appstage = 'PROD';
}



if ( (!empty($data['sections']['about-you']['telephonenumber']['mobilepermission'])) && ($data['sections']['about-you']['telephonenumber']['mobilepermission'] == 'Yes') ) {


//send a confirmation SMS if we want to

    if ($appstage == 'LOCAL') {

     //do nothing

    } else {

        if (!empty($data['sections']['about-you']['telephonenumber']['mobile'])) {

            //send notify code out
            $mobile = @$data['sections']['about-you']['telephonenumber']['mobile'];
            if (!empty($mobile)) {
            Notify::getInstance()->setData(['reference' => $reference_number])->sendSms($mobile, 'd02d27ce-d01d-46b8-8e26-149894239666');
            }
        }
    }

}


if ($appstage != 'LOCAL') {



//send to user regardless

if (!empty($data['sections']['about-you']['email'])) {
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail($data['sections']['about-you']['email'], env('NOTIFY_USER_CONFIRMATION'));
}



if ( ($appstage == 'UAT') || ($appstage == 'PROD') )  {


if (!empty($data['settings']['time_started'])) {

    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('dbsvets-modernisation-contactus@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $fullContent])->sendEmail('dbsvets-modernisation-contactus@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));


}



} else {


if (!empty($data['settings']['time_started'])) {

    //back office emails
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_CLAIM_SUBMITTED'));
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('Joanne.McGee103@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));


    //safety dump
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $fullContent])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_CLAIM_SUBMITTED'));
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $fullContent])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $fullContent])->sendEmail('Joanne.McGee103@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));



    //customer emails
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_USER_CONFIRMATION'));
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail('Joanne.McGee103@mod.gov.uk', env('NOTIFY_USER_CONFIRMATION'));
    Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $content])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_USER_CONFIRMATION'));

}

}

}



    unset($data);
    $data = array();
    storeData($userID,$data);
    deleteData($userID);





$page_title = 'Application complete';

?>

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

    <p class="govuk-body">Your application has now been received by Veterans UK and you can no longer access your application online.</p>
<p class="govuk-body">We’ve sent you a confirmation email to the address you entered.
</p>

    <h2>What happens next</h2>
    <p class="govuk-body">Veterans UK will consider your claim and obtain any documents or evidence needed. We will contact you if we need any more information. </p>

    <p class="govuk-body">We’ll consider your claim very carefully and will obtain any documents or evidence we need. We’ll contact you if we need any more information. We’ve published an <a href="https://assets.publishing.service.gov.uk/government/uploads/system/uploads/attachment_data/file/1062261/AFCS_Claim_Customer_Journey.pdf">Armed Forces Compensation Scheme Process flow diagram</a> and a <a href="https://assets.publishing.service.gov.uk/government/uploads/system/uploads/attachment_data/file/1062281/War_Pension_Scheme_Claim_Customer_Journey.pdf">War Pension Scheme Process Flow Diagram</a> that explain what happens next in more detail.</p>






                                <div class="govuk-inset-text">
The assessment process can be complex and involves gathering information from many sources. On average claims take around 5 to 7 months to complete but more complex cases can take longer.
</div>

    <p class="govuk-body">We'll write and tell you the outcome of your claim as soon as a decision is made and we'll send you an update after 12 weeks if your claim is still being processed. If you’d like an update before then, or if you have any questions, you can contact our helpline on 0808 1914 218 (8am – 4pm, Monday to Friday).  </p>


<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    If you told us your bank account details and these change, you must <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">contact us</a> or payment could be made to the wrong account.
  </strong>
</div>



    <h2>What did you think of this service?</h2>
    <p class="govuk-body">We would like to know your views about using our online claims service today. Please consider completing our short  <a href="https://surveys.mod.uk/index.php/892274?lang=en">user survey</a> to tell us how we can improve.</p>



    <h2 class="govuk-heading-m">Do you need further help or support?</h2>
    <p class="govuk-body">All veterans and their families are entitled to free help and support from Veterans UK at any time. This includes a free helpline and Veterans Welfare Service that can assist with welfare information including benefits, help in the home, employment and financial support. More information and contact details can be found on our website <a href="https://www.gov.uk/guidance/urgent-help-for-veterans">https://www.gov.uk/guidance/urgent-help-for-veterans</a> </p>

 <a href="/" class="govuk-button govuk-button--start govuk-!-margin-top-4">Finish</a>


            </div>
        </div>
    </main>
</div>






@include('framework.footer')
