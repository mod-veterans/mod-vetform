@include('framework.functions')
@include('framework.header')
@include('framework.backbutton')





    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
$allRoutes = Route::getRoutes();
var_dump($allRoutes);
@endphp

            </div>
        </div>
    </main>
</div>

@include('framework.footer')
