<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Transactions') }}
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-sort-table sort="Date, Amount" headers="Transaction Type, Transaction Amount, Created At">
            @if (count($this->transactions) !== 0)
                @foreach ($this->transactions as $item)
                    <tr>
                        <td class="px-5 py-3">
                            {{ $item->type }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $item->amount }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $item->created_at }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="px-5 py-3" colspan="5">
                        <p>Here is't' transactions</p>
                    </td>
                </tr>
            @endif

            <x-slot name="after">
                @if (count($this->transactions) !== 0)
                    <div class="mt-5">
                        {{ $this->transactions->links() }}
                    </div>
                @endif
            </x-slot>
        </x-sort-table>
        <x-section-border />
    </div>
</div>
