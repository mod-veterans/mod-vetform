<x-layout>
    <x-slot name="title">{{ $view->title }}</x-slot>

    <x-slot name="body">
        @if($view->preTask)
            @if(is_array($view->preTask))
                @foreach($view->preTask as $preTask)
                    @switch($preTask['type'])
                        @case('inset')
                        <div class="govuk-inset-text">{{ $preTask['content'] }}</div>
                        @break

                        @default
                        <p class="govuk-body">{{ $preTask['content'] }}</p>
                    @endswitch
                @endforeach
            @else
                <p class="govuk-body">{{ $view->preTask }}</p>
            @endif
        @endif

        @if($view->stack)
            <dl class="govuk-summary-list">
                @foreach($view->stack as $stackID => $stack)
                    <div class="govuk-summary-list__row">
                        <dt class="govuk-summary-list__value">
                            @if(is_array($stack))
                                @if($view->mnemonic)
                                    {{ current($stack)[$view->mnemonic] }}
                                @else
                                    Item {{ $loop->index + 1 }}
                                @endif
                            @else
                                {{ $stack }}
                            @endif
                        </dt>
                        <dd class="govuk-summary-list__actions">
                            <a class="govuk-link govuk-warning govuk-!-margin-right-5"
                               href="{{ route('drop.stack', ['stack'=>$view->namespace, 'id'=>$stackID]) }}">Delete<span
                                    class="govuk-visually-hidden"> name</span>
                            </a>

                            <a class="govuk-link"
                               href="{{ route('load.form', ['group' => group_for_task($view)->getId(), 'task' => $view->getId(), 'stack' => $stackID ]) }}">
                                Change<span class="govuk-visually-hidden"> name</span>
                            </a>
                        </dd>
                    </div>
                @endforeach
            </dl>
        @endif

        <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="{{ route('add.stack', ['stack' =>  $view->namespace ]) }}">
                {{ $view->addStackLabel ??  'Add to stack' }}
            </a>
        </div>

        @if($view->postTask)
            @if(is_array($view->postTask))
                @foreach($view->postTask as $postTask)
                    <p class="govuk-body">{{ $postTask }}</p>
                @endforeach
            @else
                <p class="govuk-body">{{ $view->postTask }}</p>
            @endif
        @endif

    </x-slot>
</x-layout>
