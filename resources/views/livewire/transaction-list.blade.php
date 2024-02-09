<div class="w-full h-96 overflow-y-auto mb-5" id="transactions-container">
    <ul class=" w-full flex flex-col items-center">
        @foreach ($transactions as $transaction)
        {{-- Single Unit of Product --}}
        <li class="w-full flex justify-center select-none px-2">
            {{-- Product Details --}}
            <input class="widenWhenSelected" hidden type="radio" id="productId1"
                name="productList">
            <label
                    class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                    for="productId1">
                <ul class="flex flex-row w-full">
                    <li class="w-2/12 text-center text-sm">{{ $transaction->id }}</li>
                    <li class="w-2/12 text-center text-sm">{{ $transaction->purchaseDate }}</li>
                    <li class="w-3/12 text-center text-sm">{{ $transaction->firstName }}  {{ $transaction->lastName}}</li>
                    <li class="w-3/12 text-center text-sm">{{ $transaction->grandTotal }}</li>
                </ul>
            </label>
        </li>
        @endforeach
    </ul>
</div>