@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/non-pt/date");
        die();

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Which Medical Practitioner gave you the diagnosis (if known)?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner">
        Name of the Medical Practitioner (if known)
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner" type="text"
                   value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-1">
        Building and street         <span class="govuk-visually-hidden">line 1 of 2</span>
    </label>
            <input
        class="govuk-input  "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-1" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-1" type="text"
         autocomplete="address-line1"
                  value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2">
        <span class="govuk-visually-hidden">Building and street line 2 of 2</span>
    </label>
            <input
        class="govuk-input  "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2" type="text"
         autocomplete="address-line2"
                  value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__town">
        Town or city
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__town" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__town" type="text"
         autocomplete="address-level2"
                  value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__county">
        County
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__county" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__county" type="text"
                   value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__country">
        Country
    </label>
            <select class="govuk-select govuk-!-width-two-thirds " id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__country"
            name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__country"
            aria-describedby=" "
            autocomplete="new-password">
        <option></option>
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


                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__postcode">
        Postcode
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__postcode" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__postcode" type="text"
         autocomplete="postal-code"
                  value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number">
        Telephone number
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number" type="tel"
         autocomplete="tel"
           inputmode="numeric" pattern="[0-9]*"
                value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-email">
        Email address
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-email" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-email" type="email"
         autocomplete="email"
                  value=""
            >
</div>



                <div class="govuk-form-group">
    <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="/cancel" class="govuk-link"
           data-module="govuk-button">
            Cancel application
        </a>

    </div>
            </form>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
