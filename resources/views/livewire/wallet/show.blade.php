<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Balance') }}
	</h2>
</x-slot>

<div>
	<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
			@livewire('wallet.balance')

			<x-section-border />
	</div>
</div>