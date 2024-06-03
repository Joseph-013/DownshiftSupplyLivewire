<div class="w-full h-full">
    {{-- Left Main Container --}}
    <div class=" p-1 ">
        <div class="w-full h-96 overflow-y-auto flex-row" id="questions-container">
            <div class="w-full text-left text-sm px-3 font-semibold">
                Particulars
            </div>

            <div class="px-3">
                <ul class="w-full flex flex-col items-center">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row">
                            <ul class="flex flex-row w-full mt-3">
                                <li class="w-5/12 text-center sm:text-xs text-xxs font-semibold">Item</li>
                                <li class="w-3/12 text-center sm:text-xs text-xxs font-semibold">Unit Price (₱)</li>
                                <li class="w-1/12 text-center sm:text-xs text-xxs font-semibold">Qty</li>
                                <li class="w-3/12 text-center sm:text-xs text-xxs font-semibold">Subtotal (₱)</li>
                            </ul>
                        </div>
                        <hr class="my-1">


                        <table class="w-full">
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr class="w-full my-1 select-none flex justify-center">
                                        {{-- <td><input class="widenWhenSelectedEdit" hidden type="radio" id="productId1" name="productList"></td> --}}
                                        <td class="w-full py-2 my-1 px-3 rounded-full border-2 border-gray shadow-sm sm:text-sm text-xxs flex items-center"
                                            for="productId1">
                                            <div class="flex items-center justify-between w-full">
                                                <div class="flex items-center w-5/12">
                                                    @if($item->product_images)
                                                        @if($item->product_images->isNotEmpty())
                                                        <img src="{{ filter_var($item->product_images->first()->image, FILTER_VALIDATE_URL) ? $item->product_images->first()->image : asset('storage/assets/' . $item->product_images->first()->image) }}"
                                                        class="sm:w-12 sm:h-12 w-8 h-8 mr-2 rounded" alt="Product Image">
                                                        @endif
                                                    @endif
                                                    <div class=" line-clamp-2">
                                                        {{ $item->product->name }}
                                                    </div>
                                                </div>
                                                <div class="w-3/12 text-center">
                                                    {{ number_format($item->product->price, 2) }}</div>
                                                <div class="w-1/12 text-center">{{ $item->quantity }}</div>
                                                <div class="w-3/12 text-center">
                                                    {{ number_format($item->quantity * $item->product->price, 2) }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </ul>
            </div>

        </div>
        <hr class="my-1">
        <div class="w-full text-right text-md ml-[-5rem] my-2">
            <span class="font-semibold mr-5">Total: </span> ₱&nbsp;{{ number_format($cartTotal, 2) }}
        </div>
    </div>
    <style>
        @media (max-width: 600px) {
            .text-xxs {
                font-size: 0.5rem;
            }
        }
    </style>
</div>
