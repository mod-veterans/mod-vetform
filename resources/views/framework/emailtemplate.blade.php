@php


$emailContent = '

---
Personal details
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
Medical Officer
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
Service details
---
';

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

@endphp
