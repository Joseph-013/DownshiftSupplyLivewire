<div class="w-3/5 h-full px-3 text-right flex">
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
            <ul class=" w-full flex flex-col items-center">


                @if ($transactionList)
                    @foreach ($transactionList as $transaction)
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- transaction Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId{{ $transaction->id }}"
                                name="productList">
                            <label wire:click="showDetails({{ $transaction->id }})"
                                class="w-11/12 py-2 my-1 rounded-full btransaction-2 btransaction-gray shadow-sm text-sm flex items-center"
                                for="productId{{ $transaction->id }}">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">{{ $transaction->id }}</li>
                                    <li class="w-2/12 text-center text-sm">
                                        {{ $transaction->purchaseDate->format('Y-m-d') }}
                                    </li>
                                    <li class="w-3/12 text-center text-sm">
                                        {{ $transaction->preferredService }}
                                    <li class="w-2/12 text-center text-sm">{{ $transaction->status }}</li>
                                    <li class="w-2/12 text-center text-sm">
                                        {{ number_format($transaction->grandTotal, 2) }}
                                    </li>
                                </ul>
                            </label>
                        </li>
                    @endforeach
                @endif


            </ul>

        </div>

    </div>
    {{-- Products --}}
</div>
