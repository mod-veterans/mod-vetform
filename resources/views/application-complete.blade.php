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
#Who is making this application
---
';

if (!empty($data['sections']['applicant-who']['who is making this application'])) {
switch ($data['sections']['applicant-who']['who is making this application']) {

	case "The person named on this claim is making the application.":

$emailContent = '
#Who is making this application
The person named on this claim is making the application.
';

break;
case "I am making an application for someone else and I have legal authority to act on their behalf.":

$emailContent .= '
#Who is making this application
I am making an application for someone else and I have legal authority to act on their behalf.

#Your full name
'.@$data['sections']['applicant-who']['legal authority']['fullname'].'

#Building and street
'.@$data['sections']['applicant-who']['legal authority']['address1'].'

#Building and street line 2 of 2
'.@$data['sections']['applicant-who']['legal authority']['address2'].'

#Town or city
'.@$data['sections']['applicant-who']['legal authority']['town'].'

#County
'.@$data['sections']['applicant-who']['legal authority']['county'].'

#Country
'.@$data['sections']['applicant-who']['legal authority']['country'].'

#Postcode
'.@$data['sections']['applicant-who']['legal authority']['postcode'].'

#Telephone number
'.$data['sections']['applicant-who']['legal authority']['nominee-number'].'

#What legal authority do you have to make a claim on behalf of the person named?
'.@$data['sections']['applicant-who']['legal authority']['details'].'

';
break;


case "I am helping someone else make this application.":
$emailContent .= '
#Who is making this application
I am helping someone else make this application.

#Name of assistant making this claim
'.@$data['sections']['applicant-who']['helper']['name'].'

#Relationship to claimant
'.@$data['sections']['applicant-who']['helper']['relationship'].'

#Assisted claim declaration understood
'.@$data['sections']['applicant-who']['helper']['declaration'].'

';
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

$emailContent .= '

#Would you like to nominate a representative?
'.@$data['sections']['nominate-representative']['nominate-representative'].'

#Their full name
'.@$data['sections']['nominate-representative']['nominated representative']['fullname'].'

#Building and street
'.@$data['sections']['nominate-representative']['nominated representative']['address1'].'

#Building and street line 2 of 2
'.@$data['sections']['nominate-representative']['nominated representative']['address2'].'

#Town or city
'.@$data['sections']['nominate-representative']['nominated representative']['town'].'

#County
'.@$data['sections']['nominate-representative']['nominated representative']['county'].'

#Country
'.@$data['sections']['nominate-representative']['nominated representative']['country'].'

#Postcode
'.@$data['sections']['nominate-representative']['nominated representative']['postcode'].'

#Telephone number
'.@$data['sections']['nominate-representative']['nominated representative']['nominee-number'].'

#Email address
'.@$data['sections']['nominate-representative']['nominated representative']['email-address'].'

#What is your representatives role?
'.@$data['sections']['nominate-representative']['nominated representative']['role'].'

';

break;

case "No":
$emailContent .='

#Would you like to nominate a representative?
'.@$data['sections']['nominate-representative']['nominate-representative'].'

';

break;

}
}


$emailContent .= '
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

} //end foreach
} //end if service


//Claim

$emailContent .= '

---
#Claims
---

';


