
@include('framework.header')
@include('framework.backbutton')

<div class="govuk-grid-row">
  <div class="govuk-grid-column-two-thirds">

<!--
    <div class="cookie-settings__confirmation banner banner-with-tick" data-cookie-confirmation="true" role="group" tabindex="-1">
      <h2 class="banner-title">Your cookie settings were saved</h2>
      <a class="govuk_link cookie-settings__prev-page govuk-!-margin-top-1" href="#" data-module="track-click" data-track-category="cookieSettings" data-track-action="Back to previous page">
        Go back to the page you were looking at
      </a>
    </div>
-->

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
      <form data-module="cookie-settings">
        <div class="govuk-form-group govuk-!-margin-top-6">
          <fieldset class="govuk-fieldset" aria-describedby="changed-name-hint">
            <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
              Do you want to accept analytics cookies?
            </legend>
            <div class="govuk-radios govuk-radios--inline">
              <div class="govuk-radios__item">
                <input class="govuk-radios__input" id="cookies-analytics-yes" name="cookies-analytics" type="radio" value="on">
                <label class="govuk-label govuk-radios__label" for="cookies-analytics-yes">
                  Yes
                </label>
              </div>
              <div class="govuk-radios__item">
                <input class="govuk-radios__input" id="cookies-analytics-no" name="cookies-analytics" type="radio" value="off">
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
