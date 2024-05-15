<x-form-section submit="updateCompanyInformation">
    <x-slot name="title">
        {{ __('Company Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your companie\'s profile information.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="inn" value="{{ __('INN of Company') }}" />
            <x-input id="inn" type="text" wire:model="inn" class="mt-1 block w-full"
                value="{{ $this->company->inn }}" />
            <x-input-error for="inn" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input disabled id="name" type="text" wire:model="name" class="mt-1 block w-full"
                value="{{ $this->company->name }}" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="category" value="{{ __('Bussiness Category') }}" />
            {{-- <x-select disabled id="category" wire:model="category">
                @foreach ($this->categories as $category)
                    @if ($this->company->category->id === $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </x-select> --}}
            <x-input disabled id="category" type="text" wire:model="category" class="mt-1 block w-full"
                value="{{ $this->company->category }}" />
            <x-input-error for="category" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="body" value="{{ __('Bussiness Body') }}" />
            {{-- <x-select disabled id="body" wire:model="body">
                @foreach ($this->bodies as $body)
                    @if ($this->company->body->id === $body->id)
                        <option value="{{ $body->id }}" selected>{{ $body->name }}</option>
                    @else
                        <option value="{{ $body->id }}">{{ $body->name }}</option>
                    @endif
                @endforeach
            </x-select> --}}
						<x-input disabled id="body" type="text" wire:model="body" class="mt-1 block w-full"
                value="{{ $this->company->body }}" />
            <x-input-error for="body" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="site_url" value="{{ __('Site URL') }}" />
            <x-input id="site_url" type="text" wire:model="site_url" class="mt-1 block w-full"
                value="{{ $this->company->site_url }}" />
            <x-input-error for="site_url" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