if (!empty($data['sections']['claim']['records'])) {
foreach ($data['sections']['claim']['records'] as $claimRecord) {

if ($data['sections']['claims']['records'][$thisRecord]['type'] == 'A condition, injury or illness that started over a period of time and is not related to a specific incident or accident') {


$emailContent .= '
#Type of medical condition
'.@$claimRecord['type'].'

#What medical condition(s) are you claiming for?
'.@$claimRecord['non-specific']['condition'].'

#Name of the Medical Practitioner (if known)
'.@$claimRecord['non-specific']['hospital-address']['name'].'

#Building and street
'.@$claimRecord['non-specific']['hospital-address']['address1'].'

#Building and street line 2 of 2
'.@$claimRecord['non-specific']['hospital-address']['address2'].'

#Town or city
'.@$claimRecord['non-specific']['hospital-address']['town'].'

#County
'.@$claimRecord['non-specific']['hospital-address']['county'].'

#Country
'.@$claimRecord['non-specific']['hospital-address']['country'].'

#Postcode
'.@$claimRecord['non-specific']['hospital-address']['postcode'].'

#Telephone number
'.@$claimRecord['non-specific']['hospital-address']['telephone'].'

#Email
'.@$claimRecord['non-specific']['hospital-address']['email'].'

#What was the date your condition started?
'.@$claimRecord['condition-start-date']['day'].' / '.@$claimRecord['condition-start-date']['month'].' / '.@$claimRecord['condition-start-date']['year'].'

#Is this date approximate?
'.@$claimRecord['condition-start-date']['approximate'].'

#What is your illness/condition related to
'.@$claimRecord['related-conditions'].'

#Is illness/condition due to exposure to
'.@$claimRecord['related-exposure'].'

#Chemical Exposure - what substances were you exposed to?
'.@$claimRecord['exposure-date']['substances'].'

#Chemical Exposure - date of first exposure?
'.@$claimRecord['exposure-date']['day'].' / '.$claimRecord['exposure-date']['month'].' / '.$claimRecord['exposure-date']['year'].'

#Chemical Exposure - length of exposure?
'.@$claimRecord['exposure-date']['length'].'

#When did you first seek medical attention for the condition(s)
'.@$claimRecord['medical-attention']['day'].' / '.@$claimRecord['medical-attention']['month'].' / '.@$claimRecord['medical-attention']['year'].'

#Is this date approximate?
'.@$claimRecord['medical-attention']['approximate'].'

#Were you downgraded for any of the conditions on this claim?
'.@$claimRecord['downgraded'].'

#Date downgraded start
'.@$claimRecord['non-specific']['downgraded-start']['fromday'].' / '.@$claimRecord['non-specific']['downgraded-start']['frommonth'].' / '.@$claimRecord['non-specific']['downgraded-start']['fromyear'].'

#Downgraded start dates approximate?
'.@$claimRecord['non-specific']['downgraded-start']['datesapproximate'].'

#Date downgraded end
'.@$claimRecord['non-specific']['downgraded-end']['today'].' / '.@$claimRecord['non-specific']['downgraded-end']['tomonth'].' / '.@$claimRecord['non-specific']['downgraded-end']['toyear'].'

#Downgrade end dates approximate?
'.@$claimRecord['non-specific']['downgraded-end']['datesapproximate'].'

#Are you still downgraded?
'.@$claimRecord['non-specific']['downgraded-end']['stilldowngraded'].'

#What medical category were you downgraded from?
'.@$claimRecord['non-specific']['medical-categories']['frommedical'].'

#What medical category were you downgraded to?
'.@$claimRecord['non-specific']['medical-categories']['tomedical'].'

#Were you downgraded and upgraded more than once within different categories?
'.@$claimRecord['non-specific']['medical-categories']['multiple'].'

#Why is your condition related to your armed forces service?
'.@$claimRecord['non-specific']['why'].'


';


} //end non-specific



if ($claimRecord['type'] == 'A condition, injury or illness that is the result of a specific accident or incident') {

if ($claimRecord['specific']['pt-related'] == 'Yes') {

$emailContent .= '

#Type of medical condition
'.@$claimRecord['type'].'

#Was the incident or accident related to sport, adventure training or physical training?
'.@$claimRecord['specific']['pt-related'].'

#What medical condition(s) are you claiming for?
'.@$claimRecord['specific']['pt']['conditions'].'

#Name of the Medical Practitioner (if known)
'.@$claimRecord['specific']['pt']['hospital-address']['name'].'

#Building and street
'.@$claimRecord['specific']['pt']['hospital-address']['address1'].'

#Building and street line 2 of 2
'.@$claimRecord['specific']['pt']['hospital-address']['address2'].'

#Town or city
'.@$claimRecord['specific']['pt']['hospital-address']['town'].'

#County
'.@$claimRecord['specific']['pt']['hospital-address']['county'].'

#Country
'.@$claimRecord['specific']['pt']['hospital-address']['country'].'

#Postcode
'.@$claimRecord['specific']['pt']['hospital-address']['postcode'].'

#Telephone number
'.@$claimRecord['specific']['pt']['hospital-address']['telephone'].'

#Email'.@$claimRecord['specific']['pt']['hospital-address']['email'].'

#What was the date your condition started?
'.@$claimRecord['specific']['pt']['condition-start-date']['day'].' / '.@$claimRecord['specific']['pt']['condition-start-date']['month'].' / '.@$claimRecord['specific']['pt']['condition-start-date']['year'].'

#Is this date approximate?
'.@$claimRecord['specific']['pt']['condition-start-date']['approximate'].'

#What is your illness/condition related to
'.@$claimRecord['related-conditions'].'

#What was the activity?
'.@$claimRecord['specific']['pt']['activity'].'

#Was the activity authorised or organised by the Armed Forces?
'.@$claimRecord['specific']['pt']['authorised'].'

#Were you representing your Unit?
'.@$claimRecord['specific']['pt']['representing'].'

#Where were you when the incident happened?
'.@$claimRecord['specific']['pt']['where'].'

#Were there any witnesses
'.@$claimRecord['specific']['pt']['witnesses'].'

#Did you receive first aid treatment at the time?
'.@$claimRecord['specific']['pt']['firstaid'].'
Did you go to, or were you taken to, a hospital or medical facility?
'.@$claimRecord['specific']['pt']['hospital'].'

#Name of the Medical Practitioner (if known)
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['name'].'

#Building and street
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['address1'].'

#Building and street line 2 of 2
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['address2'].'

#Town or city
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['town'].'

#County
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['county'].'

#Country
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['country'].'

#Postcode
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['postcode'].'

#Telephone number
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['telephone'].'

#Email
'.@$claimRecord['specific']['pt']['first-aid-hospital-address']['email'].'

#Were you downgraded for any of the conditions on this claim?
'.@$claimRecord['specific']['pt']['downgraded'].'

#Date downgraded from
'.@$claimRecord['specific']['pt']['downgraded-start']['fromday'].' / '.@$claimRecord['specific']['pt']['downgraded-start']['frommonth'].' / '.@$claimRecord['specific']['pt']['downgraded-start']['fromyear'].'

#Downgrade start date approximate?
'.@$claimRecord['specific']['pt']['downgraded-start']['datesapproximate'].'

#Date downgraded to
'.@$claimRecord['specific']['pt']['downgraded-end']['today'].' / '.@$claimRecord['specific']['pt']['downgraded-end']['tomonth'].' / '.@$claimRecord['specific']['pt']['downgraded-end']['toyear'].'

#Downgrade end date approximate?
'.@$claimRecord['specific']['pt']['downgraded-end']['datesapproximate'].'

#Are you still downgraded?
'.@$claimRecord['specific']['pt']['downgraded-end']['stilldowngraded'].'

#What medical category were you downgraded from?
'.$claimRecord['specific']['pt']['medical-categories']['frommedical'].'

#What medical category were you downgraded to?
'.@$claimRecord['specific']['pt']['medical-categories']['tomedical'].'

#Were you downgraded and upgraded more than once within different categories?
'.@$claimRecord['specific']['pt']['medical-categories']['multiple'].'

#Why is your condition related to your armed forces service?
'.@$claimRecord['specific']['pt']['why'].'

';


} //end PT



if ($claimRecord['specific']['pt-related'] == 'No') {

$emailContent .= '

#Type of medical condition
'.@$claimRecord['type'].'

#Was the incident or accident related to sport, adventure training or physical training?
'.@$claimRecord['specific']['pt-related'].'

#What medical condition(s) are you claiming for?
'.@$claimRecord['specific']['non-pt']['conditions'].'

#Name of the Medical Practitioner (if known)
'.@$claimRecord['specific']['non-pt']['hospital-address']['name'].'

#Building and street
'.@$claimRecord['specific']['non-pt']['hospital-address']['address1'].'

#Building and street line 2 of 2
'.@$claimRecord['specific']['non-pt']['hospital-address']['address2'].'

#Town or city
'.@$claimRecord['specific']['non-pt']['hospital-address']['town'].'

#County
 '.@$claimRecord['specific']['non-pt']['hospital-address']['county'].'

#Country
'.@$claimRecord['specific']['non-pt']['hospital-address']['country'].'

#Postcode
'.@$claimRecord['specific']['non-pt']['hospital-address']['postcode'].'

#Telephone number
'.@$claimRecord['specific']['non-pt']['hospital-address']['telephone'].'

#Email
'.@$claimRecord['specific']['non-pt']['hospital-address']['email'].'

#What was the date your condition started?
'.@$claimRecord['specific']['non-pt']['condition-start-date']['day'].' / '.@$claimRecord['specific']['non-pt']['condition-start-date']['month'].' / '.@$claimRecord['specific']['non-pt']['condition-start-date']['year'].'

#Is this date approximate?
'.@$claimRecord['specific']['non-pt']['condition-start-date']['approximate'].'

#Were you on duty at the time of incident?
'.@$claimRecord['specific']['non-pt']['on-duty'].'

#Did you report the incident?
'.@$claimRecord['specific']['non-pt']['report-incident'].'

#Who did you report the incident to?
'.@$claimRecord['specific']['non-pt']['who-reported'].'

#Was an accident form completed?
'.@$claimRecord['specific']['non-pt']['accident-form'].'

#Where were you when the incident happened?
'.@$claimRecord['specific']['non-pt']['where-were-you'].'

#Was the incident a road traffic accident?
'.@$claimRecord['specific']['non-pt']['rta'].'

#What was the reason for your journey?
'.@$claimRecord['specific']['non-pt']['journey-reason'].'

#Where did your journey start?
'.@$claimRecord['specific']['non-pt']['journey-start'].'

#Was the incident reported to the civilian or military police?
'.@$claimRecord['specific']['non-pt']['police-reported'].'

#Was the incident reported to the civilian or military police?
Civilian Case Ref: '.@$claimRecord['specific']['non-pt']['police-report']['civilian-ref'].'
Military Case Ref: '.@$claimRecord['specific']['non-pt']['police-report']['military-ref'].'
I dont know: '.@$claimRecord['specific']['non-pt']['police-report']['dontknow'].'

#Were you on authorised leave at the time of the accident?
'.@$claimRecord['specific']['non-pt']['authorised-leave'].'

#Were there any witnesses?
'.@$claimRecord['specific']['non-pt']['witnesses'].'

#Did you receive first aid treatment at the time?
'.@$claimRecord['specific']['non-pt']['firstaid'].'

#Did you go to, or were you taken to, a hospital or medical facility?
'.@$claimRecord['specific']['non-pt']['hospital'].'

#Name of the Medical Practitioner (if known)
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['name'].'

#Building and street
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['address1'].'

#Building and street line 2 of 2
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['address2'].'

#Town or city
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['town'].'

#County
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['county'].'

#Country
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['country'].'

#Postcode
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['postcode'].'

#Telephone number
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['telephone'].'

#Email
'.@$claimRecord['specific']['non-pt']['first-aid-hospital-address']['email'].'

#Were you downgraded for any of the conditions on this claim?
'.@$claimRecord['specific']['non-pt']['downgraded'].'

#Date downgraded from
'.@$claimRecord['specific']['non-pt']['downgraded-start']['fromday'].' / '.@$claimRecord['specific']['non-pt']['downgraded-start']['frommonth'].' / '.@$claimRecord['specific']['non-pt']['downgraded-start']['fromyear'].'

#Downgrade from date approximate?
'.@$claimRecord['specific']['non-pt']['downgraded-start']['datesapproximate'].'

#Date downgraded to
'.@$claimRecord['specific']['non-pt']['downgraded-end']['today'].' / '.@$claimRecord['specific']['non-pt']['downgraded-end']['tomonth'].' / '.@$claimRecord['specific']['non-pt']['downgraded-end']['toyear'].'

#Downgrade end date approximate?
'.@$claimRecord['specific']['non-pt']['downgraded-end']['datesapproximate'].'

#Are you still downgraded?
'.@$claimRecord['specific']['non-pt']['downgraded-end']['stilldowngraded'].'

#What medical category were you downgraded from?
'.@$claimRecord['specific']['non-pt']['medical-categories']['frommedical'].'

#What medical category were you downgraded to?
'.@$claimRecord['specific']['non-pt']['medical-categories']['tomedical'].'

#Were you downgraded and upgraded more than once within different categories?
'.@$claimRecord['specific']['non-pt']['medical-categories']['multiple'].'

#Why is your condition related to your armed forces service?
'.@$claimRecord['specific']['non-pt']['why'].'

';


} //end non-PT

} //end specific


} //end foreach
} //end if claims



