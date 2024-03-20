<div class="w-full lg:w-3/5 h-full px-3 text-right flex">
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex-row ml-9">
            <ul class="flex flex-row w-full">
                <li class="w-2/12 text-center text-sm">ID</li>
                <li class="w-2/12 text-center text-sm">Date</li>
                <li class="w-2/12 text-center text-sm">Mode</li>
                <li class="w-2/12 text-center text-sm">Status</li>
                <li class="w-2/12 text-center text-sm">Total&nbsp;(₱)</li>
            </ul>
        </div>
        <hr class="my-1">

        {{-- Order List  --}}
        <div class="w-full h-full px-3 overflow-y-auto" id="questions-container">
            <table class="w-full">
    <tbody>
        @if ($transactionList)
            @foreach ($transactionList as $transaction)
            <tr class="w-full">
                <td class="block lg:hidden w-full sm:w-4/5 md:w-3/5">
                    @if ($selectedOrder && $selectedOrder == $transaction->id)
                        <livewire:main.user.livewire.user-orders-detail class="my-2"
                            orderId="{{ $transaction->id }}" wire:key="{{ $transaction->id }}" />
                    @endif
                </td>
                <td class="w-full flex justify-center select-none px-2" id="transactionRowLi-{{ $transaction->id }}">
                    <input class="widenWhenSelected" hidden type="radio" id="productId{{ $transaction->id }}"
                        name="productList" onchange="toggleListRow({{ $transaction->id }})">
                    <label wire:click="showDetails({{ $transaction->id }})"
                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm items-center"
                        for="productId{{ $transaction->id }}">
                        <table class="w-full">
                            <tr class="flex flex-row w-full text-xs md:text-sm">
                                <td class="w-2/12 text-center">{{ $transaction->id }}</td>
                                <td class="w-2/12 text-center">{{ $transaction->created_at->format('m-d-Y') }}</td>
                                <td class="w-3/12 text-center">{{ $transaction->preferredService }}</td>
                                <td class="w-2/12 text-center">{{ $transaction->status }}</td>
                                <td class="w-2/12 text-center">{{ number_format($transaction->grandTotal, 2) }}</td>
                            </tr>
                        </table>
                    </label>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

        </div>
        <div class="flex flex-row items-center mt-4">
            <div class="w-full text-center font-montserrat">
                {{ $transactionList->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function toggleListRow(id) {
        let listRowInput = document.getElementById('productId' + id);
        let listRow = document.getElementById('transactionRowLi' + id);

        listRow.style.display = (listRowInput.checked) ? "none" : "flex";
    }
</script>
