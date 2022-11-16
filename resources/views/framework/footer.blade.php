
<footer class="govuk-footer " role="contentinfo">
    <div class="govuk-width-container ">
        <div class="govuk-footer__meta">
            <div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
                <h2 class="govuk-visually-hidden">Support links</h2>
                <ul class="govuk-footer__inline-list">
                    <li class="govuk-footer__inline-list-item">
                        <a class="govuk-footer__link" href="/cookie-policy">
                            Cookies
                        </a>
                    </li>
                    <li class="govuk-footer__inline-list-item">
                        <a class="govuk-footer__link" href="/feedback">
                            Feedback
                        </a>
                    </li>
                    <li class="govuk-footer__inline-list-item">
                        <a class="govuk-footer__link" href="https://www.gov.uk/government/publications/ministry-of-defence-privacy-notice/mod-privacy-notice" target="_New">
                            Privacy
                        </a>
                    </li>
                    <li class="govuk-footer__inline-list-item">
                        <a class="govuk-footer__link" href="/accessibility-statement">
                            Accessibility Statement
                        </a>
                    </li>
                </ul>

                <svg aria-hidden="true" focusable="false" class="govuk-footer__licence-logo"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 483.2 195.7" height="17" width="41">
                    <path fill="currentColor"
                          d="M421.5 142.8V.1l-50.7 32.3v161.1h112.4v-50.7zm-122.3-9.6A47.12 47.12 0 0 1 221 97.8c0-26 21.1-47.1 47.1-47.1 16.7 0 31.4 8.7 39.7 21.8l42.7-27.2A97.63 97.63 0 0 0 268.1 0c-36.5 0-68.3 20.1-85.1 49.7A98 98 0 0 0 97.8 0C43.9 0 0 43.9 0 97.8s43.9 97.8 97.8 97.8c36.5 0 68.3-20.1 85.1-49.7a97.76 97.76 0 0 0 149.6 25.4l19.4 22.2h3v-87.8h-80l24.3 27.5zM97.8 145c-26 0-47.1-21.1-47.1-47.1s21.1-47.1 47.1-47.1 47.2 21 47.2 47S123.8 145 97.8 145"/>
                </svg>
                <span class="govuk-footer__licence-description">
            All content is available under the
            <a class="govuk-footer__link"
               href="https://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/" rel="license">Open Government Licence v3.0</a>, except where otherwise stated
          </span>
            </div>
            <div class="govuk-footer__meta-item">
                <a class="govuk-footer__link govuk-footer__copyright-logo"
                   href="https://www.nationalarchives.gov.uk/information-management/re-using-public-sector-information/uk-government-licensing-framework/crown-copyright/">©
                    Crown copyright</a>
            </div>
        </div>
    </div>
</footer>

@php

$appstage = getenv('APP_STAGE');
if (empty($appstage)) {
    $appstage = 'UAT';
}


//if ($appstage == 'PROD') {
@endphp

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K4C9DZ7');</script>
<!-- End Google Tag Manager -->

@php
//}
@endphp

@php
if (!empty($footerScripts)) {
    foreach($footerScripts as $footerScript) {
        echo $footerScript;
    }
}
@endphp


@php

if (!empty($_COOKIE['vet-GA'])) {



//if ($appstage == 'PROD') {
@endphp

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JKZ35PF27Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-JKZ35PF27Q');
        gtag('config', 'UA-189988947-3');
    </script>



@php
    //}
echo '<!--GA cookies allowed subject to URL-->';
}
@endphp

</body>
</html>