$emailContent .= '

---
#Other Medical Treatment
---

';

if (!empty($data['sections']['claim']['records'])) {
foreach ($data['sections']['medical-treatment']['records'] as $medicalRecord) {

$emailContent .= '

#Hospital/Medical facility
'.@$medicalRecord['hospital-address']['name'].'

#Building and street
'.@$medicalRecord['hospital-address']['address1'].'

#Building and street line 2 of 2
'.@$medicalRecord['hospital-address']['address2'].'

#Town or city
'.@$medicalRecord['hospital-address']['town'].'

#County
'.@$medicalRecord['hospital-address']['county'].'

#Country
'.@$medicalRecord['hospital-address']['country'].'

#Postcode
'.@$medicalRecord['hospital-address']['postcode'].'

#Telephone number
'.@$medicalRecord['hospital-address']['telephone'].'

#Email
'.@$medicalRecord['hospital-address']['email'].'

#Condition treated
'.@$medicalRecord['conditions'].'

#Date your treatment started. If you are not sure, just enter a year.
'.@$medicalRecord['treatment-start']['day'].' //
                                     '.@$medicalRecord['treatment-start']['month'].' //
                                    '.@$medicalRecord['treatment-start']['year'].'


#This date is approximate
'.@$medicalRecord['treatment-start']['approximate'].'

#I am still on a waiting list to attend
'.@$medicalRecord['treatment-start']['waiting-list'].'

#Date your treatment ended. If you are not sure, just enter a year.
'.@$medicalRecord['treatment-end']['day'].' //
                                     '.@$medicalRecord['treatment-end']['month'].' //
                                    '.@$medicalRecord['treatment-end']['year'].'

#This date is approximate
'.@$medicalRecord['treatment-end']['approximate'].'

#This treatment has not yet ended
'.@$medicalRecord['treatment-end']['waiting-list'].'

#What type of medical treatment did you receive?
'.@$medicalRecord['type'].'


';

}

}

