<div class="w-full h-96 overflow-y-auto mb-5" id="transactions-container">
    <ul class=" w-full flex flex-col items-center">
        @foreach ($transactions as $transaction)
            @if ($transaction->purchaseType === 'Onsite')
                {{-- Single Unit of Product --}}
                @if ($selectedTransactionId && $transaction->id == $selectedTransactionId)
                    <livewire:onsite-transaction-details wire:key="{{ $transaction->id }}"
                        transId="{{ $transaction->id }}" />
                @endif
                <li wire:key="{{ $transaction->id }}" wire:click="selectTransaction({{ $transaction->id }})"
                    class="w-full flex justify-center select-none px-2">
                    {{-- Product Details --}}

                    <input class="widenWhenSelected" hidden type="radio" id="transactionId{{ $transaction->id }}"
                        name="productList">
                    <label
                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                        for="transactionId{{ $transaction->id }}">
                        <ul class="flex flex-row w-full">
                            <li class="w-3/12 text-center text-sm">{{ $transaction->id }}</li>
                            <li class="w-3/12 text-center text-sm">{{ $transaction->purchaseDate }}</li>
                            <li class="w-3/12 text-center text-sm">{{ $transaction->firstName }}
                                {{ $transaction->lastName }}</li>
                            <li class="w-3/12 text-center text-sm">₱ {{ number_format($transaction->grandTotal, 2) }}
                            </li>
                        </ul>
                    </label>
                </li>
            @endif
        @endforeach
    </ul>
</div>
