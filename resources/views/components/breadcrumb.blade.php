@props([
    'breadcrumbs' => []
])
@if($breadcrumbs)
<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
        <li class="govuk-breadcrumbs__list-item">
            <a class="govuk-breadcrumbs__link" href="{{ route('home') }}">Home</a>
        </li>
        @foreach($breadcrumbs ?? [] as $breadcrumb)
        <li class="govuk-breadcrumbs__list-item">
            <a class="govuk-breadcrumbs__link" href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
        </li>
        @endforeach
    </ol>
</div>
@endif
