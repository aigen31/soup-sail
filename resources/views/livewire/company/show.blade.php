<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Company') }}
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {{-- @if (Laravel\Fortify\Features::canUpdateProfileInformation()) --}}
        @livewire('company.update-company-information-form')

        <x-section-border />
        {{-- @endif --}}
    </div>
</div>