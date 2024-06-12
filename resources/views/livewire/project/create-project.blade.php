<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Projects') }}
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-form-section submit="createProject">
            <x-slot name="title">
                {{ __('Create Project') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Create Your New Project') }}
            </x-slot>

            <x-slot name="form">
                <x-counter-input field="name">
                    <x-slot name="title">
                        Name of The Project
                    </x-slot>
                </x-counter-input>

                <x-counter-textarea field="description">
                    <x-slot name="title">
                        Description
                    </x-slot>
                </x-counter-textarea>
            </x-slot>

            <x-slot name="actions">
                <x-action-message class="me-3" on="project-created">
                    <span>{{ __('Success.') }}</span> <a class="text-green-500"
                        href="{{ route('project', $this->projectId) }}">Open Project Page</a>
                </x-action-message>

                <x-button>
                    {{ __('Create') }}
                </x-button>
            </x-slot>
        </x-form-section>

        <x-section-border />
    </div>
</div>
