@include('framework.functions')
@php


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if ( (empty($data['sections']['about-you']['ninumber'])) || (empty($data['sections']['about-you']['name']['lastname'])) ) {
    //we don't have what we need. but they are required. so we shuldn't be here.
    header("Location: /");
    die();
}



$ninumber = md5(simplify($data['sections']['about-you']['ninumber']));
$surname = md5(simplify($data['sections']['about-you']['name']['lastname']));


$dobData = mktime(0,0,0, $data['sections']['about-you']['dob']['month'],$data['sections']['about-you']['dob']['day'],$data['sections']['about-you']['dob']['year']);


$email = md5(simplify($dobData));







$db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");
pg_query($db, "UPDATE modvetdevusertable SET emailhash = '$email', surnamehash = '$surname', nihash = '$ninumber' WHERE userid = '$userID'");



//save that they have hit this page
$data['settings']['sacbl'] = 'Y';
storeData($userID,$data);




if (!empty($_POST)) {

header("Location: /applicant/about-you/check-answers");
die();

}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">'Save and come back later' is now available to you</h1>
                                <p class="govuk-body">Your answers are now being saved as you answer each question</p>
                                <p class="govuk-body">You can now come back later to a part-completed application if you want to.</p>
                        <p class="govuk-body">To take a break, use the ‘Save and come back later’ button now available at the bottom of each page.</p>

<p class="govuk-body">You can also return to your saved application should your computer or device close unexpectedly.
</p>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    Your part completed application will only be available for three months. After then, you’ll have to start again.
  </strong>
</div>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    There’s a <a href="https://www.gov.uk/guidance/armed-forces-compensation-scheme-afcs#who-is-eligible" target="_New">7 year time limit</a> (from date of injury/illness) for making some claims.  Complete your application as soon as you can.
  </strong>
</div>







                        <h2 class="govuk-heading-m">Coming back to a saved application</h2>
                        <p class="govuk-body">To come back to a saved application, you’ll need your:</p>
                        <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
                            <li>Surname</li>
                            <li>Date of birth</li>
                            <li>National Insurance Number</li>
                        </ul>
                        <p class="govuk-body">You’ll also need access to either the mobile phone or email account matching the details you have just entered. This is so we can send you a text message and email with a code to enter on screen.</p>


            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group ">
    <input name="afcs/about-you/personal-details/save-and-return/save-and-return" type="hidden" value="1">
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
