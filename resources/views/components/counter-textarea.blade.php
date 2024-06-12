@props(['field', 'value' => ''])

<div class="col-span-6 sm:col-span-4" x-data="{
    counter: 0,
    handleCounter($event) {
        this.counter = $wire.rules.{{ $field }}.maxlength - $event.target.value.length
    },
    init() {
        $wire.{{ $field }} ? this.counter = $wire.rules.{{ $field }}.maxlength - $wire.{{ $field }}.length : this.counter = $wire.rules.{{ $field }}.maxlength
    }
}">
    <x-label for="{{ $field }}" value="{{ $title }}" />

    <textarea
        {{ $attributes->merge([
            'id' => $field,
            'maxlength' => $this->rules[$field]['maxlength'],
            'wire:model' => $field,
            'x-on:input' => 'handleCounter($event)',
            'class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
        ]) }}>{{ $value }}</textarea>

    <x-input-error for="{{ $field }}" class="mt-2" />

    <p class="text-sm text-gray-500 mt-3">
        <span x-text="counter"></span> symbols left
    </p>
</div>