$emailContent .= '

---
#Other Compensation
---

#Are you claiming for or have you received compensation payments from other sources?
'.@$data['sections']['other-compensation']['received-compensation'].'

#What medical condition(s) have you received (or are you claiming) other compensation for?
'.@$data['sections']['other-compensation']['conditions'].'

#Who did you claim from/amount?
'.@$data['sections']['other-compensation']['outcome'].'

#Did you receive a payment as a result of this claim?
'.@$data['sections']['other-compensation']['payment'].'

#Amount paid
'.@$data['sections']['other-compensation']['amount'].'

#What type of payment was this?
'.@$data['sections']['other-compensation']['type'].'

#When did you receive this payment?
'.@$data['sections']['other-compensation']['payment-date']['day'].' / '.@$data['sections']['other-compensation']['payment-date']['month'].' / '.@$data['sections']['other-compensation']['payment-date']['year'].'

#This date is appoximate?
'.@$data['sections']['other-compensation']['payment-date']['approximate'].'

#Did a solicitor help you with your claim for other compensation?
'.@$data['sections']['other-compensation']['solicitorhelp'].'

#Solicitors&#039; full name
'.@$data['sections']['other-compensation']['solicitor-address']['fullname'].'

#Building and street
'.@$data['sections']['other-compensation']['solicitor-address']['address1'].'

