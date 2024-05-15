<div>
    <x-form-section submit="deposit">
        <x-slot name="title">Fill deposit</x-slot>
        <x-slot name="description">Fill your wallet</x-slot>

        <x-slot name="form">
            <p>Balance: {{ $this->user->balanceInt }}</p>
        </x-slot>

        <x-slot name="actions">
            <x-button>
                Накрутить денег
            </x-button>
        </x-slot>
    </x-form-section>
</div>
