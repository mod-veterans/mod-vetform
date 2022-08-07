

@php
$cookiechoice = '';
$message = '';
$fromPage = '';

session_start();

if  (!empty($_SERVER['HTTP_REFERER']) ) {
    //don't set yourself
    if (strpos($_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_URI'], 0) == TRUE) {
        //do nothing
    } else {
        $_SESSION['fromPage'] = $_SERVER['HTTP_REFERER'];
    }



}


if (!empty($_SESSION['fromPage'])) {
    $fromPage = $_SESSION['fromPage'];
}



if (!empty($_COOKIE['vet-COOKIE'])) {
    if ($_COOKIE['vet-COOKIE'] == 'Y') {
        $cookiechoice = 'Y';
    }
}


if (!empty($_POST['cookies-analytics'])) {


    if ($_POST['cookies-analytics'] == 'Y') {
       setcookie('vet-COOKIE', 'Y', time() + (86400 * 30 * 365), '/');
       setcookie('vet-GA', 'Y', time() + (86400 * 30 * 365), '/');
       $cookiechoice = 'Y';
       $showcookie = 'N';

    }

    if ($_POST['cookies-analytics'] == 'N') {
       setcookie('vet-COOKIE', 'N', time() + (86400 * 30 * 365), '/');
       $cookiechoice = 'N';
       $showcookie = 'N';
    }




    $message = '

    <div class="govuk-notification-banner govuk-notification-banner--success" role="alert" aria-labelledby="govuk-notification-banner-title" data-module="govuk-notification-banner">
  <div class="govuk-notification-banner__header">
    <h2 class="govuk-notification-banner__title" id="govuk-notification-banner-title">
      Success
    </h2>
  </div>
  <div class="govuk-notification-banner__content">
    <p class="govuk-notification-banner__heading">
      You’ve set your cookie preferences. <a class="govuk-notification-banner__link" href="'.$fromPage.'">Go back to the page you were looking at</a>.
    </p>
  </div>
</div>

    ';


}


$cookiechk['N'] = 'checked';
$cookiechk['Y'] = '';
if ($cookiechoice == 'Y') {
    $cookiechk['N'] = '';
    $cookiechk['Y'] = 'checked';
}
@endphp



@include('framework.header')
@include('framework.backbutton')


<div class="govuk-grid-row">
  <div class="govuk-grid-column-two-thirds">


@php echo $message; @endphp


    <h1 class="heading-large">Cookies</h1>
    <p class="govuk-body">
        Cookies are small files saved on your phone, tablet or computer when you visit a website.
    </p>
    <p class="govuk-body">We use cookies to make AFCS work and collect information about how you use our service.</p>

    <h2 class="heading-medium" id="essential-cookies">Essential cookies</h2>
    <p class="govuk-body">
      Essential cookies keep your information secure while you use AFCS. We do not need to ask permission to use them.
    </p>

    <style>

    table {
        border-collapse: collapse;
        font-size: 18px;
    }

    tr { border-bottom: 1px solid lightgrey;}
    td {padding: 5px;text-align: left;}

    </style>

    <table>
        <caption class="govuk-visually-hidden">Essential cookies</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Purpose</th>
                <th>Expires</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                  __VCAP_ID__
                </td>
                <td width="30%">
                  Used to keep track of your progress and answers
                </td>
                <td>
                  When you close your browser window
                </td>
            </tr>
            <tr>
                <td>
                  JSESSIONID
                </td>
                <td width="30%">
                  Used to keep track of your progress and answers
                </td>
                <td>
                  When you close your browser window
                </td>
            </tr>
            <tr>
                <td>
                  mod_veterans_session
                </td>
                <td width="40%">
                  Used to keep track of your progress and answers
                </td>
                <td>
                  When you close your browser window
                </td>
            </tr>
            <tr>
                <td>
                  vet-COOKIE
                </td>
                <td >
                  Used to keep track if you have accepted our cookie policy
                </td>
                <td>
                  1 year
                </td>
            </tr>
            <tr>
                <td>
                  vet-GA
                </td>
                <td >
                  Used to keep track if you have accepted analytical cookies
                </td>
                <td>
                  1 year
                </td>
            </tr>
            <tr>
                <td>
                  XSRF-TOKEN
                </td>
                <td >
                  Used to keep track of your progress and answers
                </td>
                <td>
                    2 hours
                </td>
            </tr>

        </tbody>
    </table>

    <h2 class="heading-medium" id="analytics-cookies">Analytics cookies (optional)</h2>
    <p class="govuk-body">
      With your permission, we use Google Analytics to collect data about how you use AFCS. This information helps us to improve our service.
    </p>
    <p class="govuk-body">
      Google is not allowed to use or share our analytics data with anyone.
    </p>
    <p class="govuk-body">
      Google Analytics stores anonymised information about:
    </p>
    <ul class="govuk-list govuk-list--bullet">
      <li>how you got to AFCS</li>
      <li>the pages you visit on AFCS and how long you spend on them</li>
      <li>any errors you see while using AFCS</li>
    </ul>
    <table>
        <caption class="govuk-visually-hidden">Google Analytics cookies</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Purpose</th>
                <th>Expires</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="20%">
                  _ga
                </td>
                <td width="70%" >
                  Checks if you’ve visited AFCS before. This helps us count how many people visit our site.
                </td>
                <td width="10%">
                  2 years
                </td>
            </tr>
            <tr>
                <td>
                  _gid
                </td>
                <td >
                  Checks if you’ve visited AFCS before. This helps us count how many people visit our site.
                </td>
                <td>
                  24 hours
                </td>
            </tr>
        </tbody>
    </table>

    <div class="cookie-settings__form-wrapper">
      <form data-module="cookie-settings" method="POST">
      @csrf
        <div class="govuk-form-group govuk-!-margin-top-6">
          <fieldset class="govuk-fieldset" aria-describedby="changed-name-hint">
            <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
              Do you want to accept analytics cookies?
            </legend>
            <div class="govuk-radios govuk-radios--inline">
              <div class="govuk-radios__item">
                <input class="govuk-radios__input" id="cookies-analytics-yes" name="cookies-analytics" type="radio" value="Y" {{$cookiechk['Y'] ?? ''}}>
                <label class="govuk-label govuk-radios__label" for="cookies-analytics-yes">
                  Yes
                </label>
              </div>
              <div class="govuk-radios__item">
                <input class="govuk-radios__input" id="cookies-analytics-no" name="cookies-analytics" type="radio" value="N" {{$cookiechk['N'] ?? ''}}>
                <label class="govuk-label govuk-radios__label" for="cookies-analytics-no">
                  No
                </label>
              </div>
            </div>
          </fieldset>
        </div>
        <button class="govuk-button" type="submit">Save cookie settings</button>
      </form>
    </div>
  </div>
</div>
</div>




@include('framework.footer')
