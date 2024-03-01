<div class="w-full h-full">
    {{-- Left Main Container --}}
    <div class=" p-1">
        <div class="w-full h-96 overflow-y-auto flex-row" id="questions-container">
            <div class="w-full text-left text-sm px-3 font-semibold">
                Particulars
            </div>

            <div class="px-3">
                <ul class="w-full flex flex-col items-center">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row px-5">
                            <ul class="flex flex-row w-full mt-3">
                                <li class="w-4/12 text-center text-xs font-semibold">Item</li>
                                <li class="w-3/12 text-center text-xs font-semibold">Unit Price (₱)</li>
                                <li class="w-2/12 text-center text-xs font-semibold">Quantity</li>
                                <li class="w-3/12 text-center text-xs font-semibold">Subtotal (₱)</li>
                            </ul>
                        </div>
                        <hr class="my-1">


                        @foreach ($cartItems as $item)
    <div class="w-full flex-row my-1 select-none flex justify-center">
        {{-- <input class="widenWhenSelectedEdit" hidden type="radio" id="productId1" name="productList"> --}}
        <label class="w-full py-2 my-1 px-3 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId1">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center w-4/12">
                    <img src="{{ $item->product->image }}" class="w-12 h-12 mr-2 rounded" alt="Product Image">
                    <span class="truncate">{{ $item->product->name }}</span>
                </div>
                <div class="w-3/12 text-center">{{ number_format($item->product->price, 2) }}</div>
                <div class="w-2/12 text-center">{{ $item->quantity }}</div>
                <div class="w-3/12 text-center">{{ number_format($item->quantity * $item->product->price, 2) }}</div>
            </div>
        </label>
    </div>
@endforeach



                        {{-- <div class="w-full flex-row px-5 my-2">
                            <ul class="flex flex-row w-full">
                                <li class="w-full text-right text-xs mr-5">
                                    <span class="font-semibold mr-5">Shipping Fee:&nbsp;</span>
                                    <span class="italic">{{ 'TBD' }}</span>
                                </li>
                            </ul>
                        </div> --}}

                    </div>
                </ul>
            </div>

        </div>
        <hr class="my-1">
        <div class="w-full text-right text-xs ml-[-5rem] my-2">
            <span class="font-semibold mr-5">Total: </span> ₱&nbsp;{{ number_format($cartTotal, 2) }}
        </div>
    </div>
</div>
