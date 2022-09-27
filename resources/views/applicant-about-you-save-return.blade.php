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

$page_title = 'You can now save your application and come back later';

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">You can now save your application and come back later</h1>
                                <p class="govuk-body">Your answers are now being saved as you answer each question.</p>
                                <p class="govuk-body">You can now come back later to a part-completed application if you want to.</p>
                        <p class="govuk-body">To take a break, use the ‘save and come back later’ button now available at the bottom of the page.</p>

<p class="govuk-body">You can also return to your application if your computer or device closes unexpectedly.
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
    There’s a <a href="https://www.gov.uk/guidance/armed-forces-compensation-scheme-afcs#who-is-eligible" target="_New">7 year time limit</a> (opens in new tab) from date of injury or illness for making some claims. Complete your application as soon as you can.
  </strong>
</div>







                        <h2 class="govuk-heading-m">Coming back to a saved application</h2>
                        <p class="govuk-body">To come back to a saved application, you’ll need these details from the information you’ve just entered:</p>
<dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">Surname</dt>
                <dd class="govuk-summary-list__value">
                    {{$data['sections']['about-you']['name']['lastname'] ?? '' }}
                </dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">Date of birth</dt>
                <dd class="govuk-summary-list__value">
                    {{$data['sections']['about-you']['dob']['day']}} / {{$data['sections']['about-you']['dob']['month']}} / {{$data['sections']['about-you']['dob']['year']}}
                </dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">National Insurance Number</dt>
                <dd class="govuk-summary-list__value">
                    {{$data['sections']['about-you']['ninumber'] ?? '' }}
                </dd>
            </div>

    </dl>
    <p class="govuk-body">If you need to make any changes to these details, you can do that on the next page.</p>
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
