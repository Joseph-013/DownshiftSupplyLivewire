<div class="w-full h-96 overflow-y-auto" id="questions-container">
    <ul class="w-full flex flex-col items-center">
        @if ($products)
            @foreach ($products as $product)
                {{-- Single Unit of Product --}}
                <li wire:click="selectProduct({{ $product->id }})" class="w-full flex justify-center select-none px-2">
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
                            <li class="w-7/12 text-center text-sm">{{ $product->name }}</li>
                            <li class="w-2/12 text-center text-sm">{{ $product->stockquantity }}</li>
                            <li class="w-3/12 text-center text-sm">₱&nbsp;{{ number_format($product->price, 2) }}</li>
                        </ul>
                    </label>
                </li>
            @endforeach
        @endif

    </ul>
</div>
