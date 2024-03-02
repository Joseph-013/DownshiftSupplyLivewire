<table class="border w-full">
    <thead class="border">
        <tr class="border">
            <th class="border p-2">Transaction Id</th>
            <th class="border p-2">Customer Name</th>
            <th class="border p-2">Type</th>
            <th class="border p-2">Total</th>
            <th class="border p-2">Date</th>
        </tr>
    </thead>
    <tbody>

        <!-- Repeat this block for each row -->
        @if ($transactions)
            @foreach ($transactions as $transaction)
                <tr class="border">
                    <td class="border p-2">{{ $transaction->id }}</td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
            @endforeach
        @endif

    </tbody>
</table>
