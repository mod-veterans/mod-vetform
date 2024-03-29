@php

if (empty($showcookie)) {
$showcookie = 'Y';
}


if (empty($page_title)) {
    $page_title = 'Apply for Armed Forces Compensation or a War Pension';
}


if (!empty($_COOKIE['vet-COOKIE'])) {
    $showcookie = 'N';
}

$errorTitle = '';
if ( (!empty($errorMessage)) ) {
    $errorTitle = 'Error: ';
}




@endphp
<!DOCTYPE html>
<html lang="en" class="govuk-template">

<head>
    <meta charset="utf-8">
    <title>{{$errorTitle}}{{$page_title}} - Apply for Armed Forces Compensation or a War Pension - GOV.UK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0b0c0c">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php if (!empty($headMeta)) {
    echo $headMeta;
}
?>
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" sizes="16x16 32x32 48x48" href="/favicon.ico" type="image/x-icon">
    <link rel="mask-icon" href="/images/govuk-mask-icon.svg" color="#0b0c0c">
    <link rel="apple-touch-icon" sizes="180x180" href="h/images/govuk-apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/images/govuk-apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/govuk-apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" href="/images/govuk-apple-touch-icon.png">
    <!--[if !IE 8]><!-->
    <link href="/css/all.css" rel="stylesheet">
<link href="/css/location-autocomplete.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/govuk.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <!--<![endif]-->

    <!--[if IE 8]>
    <link href="/css/all-ie8.css" rel="stylesheet">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="/html5-shiv/html5shiv.js"></script>
    <![endif]-->


    <meta property="og:image" content="/images/govuk-opengraph-image.png">
</head>

<body class="govuk-template__body">


@php


$appstage = getenv('APP_STAGE');
if (empty($appstage)) {
    $appstage = 'PROD';
}


if ($appstage == 'PROD') {
@endphp

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src=https://www.googletagmanager.com/ns.html?id=GTM-K4C9DZ7
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@php
} else {
@endphp


<!--header GTM would be here GTM-K4C9DZ7-->


@php
}
@endphp



<script>
    document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');
</script>

@php
if ($showcookie == 'Y') {
@endphp
<div class="govuk-cookie-banner " data-nosnippet role="region" aria-label="Cookies on [name of service]">
  <div class="govuk-cookie-banner__message govuk-width-container">

    <div class="govuk-grid-row">
      <div class="govuk-grid-column-two-thirds">
        <h2 class="govuk-cookie-banner__heading govuk-heading-m">Cookies on Armed Forces Compensation or a War Pension Application</h2>

        <div class="govuk-cookie-banner__content">
          <p class="govuk-body">We use some essential cookies to make this service work.</p>
          <p class="govuk-body">We’d also like to use analytics cookies so we can understand how you use the service and make improvements.</p>
        </div>
      </div>
    </div>

    <form method="POST" enctype="multipart/form-data" novalidate action="/cookie-process">
    @csrf
    <div class="govuk-button-group">
      <button value="Y" type="submit" name="cookies" class="govuk-button" data-module="govuk-button">
        Accept analytics cookies
      </button>
      <button value="N" type="submit" name="cookies" class="govuk-button" data-module="govuk-button">
        Reject analytics cookies
      </button>
      <a class="govuk-link" href="/cookie-policy">View cookies</a>
    </div>
    <input type="hidden" name="refURL" value="<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" />
    </form>
  </div>
</div>
@php
}
@endphp

<a href="#main-content" class="govuk-skip-link">Skip to main content</a>

