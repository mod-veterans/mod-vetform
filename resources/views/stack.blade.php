<x-layout :view="$view">
    <x-slot name="title">{{ $view->title }}</x-slot>

    <x-slot name="body">
        @php
            $stackButtonRendered = false;
        @endphp
        @if($view->preTask && !$view->stack)
            @if(is_array($view->preTask))
                @foreach($view->preTask as $preTask)
                    @switch($preTask['type'])

                        @case('title')
                        <h2>{{ $preTask['content'] }}</h2>
                        @break

                        @case('inset')
                        <div class="govuk-inset-text">{{ $preTask['content'] }}</div>
                        @break

                        @case('list')
                        <ul class="govuk-list govuk-list--bullet">
                            @foreach($preTask['content'] as $item)
                                <li>{!! $item !!}</li>
                            @endforeach
                        </ul>
                        @break

                        @case('address')
                        <address class="govuk-address govuk-!-font-size-19 govuk-!-margin-bottom-4">
                            @foreach($preTask['content'] as $item)
                                {!! $item !!}<br>
                            @endforeach
                        </address>
                        @break

                        @default
                        @if(is_array($preTask['content']))
                           {{ dd($preTask['content']) }}
                        @else
                            <p class="govuk-body">
                                @switch($preTask['content'])
                                    @case('__stackButton__')
                                        @php
                                            $stackButtonRendered = true;
                                        @endphp
                                        <a class="govuk-button govuk-!-margin-bottom-2" href="{{ route('add.stack', ['stack' => $view->namespace ]) }}">
                                            {{ $view->addStackLabel ??  'Add to stack' }}
                                        </a>
                                    @break

                                    @case('__continueButton__')
                                        <a class="govuk-link govuk-!-margin-bottom-2" href="/stack/skip/?stack={{ $view->namespace }}">
                                            {{ $view->continueLabel ??  'Continue without uploading a document' }}
                                        </a>
                                    @break

                                    @default
                                        {{ $preTask['content'] }}
                                    @endswitch
                            </p>
                        @endif
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
                                    {{ $view->renderMnemonic($stack, $loop->index + 1) }}
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

        @if(!$stackButtonRendered)
        <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="{{ route('add.stack', ['stack' =>  $view->namespace ]) }}">
                {{ $view->addStackLabel ??  'Add to stack' }}
            </a>
            <br>
            <a class="govuk-link" href="{{route('home')}}">Return to Task List</a>
        </div>
        @endif

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
