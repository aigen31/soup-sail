<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __( 'Service "' ) . $this->service->name . '"' }}
	</h2>
</x-slot>

<div>
	<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
			<p class="text-base">
        {{ $this->service->description }}
      </p>

			<p class="text-base">
        Price: {{ $this->service->price }}
      </p>

      <x-button class="mt-12" wire:click="makeOrder">
        Order
      </x-button>

			<x-section-border />
	</div>
</div>