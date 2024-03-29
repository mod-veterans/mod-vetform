@include('framework.functions')
@php

//Add in the auto-complete for country
$footerScripts = array();
$footerScripts[] = '
<script type="text/javascript" src="https://modvets-dev2.london.cloudapps.digital/js/location-autocomplete.min.js"></script>
    <script type="text/javascript">
        openregisterLocationPicker({
            selectElement: document.getElementById("/representative/representative-address/country"),
            url: "/assets/data/location-autocomplete-graph.json"

        })
</script>

';


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$fullname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$address1 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$address2 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$town = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$county = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$country = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$postcode = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$telephonenumber = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$emailaddress = array('data'=>'', 'error'=>'', 'errorLabel'=>'');

//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['nominate-representative']['nominated representative'])) {
        $fullname['data']            = @$data['sections']['nominate-representative']['nominated representative']['fullname'];
        $address1['data']            = @$data['sections']['nominate-representative']['nominated representative']['address1'];
        $address2['data']            = @$data['sections']['nominate-representative']['nominated representative']['address2'];
        $town['data']                = @$data['sections']['nominate-representative']['nominated representative']['town'];
        $county['data']              = @$data['sections']['nominate-representative']['nominated representative']['county'];
        $country['data']             = @$data['sections']['nominate-representative']['nominated representative']['country'];
        $postcode['data']            = @$data['sections']['nominate-representative']['nominated representative']['postcode'];
        $telephonenumber['data']     = @$data['sections']['nominate-representative']['nominated representative']['nominee-number'];
        $emailaddress['data']        = @$data['sections']['nominate-representative']['nominated representative']['email-address'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $fullname['data'] = cleanTextData($_POST['/representative/representative-address/representative-name']);
    $address1['data'] = cleanTextData($_POST['/representative/representative-address/address-line-1']);
    $address2['data'] = cleanTextData($_POST['/representative/representative-address/address-line-2']);
    $town['data'] = cleanTextData($_POST['/representative/representative-address/town']);
    $county['data'] = cleanTextData($_POST['/representative/representative-address/county']);
    $country['data'] = cleanTextData($_POST['/representative/representative-address/country']);
    $postcode['data'] = cleanTextData($_POST['/representative/representative-address/postcode']);
    $telephonenumber['data'] = cleanTextData($_POST['/representative/representative-address/representative-number']);
    $emailaddress['data'] = cleanTextData($_POST['/representative/representative-address/representative-email-address']);



    if (empty($_POST['/representative/representative-address/representative-name'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-address/representative-name">Tell us your full name</a>';
        $fullname['error'] = 'govuk-form-group--error';
        $fullname['errorLabel'] =
        '<span id="/representative/representative-address/representative-name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your full name
         </span>';

    } else {
        $data['sections']['nominate-representative']['nominated representative']['fullname'] = cleanTextData($_POST['/representative/representative-address/representative-name']);
    }


    if (empty($_POST['/representative/representative-address/address-line-1'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-address/address-line-1">Tell us the first line of your address</a>';
        $address1['error'] = 'govuk-form-group--error';
        $address1['errorLabel'] =
        '<span id="/representative/representative-address/address-line-1-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us the first line of your address
         </span>';


    } else {
        $data['sections']['nominate-representative']['nominated representative']['address1'] = cleanTextData($_POST['/representative/representative-address/address-line-1']);
    }



    if (empty($_POST['/representative/representative-address/address-line-2'])) {

    } else {
        $data['sections']['nominate-representative']['nominated representative']['address2'] = cleanTextData($_POST['/representative/representative-address/address-line-2']);
    }



    if (empty($_POST['/representative/representative-address/town'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-address/town">Tell us your representative town</a>';
        $town['error'] = 'govuk-form-group--error';
        $town['errorLabel'] =
        '<span id="/representative/representative-address/town-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your representative town
         </span>';

    } else {
        $data['sections']['nominate-representative']['nominated representative']['town'] = cleanTextData($_POST['/representative/representative-address/town']);
    }



    if (empty($_POST['/representative/representative-address/county'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-address/county">Tell us your representative county</a>';
        $county['error'] = 'govuk-form-group--error';
        $county['errorLabel'] =
        '<span id="/representative/representative-address/county-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your representative county
         </span>';


    } else {
        $data['sections']['nominate-representative']['nominated representative']['county'] = cleanTextData($_POST['/representative/representative-address/county']);
    }



    if (empty($_POST['/representative/representative-address/country'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-address/country">Tell us your country</a>';
        $country['error'] = 'govuk-form-group--error';
        $country['errorLabel'] =
        '<span id="/representative/representative-address/country-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your country
         </span>';


    } else {
        $data['sections']['nominate-representative']['nominated representative']['country'] = cleanTextData($_POST['/representative/representative-address/country']);
    }


    if (empty($_POST['/representative/representative-address/postcode'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-address/postcode">Tell us your representative postcode</a>';
        $postcode['error'] = 'govuk-form-group--error';
        $postcode['errorLabel'] =
        '<span id="/representative/representative-address/postcode-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your representative postcode
         </span>';

    } else {
        $data['sections']['nominate-representative']['nominated representative']['postcode'] = cleanTextData($_POST['/representative/representative-address/postcode']);
    }



    if (empty($_POST['/representative/representative-address/representative-number'])) {

    } else {
        $data['sections']['nominate-representative']['nominated representative']['nominee-number'] = cleanTextData($_POST['/representative/representative-address/representative-number']);
    }

    if (empty($_POST['/representative/representative-address/representative-email-address'])) {

    } else {
        $data['sections']['nominate-representative']['nominated representative']['email-address'] = cleanTextData($_POST['/representative/representative-address/representative-email-address']);
    }




    if ($errors == 'Y') {

        $errorList = '';
        foreach ($errorsList as $error) {
            $errorList .=  '<li>'.$error.'</li>';
        }


        $errorMessage = '
         <div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
          <h2 class="govuk-error-summary__title" id="error-summary-title">
            There is a problem
          </h2>
          <div class="govuk-error-summary__body">
            <ul class="govuk-list govuk-error-summary__list">
            '.$errorList.'
            </ul>
          </div>
        </div>
        ';







    } else {

        //store our changes

        storeData($userID,$data);

        $theURL = '/applicant/nominate-a-representative-role';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

$page_title = 'Tell us about your representative';

@endphp




@include('framework.header')




    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

@php
echo $errorMessage;
@endphp
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Tell us about your representative </h1>
 </legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$fullname['error']}} ">
    <label class="govuk-label" for="/representative/representative-address/representative-name">
        Their full name (tell us their title, for example Mr, Mrs, Dr, if you want us to use it)
    </label>
    @php echo $fullname['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/representative/representative-address/representative-name" name="/representative/representative-address/representative-name" type="text"
         autocomplete="name"
                  value="{{$fullname['data']}}"
            >
</div>
                                    <div class="govuk-form-group {{$address1['error']}}">
    <label class="govuk-label" for="/representative/representative-address/address-line-1">
        Building and street         <span class="govuk-visually-hidden">line 1 of 2</span>
    </label>
    @php echo $address1['errorLabel']; @endphp
            <input
        class="govuk-input  "
        id="/representative/representative-address/address-line-1" name="/representative/representative-address/address-line-1" type="text"
         autocomplete="address-line1"
                  value="{{$address1['data']}}"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/representative/representative-address/address-line-2">
        <span class="govuk-visually-hidden">Building and street line 2 of 2</span>
    </label>
            <input
        class="govuk-input  "
        id="/representative/representative-address/address-line-2" name="/representative/representative-address/address-line-2" type="text"
         autocomplete="address-line2"
                  value="{{$address2['data']}}"
            >
</div>
                                    <div class="govuk-form-group {{$town['error']}} ">
    <label class="govuk-label" for="/representative/representative-address/town">
        Town or city
    </label>
@php echo $town['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/representative/representative-address/town" name="/representative/representative-address/town" type="text"
         autocomplete="address-level2"
                  value="{{$town['data']}}"
            >
</div>
                                    <div class="govuk-form-group {{$county['error']}}">
    <label class="govuk-label" for="/representative/representative-address/county">
        County (State or Province if overseas)
    </label>
@php echo $county['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/representative/representative-address/county" name="/representative/representative-address/county" type="text"
                   value="{{$county['data']}}"
            >
</div>
                                    <div class="govuk-form-group {{$country['error']}} ">
    <label class="govuk-label" for="/representative/representative-address/country">
        Country
    </label>
    @php echo $country['errorLabel']; @endphp
            <select class="govuk-select govuk-!-width-two-thirds " id="/representative/representative-address/country"
            name="/representative/representative-address/country"
            autocomplete="new-password">
@php if (!empty($country['data'])) {
echo '<option value="'.$country['data'].'" selected>'.$country['data'].'</option>';
} else {
    echo '<option value="">&nbsp;</option>';
}
@endphp

                    <option value="Abu Dhabi"
                     >Abu Dhabi</option>
                    <option value="Afghanistan"
                     >Afghanistan</option>
                    <option value="Ajman"
                     >Ajman</option>
                    <option value="Akrotiri"
                     >Akrotiri</option>
                    <option value="Albania"
                     >Albania</option>
                    <option value="Algeria"
                     >Algeria</option>
                    <option value="American Samoa"
                     >American Samoa</option>
                    <option value="Andorra"
                     >Andorra</option>
                    <option value="Angola"
                     >Angola</option>
                    <option value="Anguilla"
                     >Anguilla</option>
                    <option value="Antarctica"
                     >Antarctica</option>
                    <option value="Antigua and Barbuda"
                     >Antigua and Barbuda</option>
                    <option value="Argentina"
                     >Argentina</option>
                    <option value="Armenia"
                     >Armenia</option>
                    <option value="Aruba"
                     >Aruba</option>
                    <option value="Ascension"
                     >Ascension</option>
                    <option value="Australia"
                     >Australia</option>
                    <option value="Austria"
                     >Austria</option>
                    <option value="Azerbaijan"
                     >Azerbaijan</option>
                    <option value="Bahrain"
                     >Bahrain</option>
                    <option value="Baker Island"
                     >Baker Island</option>
                    <option value="Bangladesh"
                     >Bangladesh</option>
                    <option value="Barbados"
                     >Barbados</option>
                    <option value="Belarus"
                     >Belarus</option>
                    <option value="Belgium"
                     >Belgium</option>
                    <option value="Belize"
                     >Belize</option>
                    <option value="Benin"
                     >Benin</option>
                    <option value="Bermuda"
                     >Bermuda</option>
                    <option value="Bhutan"
                     >Bhutan</option>
                    <option value="Bolivia"
                     >Bolivia</option>
                    <option value="Bonaire"
                     >Bonaire</option>
                    <option value="Bosnia and Herzegovina"
                     >Bosnia and Herzegovina</option>
                    <option value="Botswana"
                     >Botswana</option>
                    <option value="Bouvet Island"
                     >Bouvet Island</option>
                    <option value="Brazil"
                     >Brazil</option>
                    <option value="British Antarctic Territory"
                     >British Antarctic Territory</option>
                    <option value="British Indian Ocean Territory"
                     >British Indian Ocean Territory</option>
                    <option value="British Virgin Islands"
                     >British Virgin Islands</option>
                    <option value="Brunei"
                     >Brunei</option>
                    <option value="Bulgaria"
                     >Bulgaria</option>
                    <option value="Burkina Faso"
                     >Burkina Faso</option>
                    <option value="Myanmar (Burma)"
                     >Myanmar (Burma)</option>
                    <option value="Burundi"
                     >Burundi</option>
                    <option value="Cambodia"
                     >Cambodia</option>
                    <option value="Cameroon"
                     >Cameroon</option>
                    <option value="Canada"
                     >Canada</option>
                    <option value="Cape Verde"
                     >Cape Verde</option>
                    <option value="Cayman Islands"
                     >Cayman Islands</option>
                    <option value="Central African Republic"
                     >Central African Republic</option>
                    <option value="Ceuta"
                     >Ceuta</option>
                    <option value="Chad"
                     >Chad</option>
                    <option value="Chile"
                     >Chile</option>
                    <option value="China"
                     >China</option>
                    <option value="Christmas Island"
                     >Christmas Island</option>
                    <option value="Cocos (Keeling) Islands"
                     >Cocos (Keeling) Islands</option>
                    <option value="Colombia"
                     >Colombia</option>
                    <option value="Comoros"
                     >Comoros</option>
                    <option value="Congo"
                     >Congo</option>
                    <option value="Congo (Democratic Republic)"
                     >Congo (Democratic Republic)</option>
                    <option value="Cook Islands"
                     >Cook Islands</option>
                    <option value="Costa Rica"
                     >Costa Rica</option>
                    <option value="Croatia"
                     >Croatia</option>
                    <option value="Cuba"
                     >Cuba</option>
                    <option value="Curaçao"
                     >Curaçao</option>
                    <option value="Cyprus"
                     >Cyprus</option>
                    <option value="Czechia"
                     >Czechia</option>
                    <option value="Czechoslovakia"
                     >Czechoslovakia</option>
                    <option value="Denmark"
                     >Denmark</option>
                    <option value="Dhekelia"
                     >Dhekelia</option>
                    <option value="Djibouti"
                     >Djibouti</option>
                    <option value="Dominica"
                     >Dominica</option>
                    <option value="Dominican Republic"
                     >Dominican Republic</option>
                    <option value="Dubai"
                     >Dubai</option>
                    <option value="East Germany"
                     >East Germany</option>
                    <option value="East Timor"
                     >East Timor</option>
                    <option value="Ecuador"
                     >Ecuador</option>
                    <option value="Egypt"
                     >Egypt</option>
                    <option value="El Salvador"
                     >El Salvador</option>
                    <option value="Equatorial Guinea"
                     >Equatorial Guinea</option>
                    <option value="Eritrea"
                     >Eritrea</option>
                    <option value="Estonia"
                     >Estonia</option>
                    <option value="Eswatini"
                     >Eswatini</option>
                    <option value="Ethiopia"
                     >Ethiopia</option>
                    <option value="Falkland Islands"
                     >Falkland Islands</option>
                    <option value="Faroe Islands"
                     >Faroe Islands</option>
                    <option value="Fiji"
                     >Fiji</option>
                    <option value="Finland"
                     >Finland</option>
                    <option value="France"
                     >France</option>
                    <option value="French Guiana"
                     >French Guiana</option>
                    <option value="French Polynesia"
                     >French Polynesia</option>
                    <option value="French Southern Territories"
                     >French Southern Territories</option>
                    <option value="Fujairah"
                     >Fujairah</option>
                    <option value="Gabon"
                     >Gabon</option>
                    <option value="Georgia"
                     >Georgia</option>
                    <option value="Germany"
                     >Germany</option>
                    <option value="Ghana"
                     >Ghana</option>
                    <option value="Gibraltar"
                     >Gibraltar</option>
                    <option value="Greece"
                     >Greece</option>
                    <option value="Greenland"
                     >Greenland</option>
                    <option value="Grenada"
                     >Grenada</option>
                    <option value="Guadeloupe"
                     >Guadeloupe</option>
                    <option value="Guam"
                     >Guam</option>
                    <option value="Guatemala"
                     >Guatemala</option>
                    <option value="Guernsey"
                     >Guernsey</option>
                    <option value="Guinea"
                     >Guinea</option>
                    <option value="Guinea-Bissau"
                     >Guinea-Bissau</option>
                    <option value="Guyana"
                     >Guyana</option>
                    <option value="Haiti"
                     >Haiti</option>
                    <option value="Heard Island and McDonald Islands"
                     >Heard Island and McDonald Islands</option>
                    <option value="Honduras"
                     >Honduras</option>
                    <option value="Hong Kong"
                     >Hong Kong</option>
                    <option value="Howland Island"
                     >Howland Island</option>
                    <option value="Hungary"
                     >Hungary</option>
                    <option value="Iceland"
                     >Iceland</option>
                    <option value="India"
                     >India</option>
                    <option value="Indonesia"
                     >Indonesia</option>
                    <option value="Iran"
                     >Iran</option>
                    <option value="Iraq"
                     >Iraq</option>
                    <option value="Ireland"
                     >Ireland</option>
                    <option value="Isle of Man"
                     >Isle of Man</option>
                    <option value="Israel"
                     >Israel</option>
                    <option value="Italy"
                     >Italy</option>
                    <option value="Ivory Coast"
                     >Ivory Coast</option>
                    <option value="Jamaica"
                     >Jamaica</option>
                    <option value="Japan"
                     >Japan</option>
                    <option value="Jarvis Island"
                     >Jarvis Island</option>
                    <option value="Jersey"
                     >Jersey</option>
                    <option value="Johnston Atoll"
                     >Johnston Atoll</option>
                    <option value="Jordan"
                     >Jordan</option>
                    <option value="Kazakhstan"
                     >Kazakhstan</option>
                    <option value="Kenya"
                     >Kenya</option>
                    <option value="Kingman Reef"
                     >Kingman Reef</option>
                    <option value="Kiribati"
                     >Kiribati</option>
                    <option value="Kosovo"
                     >Kosovo</option>
                    <option value="Kuwait"
                     >Kuwait</option>
                    <option value="Kyrgyzstan"
                     >Kyrgyzstan</option>
                    <option value="Laos"
                     >Laos</option>
                    <option value="Latvia"
                     >Latvia</option>
                    <option value="Lebanon"
                     >Lebanon</option>
                    <option value="Lesotho"
                     >Lesotho</option>
                    <option value="Liberia"
                     >Liberia</option>
                    <option value="Libya"
                     >Libya</option>
                    <option value="Liechtenstein"
                     >Liechtenstein</option>
                    <option value="Lithuania"
                     >Lithuania</option>
                    <option value="Luxembourg"
                     >Luxembourg</option>
                    <option value="Macao"
                     >Macao</option>
                    <option value="Madagascar"
                     >Madagascar</option>
                    <option value="Malawi"
                     >Malawi</option>
                    <option value="Malaysia"
                     >Malaysia</option>
                    <option value="Maldives"
                     >Maldives</option>
                    <option value="Mali"
                     >Mali</option>
                    <option value="Malta"
                     >Malta</option>
                    <option value="Marshall Islands"
                     >Marshall Islands</option>
                    <option value="Martinique"
                     >Martinique</option>
                    <option value="Mauritania"
                     >Mauritania</option>
                    <option value="Mauritius"
                     >Mauritius</option>
                    <option value="Mayotte"
                     >Mayotte</option>
                    <option value="Melilla"
                     >Melilla</option>
                    <option value="Mexico"
                     >Mexico</option>
                    <option value="Micronesia"
                     >Micronesia</option>
                    <option value="Midway Islands"
                     >Midway Islands</option>
                    <option value="Moldova"
                     >Moldova</option>
                    <option value="Monaco"
                     >Monaco</option>
                    <option value="Mongolia"
                     >Mongolia</option>
                    <option value="Montenegro"
                     >Montenegro</option>
                    <option value="Montserrat"
                     >Montserrat</option>
                    <option value="Morocco"
                     >Morocco</option>
                    <option value="Mozambique"
                     >Mozambique</option>
                    <option value="Namibia"
                     >Namibia</option>
                    <option value="Nauru"
                     >Nauru</option>
                    <option value="Navassa Island"
                     >Navassa Island</option>
                    <option value="Nepal"
                     >Nepal</option>
                    <option value="Netherlands"
                     >Netherlands</option>
                    <option value="New Caledonia"
                     >New Caledonia</option>
                    <option value="New Zealand"
                     >New Zealand</option>
                    <option value="Nicaragua"
                     >Nicaragua</option>
                    <option value="Niger"
                     >Niger</option>
                    <option value="Nigeria"
                     >Nigeria</option>
                    <option value="Niue"
                     >Niue</option>
                    <option value="Norfolk Island"
                     >Norfolk Island</option>
                    <option value="North Korea"
                     >North Korea</option>
                    <option value="North Macedonia"
                     >North Macedonia</option>
                    <option value="Northern Mariana Islands"
                     >Northern Mariana Islands</option>
                    <option value="Norway"
                     >Norway</option>
                    <option value="Occupied Palestinian Territories"
                     >Occupied Palestinian Territories</option>
                    <option value="Oman"
                     >Oman</option>
                    <option value="Pakistan"
                     >Pakistan</option>
                    <option value="Palau"
                     >Palau</option>
                    <option value="Palmyra Atoll"
                     >Palmyra Atoll</option>
                    <option value="Panama"
                     >Panama</option>
                    <option value="Papua New Guinea"
                     >Papua New Guinea</option>
                    <option value="Paraguay"
                     >Paraguay</option>
                    <option value="Peru"
                     >Peru</option>
                    <option value="Philippines"
                     >Philippines</option>
                    <option value="Pitcairn, Henderson, Ducie and Oeno Islands"
                     >Pitcairn, Henderson, Ducie and Oeno Islands</option>
                    <option value="Poland"
                     >Poland</option>
                    <option value="Portugal"
                     >Portugal</option>
                    <option value="Puerto Rico"
                     >Puerto Rico</option>
                    <option value="Qatar"
                     >Qatar</option>
                    <option value="Ras al-Khaimah"
                     >Ras al-Khaimah</option>
                    <option value="Romania"
                     >Romania</option>
                    <option value="Russia"
                     >Russia</option>
                    <option value="Rwanda"
                     >Rwanda</option>
                    <option value="Réunion"
                     >Réunion</option>
                    <option value="Saba"
                     >Saba</option>
                    <option value="Saint Barthélemy"
                     >Saint Barthélemy</option>
                    <option value="Saint Helena"
                     >Saint Helena</option>
                    <option value="Saint Pierre and Miquelon"
                     >Saint Pierre and Miquelon</option>
                    <option value="Saint-Martin (French part)"
                     >Saint-Martin (French part)</option>
                    <option value="Samoa"
                     >Samoa</option>
                    <option value="San Marino"
                     >San Marino</option>
                    <option value="Sao Tome and Principe"
                     >Sao Tome and Principe</option>
                    <option value="Saudi Arabia"
                     >Saudi Arabia</option>
                    <option value="Senegal"
                     >Senegal</option>
                    <option value="Serbia"
                     >Serbia</option>
                    <option value="Seychelles"
                     >Seychelles</option>
                    <option value="Sharjah"
                     >Sharjah</option>
                    <option value="Sierra Leone"
                     >Sierra Leone</option>
                    <option value="Singapore"
                     >Singapore</option>
                    <option value="Sint Eustatius"
                     >Sint Eustatius</option>
                    <option value="Sint Maarten (Dutch part)"
                     >Sint Maarten (Dutch part)</option>
                    <option value="Slovakia"
                     >Slovakia</option>
                    <option value="Slovenia"
                     >Slovenia</option>
                    <option value="Solomon Islands"
                     >Solomon Islands</option>
                    <option value="Somalia"
                     >Somalia</option>
                    <option value="South Africa"
                     >South Africa</option>
                    <option value="South Georgia and South Sandwich Islands"
                     >South Georgia and South Sandwich Islands</option>
                    <option value="South Korea"
                     >South Korea</option>
                    <option value="South Sudan"
                     >South Sudan</option>
                    <option value="Spain"
                     >Spain</option>
                    <option value="Sri Lanka"
                     >Sri Lanka</option>
                    <option value="St Kitts and Nevis"
                     >St Kitts and Nevis</option>
                    <option value="St Lucia"
                     >St Lucia</option>
                    <option value="St Vincent"
                     >St Vincent</option>
                    <option value="Sudan"
                     >Sudan</option>
                    <option value="Suriname"
                     >Suriname</option>
                    <option value="Svalbard and Jan Mayen"
                     >Svalbard and Jan Mayen</option>
                    <option value="Sweden"
                     >Sweden</option>
                    <option value="Switzerland"
                     >Switzerland</option>
                    <option value="Syria"
                     >Syria</option>
                    <option value="Taiwan"
                     >Taiwan</option>
                    <option value="Tajikistan"
                     >Tajikistan</option>
                    <option value="Tanzania"
                     >Tanzania</option>
                    <option value="Thailand"
                     >Thailand</option>
                    <option value="The Bahamas"
                     >The Bahamas</option>
                    <option value="The Gambia"
                     >The Gambia</option>
                    <option value="Togo"
                     >Togo</option>
                    <option value="Tokelau"
                     >Tokelau</option>
                    <option value="Tonga"
                     >Tonga</option>
                    <option value="Trinidad and Tobago"
                     >Trinidad and Tobago</option>
                    <option value="Tristan da Cunha"
                     >Tristan da Cunha</option>
                    <option value="Tunisia"
                     >Tunisia</option>
                    <option value="Turkey"
                     >Turkey</option>
                    <option value="Turkmenistan"
                     >Turkmenistan</option>
                    <option value="Turks and Caicos Islands"
                     >Turks and Caicos Islands</option>
                    <option value="Tuvalu"
                     >Tuvalu</option>
                    <option value="USSR"
                     >USSR</option>
                    <option value="Uganda"
                     >Uganda</option>
                    <option value="Ukraine"
                     >Ukraine</option>
                    <option value="Umm al-Quwain"
                     >Umm al-Quwain</option>
                    <option value="United Arab Emirates"
                     >United Arab Emirates</option>
                    <option value="United Kingdom"
                     >United Kingdom</option>
                    <option value="United States"
                     >United States</option>
                    <option value="United States Virgin Islands"
                     >United States Virgin Islands</option>
                    <option value="Uruguay"
                     >Uruguay</option>
                    <option value="Uzbekistan"
                     >Uzbekistan</option>
                    <option value="Vanuatu"
                     >Vanuatu</option>
                    <option value="Vatican City"
                     >Vatican City</option>
                    <option value="Venezuela"
                     >Venezuela</option>
                    <option value="Vietnam"
                     >Vietnam</option>
                    <option value="Wake Island"
                     >Wake Island</option>
                    <option value="Wallis and Futuna"
                     >Wallis and Futuna</option>
                    <option value="Western Sahara"
                     >Western Sahara</option>
                    <option value="Yemen"
                     >Yemen</option>
                    <option value="Yugoslavia"
                     >Yugoslavia</option>
                    <option value="Zambia"
                     >Zambia</option>
                    <option value="Zimbabwe"
                     >Zimbabwe</option>
                    <option value="Åland Islands"
                     >Åland Islands</option>
            </select>
</div>


                                    <div class="govuk-form-group {{$postcode['error']}} ">
    <label class="govuk-label" for="/representative/representative-address/postcode">
        Postcode
    </label>
@php echo $postcode['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/representative/representative-address/postcode" name="/representative/representative-address/postcode" type="text"
         autocomplete="postal-code"
                  value="{{$postcode['data']}}"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/representative/representative-address/representative-number">
        Telephone number
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/representative/representative-address/representative-number" name="/representative/representative-address/representative-number" type="tel"
         autocomplete="tel"
           inputmode="numeric" pattern="[0-9]*"
                value="{{$telephonenumber['data']}}"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/representative/representative-address/representative-email-address">
        Email address
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/representative/representative-address/representative-email-address" name="/representative/representative-address/representative-email-address" type="email"
         autocomplete="email"
                  value="{{$emailaddress['data']}}"
            >
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>








@include('framework.footer')
