<div class="w-full h-96 overflow-y-auto mb-5" id="orders-container">
    <ul class=" w-full flex flex-col items-center">
        @foreach ($transactions as $transaction)
        @if($transaction->purchaseType === "Online")
        <li wire:click="selectTransaction({{ $transaction->id }})" class="w-full flex justify-center select-none px-2">
            {{-- Product Details --}}
            <input @if($transaction->id) class="widenWhenSelected" @endif hidden type="radio" id="transactionId{{ $transaction->id }}" name="productList">
            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="transactionId{{ $transaction->id }}">
                <ul class="flex flex-row w-full">
                    <li class="w-2/12 text-center text-xs">{{ $transaction->id }}</li>
                    <li class="w-2/12 text-center text-xs">{{ $transaction->purchaseDate }}</li>
                    <li class="w-3/12 text-center text-xs">{{ $transaction->firstName }}  {{ $transaction->lastName}}</li>
                    <li class="w-2/12 text-center text-xs">{{ $transaction->status }}</li>
                    <li class="w-3/12 text-center text-xs">{{ $transaction->grandTotal }}</li>
                </ul>
            </label>
        </li>
        @endif
        @endforeach
    </ul>
</div>
