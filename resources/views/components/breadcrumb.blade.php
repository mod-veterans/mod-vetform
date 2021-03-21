@props([
    'crumbs' => []
])
<div class="govuk-breadcrumbs">
    <ol class="govuk-breadcrumbs__list">
        <li class="govuk-breadcrumbs__list-item">
            <a class="govuk-breadcrumbs__link" href="{{ route('home') }}">Summary</a>
        </li>
        @foreach($crumbs ?? [] as $url => $crumb)
        <li class="govuk-breadcrumbs__list-item">
            <a class="govuk-breadcrumbs__link" href="{{ $url }}">{{ $crumb }}</a>
        </li>
        @endforeach
    </ol>
</div>