#Building and street line 2 of 2
'.@$data['sections']['other-compensation']['solicitor-address']['address2'].'

#Town
'.@$data['sections']['other-compensation']['solicitor-address']['town'].'

#County
'.@$data['sections']['other-compensation']['solicitor-address']['county'].'

#Postcode
'.@$data['sections']['other-compensation']['solicitor-address']['postcode'].'

#Country
'.@$data['sections']['other-compensation']['solicitor-address']['country'].'

#Contact number
'.@$data['sections']['other-compensation']['solicitor-address']['telephone'].'


';


$emailContent .= '

---
#Other Benefits
---
Are you receiving any of the following?
'.@$data['sections']['other-benefits']['benefits'].'

#Have you ever been paid any of the following?
'.@$data['sections']['other-benefits']['other-paid'].'

#Diffuse Mesothelioma 2014 Scheme
'.@$data['sections']['other-benefits']['details']['diffuse2014'].'

#Diffuse Mesothelioma 2008 Scheme
'.@$data['sections']['other-benefits']['details']['diffuse2008'].'

#The Workers Compensation 1979 Pneumoconiosis Act
'.@$data['sections']['other-benefits']['details']['worker1979'].'


';



$emailContent .= '

---
#Payment details
---

#Do you wish to provide your bank account details?
'.@$data['sections']['bank-account']['providebank'].'

