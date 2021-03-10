<x-layout>
    <x-slot name="title">
        Apply for the Armed Forces Compensation Scheme
    </x-slot>

    <x-slot name="body">
        <h2 class="govuk-heading-s govuk-!-margin-bottom-2">Application incomplete</h2>
        <p class="govuk-body govuk-!-margin-bottom-7">You have completed 4 of 8 sections.</p>
        <ol class="app-task-list">
            @foreach(groups() as $group)
                <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">{{ $loop->index + 1 }}. </span>
                        {{ $group }}
                    </h2>
                    <ul class="app-task-list__items">
                        @foreach($group->tasks() as $task)
                            <li class="app-task-list__item">
                            <span class="app-task-list__task-name">
                                <a href="/{{ $group->getId() }}/{{ $task->getId() }}" class="govuk-link"
                                   aria-describedby="eligibility-status">
                                    {{ $task }}
                                </a>
                            </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag"
                                        id="{{ $task->getId() }}-status">
                                    Not started</strong>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ol>
    </x-slot>

    <x-submit-form>Start</x-submit-form>
</x-layout>
