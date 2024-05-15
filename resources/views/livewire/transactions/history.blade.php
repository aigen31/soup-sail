<div class="bg-white shadow rounded-lg p-5">
    <table class="w-full">
        <thead>
            <tr>
                <th class="px-5 py-3 text-left">
                    Transaction Type
                </th>
                <th class="px-5 py-3 text-left">
                    Transaction Amount
                </th>
                <th class="px-5 py-3 text-left">
                    Created At
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach (Auth::user()->transactions as $transaction)
                <tr>
                    <td class="px-5 py-3">
                        {{ $transaction->type }}
                    </td>
                    <td class="px-5 py-3">
                        {{ $transaction->amount }}
                    </td>
                    <td class="px-5 py-3">
                        {{ $transaction->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
