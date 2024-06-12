<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Order #') . $this->item->id }} "{{ $this->service->name }}"
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-form-section submit="addTask">
            <x-slot name="title">
                {{ __('Create Task') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Describe Your Task') }}
            </x-slot>

            <x-slot name="form">

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="project" value="{{ __('Your Project') }}" />
                    <x-select id="project" wire:model="projectId">
                        @if (count($this->projects) !== 0)
                            @foreach ($this->projects as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>Projects is doesn't found</option>
                        @endif
                    </x-select>

                    @if (count($this->projects) === 0)
                        <x-a-button class="mt-5" href="{{ route('create-project') }}">
                            Create Project
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </x-a-button>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-counter-input field="name">
                        <x-slot name="title">
                            Task Name
                        </x-slot>
                    </x-counter-input>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-counter-textarea field="description">
                        <x-slot name="title">
                            Task Description
                        </x-slot>
                    </x-counter-textarea>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    @error('balance-error')
                        <p class="text-sm text-red-600">
                            {{ $message }}. <a class="underline" href="{{ route('wallet') }}">Make deposit</a>
                        </p>
                    @enderror
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-action-message class="me-3" on="task-added">
                    {{ __('Success!') }}
                </x-action-message>

                <x-button>
                    {{ __('Order') }}
                </x-button>
            </x-slot>
        </x-form-section>

        <x-section-border />
    </div>
</div>