<header class="govuk-header " role="banner" data-module="govuk-header">
    <div class="govuk-header__container govuk-width-container">
        <div class="govuk-header__logo">
            <a href="https://www.gov.uk/" class="govuk-header__link govuk-header__link--homepage">
                <span class="govuk-header__logotype">
                    <svg aria-hidden="true" focusable="false" class="govuk-header__logotype-crown"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 132 97" height="30" width="36">
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M25 30.2c3.5 1.5 7.7-.2 9.1-3.7 1.5-3.6-.2-7.8-3.9-9.2-3.6-1.4-7.6.3-9.1 3.9-1.4 3.5.3 7.5 3.9 9zM9 39.5c3.6 1.5 7.8-.2 9.2-3.7 1.5-3.6-.2-7.8-3.9-9.1-3.6-1.5-7.6.2-9.1 3.8-1.4 3.5.3 7.5 3.8 9zM4.4 57.2c3.5 1.5 7.7-.2 9.1-3.8 1.5-3.6-.2-7.7-3.9-9.1-3.5-1.5-7.6.3-9.1 3.8-1.4 3.5.3 7.6 3.9 9.1zm38.3-21.4c3.5 1.5 7.7-.2 9.1-3.8 1.5-3.6-.2-7.7-3.9-9.1-3.6-1.5-7.6.3-9.1 3.8-1.3 3.6.4 7.7 3.9 9.1zm64.4-5.6c-3.6 1.5-7.8-.2-9.1-3.7-1.5-3.6.2-7.8 3.8-9.2 3.6-1.4 7.7.3 9.2 3.9 1.3 3.5-.4 7.5-3.9 9zm15.9 9.3c-3.6 1.5-7.7-.2-9.1-3.7-1.5-3.6.2-7.8 3.7-9.1 3.6-1.5 7.7.2 9.2 3.8 1.5 3.5-.3 7.5-3.8 9zm4.7 17.7c-3.6 1.5-7.8-.2-9.2-3.8-1.5-3.6.2-7.7 3.9-9.1 3.6-1.5 7.7.3 9.2 3.8 1.3 3.5-.4 7.6-3.9 9.1zM89.3 35.8c-3.6 1.5-7.8-.2-9.2-3.8-1.4-3.6.2-7.7 3.9-9.1 3.6-1.5 7.7.3 9.2 3.8 1.4 3.6-.3 7.7-3.9 9.1zM69.7 17.7l8.9 4.7V9.3l-8.9 2.8c-.2-.3-.5-.6-.9-.9L72.4 0H59.6l3.5 11.2c-.3.3-.6.5-.9.9l-8.8-2.8v13.1l8.8-4.7c.3.3.6.7.9.9l-5 15.4v.1c-.2.8-.4 1.6-.4 2.4 0 4.1 3.1 7.5 7 8.1h.2c.3 0 .7.1 1 .1.4 0 .7 0 1-.1h.2c4-.6 7.1-4.1 7.1-8.1 0-.8-.1-1.7-.4-2.4V34l-5.1-15.4c.4-.2.7-.6 1-.9zM66 92.8c16.9 0 32.8 1.1 47.1 3.2 4-16.9 8.9-26.7 14-33.5l-9.6-3.4c1 4.9 1.1 7.2 0 10.2-1.5-1.4-3-4.3-4.2-8.7L108.6 76c2.8-2 5-3.2 7.5-3.3-4.4 9.4-10 11.9-13.6 11.2-4.3-.8-6.3-4.6-5.6-7.9 1-4.7 5.7-5.9 8-.5 4.3-8.7-3-11.4-7.6-8.8 7.1-7.2 7.9-13.5 2.1-21.1-8 6.1-8.1 12.3-4.5 20.8-4.7-5.4-12.1-2.5-9.5 6.2 3.4-5.2 7.9-2 7.2 3.1-.6 4.3-6.4 7.8-13.5 7.2-10.3-.9-10.9-8-11.2-13.8 2.5-.5 7.1 1.8 11 7.3L80.2 60c-4.1 4.4-8 5.3-12.3 5.4 1.4-4.4 8-11.6 8-11.6H55.5s6.4 7.2 7.9 11.6c-4.2-.1-8-1-12.3-5.4l1.4 16.4c3.9-5.5 8.5-7.7 10.9-7.3-.3 5.8-.9 12.8-11.1 13.8-7.2.6-12.9-2.9-13.5-7.2-.7-5 3.8-8.3 7.1-3.1 2.7-8.7-4.6-11.6-9.4-6.2 3.7-8.5 3.6-14.7-4.6-20.8-5.8 7.6-5 13.9 2.2 21.1-4.7-2.6-11.9.1-7.7 8.8 2.3-5.5 7.1-4.2 8.1.5.7 3.3-1.3 7.1-5.7 7.9-3.5.7-9-1.8-13.5-11.2 2.5.1 4.7 1.3 7.5 3.3l-4.7-15.4c-1.2 4.4-2.7 7.2-4.3 8.7-1.1-3-.9-5.3 0-10.2l-9.5 3.4c5 6.9 9.9 16.7 14 33.5 14.8-2.1 30.8-3.2 47.7-3.2z"></path>
                            <image src="/assets/images/govuk-logotype-crown.png" xlink:href=""
                                   class="govuk-header__logotype-crown-fallback-image" width="36" height="32"></image>
                    </svg>
                    <span class="govuk-header__logotype-text">GOV.UK</span>
                </span>
            </a>
        </div>
        <div class="govuk-header__content">
            <a href="/" class="govuk-header__link govuk-header__link--service-name">Apply for Armed Forces Compensation or a War Pension</a>
        </div>
    </div>
</header>
@include('framework.betabar')
