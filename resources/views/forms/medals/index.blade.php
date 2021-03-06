<x-layout>
    <x-slot name="title">
        Apply for a well-earned medal
    </x-slot>
    <x-slot name="body">
        <h2 class="govuk-heading-s govuk-!-margin-bottom-2">Application incomplete</h2>
        <p class="govuk-body govuk-!-margin-bottom-7">You have completed {{ groups_task_complete_count() }}
            of {{ group_task_count() }} sections.</p>
        <ol class="app-task-list">
            @foreach(groups() as $group)
                <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">{{ $loop->index + 1 }}. </span>
                        {{ $group }}
                    </h2>
                    <ul class="app-task-list__items">
                        @foreach($group->tasks as $task)
                            <li class="app-task-list__item">
                                <span class="app-task-list__task-name">
                                    @if($task->status !== \App\Services\Forms\BaseTask::STATUS_CANNOT_START)
                                        <a href="/{{ $group->getId() }}/{{ $task->getId() }}" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        {{ $task }}
                                    </a>
                                    @else
                                        {{ $task }}
                                    @endif
                                </span>
                                <x-status-tag status="{{ $task->status }}" field="{{ $task->getId() }}"></x-status-tag>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ol>
    </x-slot>
    <x-submit-form>Start</x-submit-form>
</x-layout>