#Where is your bank account?
'.@$data['sections']['bank-account']['banklocation'].'

#Name of bank, building society or other account provider
'.@$data['sections']['bank-account']['bank-address']['bankname'].'

#Name on the account
'.@$data['sections']['bank-account']['bank-address']['accountname'].'

#Sort code
'.@$data['sections']['bank-account']['bank-address']['sortcode'].'

#Account number
'.@$data['sections']['bank-account']['bank-address']['accountnumber'].'

#Building society roll number
'.@$data['sections']['bank-account']['bank-address']['rollnumber'].'

#If this is not your bank account, please tell us whose account it is and why you have chosen this account
'.@$data['sections']['bank-account']['bank-address']['accountreason'].'


#Where is your bank account?
'.@$data['sections']['bank-account']['banklocation'].'

#Name of bank, building society or other account provider
'.@$data['sections']['bank-account']['overseas-bank-address']['bankname'].'

#Account Name
'.@$data['sections']['bank-account']['overseas-bank-address']['accountname'].'

#Name on the account
'.@$data['sections']['bank-account']['overseas-bank-address']['nameonaccount'].'

#International Bank Account Number (IBAN)
'.@$data['sections']['bank-account']['overseas-bank-address']['iban'].'

#BSB Code
'.@$data['sections']['bank-account']['overseas-bank-address']['bsbcode'].'

#Bank Identifier Code (BIC)
'.@$data['sections']['bank-account']['overseas-bank-address']['swiftcode'].'

#Transit Routing Number

#Type of account
'.@$data['sections']['bank-account']['overseas-bank-address']['typeofaccount'].'

#If this is not your bank account, please tell us whose account it is and why you have chosen this account
'.@$data['sections']['bank-account']['overseas-bank-address']['accountreason'].'



';









Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_CLAIM_SUBMITTED'));
Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));
Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $emailContent])->sendEmail('Joanne.McGee103@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));





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




Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $fullContent])->sendEmail('garry@poweredbyreason.co.uk', env('NOTIFY_CLAIM_SUBMITTED'));
Notify::getInstance()->setData(['reference_number' => $reference_number,'content' => $fullContent])->sendEmail('David.Johnson833@mod.gov.uk', env('NOTIFY_CLAIM_SUBMITTED'));




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
