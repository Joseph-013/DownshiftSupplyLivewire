<div>
    <div class="w-full h-96 overflow-y-auto" id="questions-container">
        <ul class="w-full flex flex-col items-center">
            @if ($products)
                @foreach ($products as $product)
                    {{-- Single Unit of Product --}}
                    <li wire:key="{{ $product->id }}" wire:click="selectProduct({{ $product->id }})"
                        class="w-full flex justify-center select-none px-2">
                        {{-- Product Details --}}
                        <input class="widenWhenSelected" hidden type="radio" id="productId{{ $product->id }}"
                            name="productList">
                        <label
                            class="
                @if ($product->stockquantity <= 0) {{ 'bg-gray-400 ' }}
                @elseif ($product->stockquantity <= $product->criticallevel) {{ 'bg-red-400 ' }} @endif
                w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center {{ $product->stockquantity <= $product->criticallevel ? 'text-white' : '' }}"
                            for="productId{{ $product->id }}">
                            <ul class="flex flex-row w-full">
                                <li class="w-1/12 pl-3 -mr-2 text-left text-sm">{{ $product->id }}</li>
                                <li class="w-7/12 px-3 text-left text-sm">{{ $product->name }}</li>
                                <li class="w-1/12 pl-6 text-center text-sm">{{ $product->stockquantity }}</li>
                                <li class="w-3/12 text-center text-sm">₱&nbsp;{{ number_format($product->price, 2) }}
                                </li>
                            </ul>
                        </label>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>

    <div class="flex flex-row items-center mt-4">
        <div class="w-1/2 text-center">
            <div class="flex justify-between items-center w-full h-full px-3">
                <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $products->url(1) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-skip-backward" viewBox="0 0 16 16">
                        <path
                            d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m7 1.133L1.696 8 7.5 11.367zm7.5 0L9.196 8 15 11.367z" />
                    </svg>
                </a>
                <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $products->previousPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-skip-start" viewBox="0 0 16 16">
                        <path
                            d="M4 4a.5.5 0 0 1 1 0v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L5 8.752V12a.5.5 0 0 1-1 0zm7.5.633L5.696 8l5.804 3.367z" />
                    </svg>
                </a>
                <div
                    class="text-sm bg-slate-300 py-2 px-3 w-12 rounded-full flex justify-center cursor-default select-none">
                    {{ $products->currentPage() . '/' . $products->lastPage() }}
                </div>
                <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $products->nextPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-skip-end" viewBox="0 0 16 16">
                        <path
                            d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0zM5 4.633 10.804 8 5 11.367z" />
                    </svg>
                </a>
                <a class="hover:bg-slate-300 py-1 px-2 rounded-full"
                    href="{{ $products->url($products->lastPage()) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-skip-forward" viewBox="0 0 16 16">
                        <path
                            d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.752l-6.267 3.636c-.52.302-1.233-.043-1.233-.696v-2.94l-6.267 3.636C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696L7.5 7.248v-2.94c0-.653.713-.998 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5M1 4.633v6.734L6.804 8zm7.5 0v6.734L14.304 8z" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="w-1/2 flex justify-center"><button type="submit"
                class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing mb-2">
                Create Item
                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path
                        d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                    <path
                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                </svg>
            </button>
        </div>

        <!-- OVERLAY -->
        <!-- <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">

            <div class="absolute inset-0 bg-black opacity-50"></div>


            <div class="bg-gray-100 p-6 rounded-lg relative z-10 border">
                create product component here
            </div>
        </div> -->
        <!-- END OF OVERLAY -->

    </div>
</div>
