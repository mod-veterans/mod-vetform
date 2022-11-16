@include('framework.functions')
@include('framework.header')
@include('framework.backbutton')





    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
<?php

$routes = array_map(function (\Illuminate\Routing\Route $route)     {

    return $route->uri;     }, (array) Route::getRoutes()->getIterator());

$count = 0;
foreach ($routes as $route) {
$count++;
if ($count > 14) {
    echo '<a href="/'.$route.'">'.$route.'</a><br />';
}
}


?>
            </div>
        </div>
    </main>
</div>

@include('framework.footer')
