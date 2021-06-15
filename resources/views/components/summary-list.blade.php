@props([
'rows' => [],
])

<dl class="govuk-summary-list govuk-!-margin-bottom-9">
    @foreach($rows as $row)
        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">{{ $row['label'] }}</dt>
            <dd class="govuk-summary-list__value">
                @if(is_array($row['value']))
                    @foreach($row['value'] as $value)
                        {{ $value }}<br>
                    @endforeach
                @else
                    {{ $row['value'] }}
                @endif
            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="{{ $row['route'] }}">Change<span
                        class="govuk-visually-hidden"> {{ $row['change'] ?? '' }}</span></a>
            </dd>
        </div>
    @endforeach
</dl>
