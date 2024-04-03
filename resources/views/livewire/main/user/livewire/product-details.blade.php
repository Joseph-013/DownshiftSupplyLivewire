<div class="">
    @isset($product)
        <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
            <!-- Semi-transparent overlay -->
            <div class="absolute inset-0 bg-black opacity-50 w-full h-full" wire:click="hideDetails"></div>

            <!-- Product details card -->
            <div class="bg-gray-100 p-6 rounded-lg relative z-50 border flex flex-col items-center justify-start w-full max-w-md mx-7 overflow-y-auto"
                style="height: 37rem;">
                <div class="w-full flex justify-end py-2 mb-2">
                    <button wire:click="hideDetails">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray"
                            class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                        </svg>
                    </button>
                </div>
                <div class="mb-2">
                    <img class="rounded-md object-cover"
                        src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/assets/' . $product->image) }}"
                        alt="{{ $product->name }}" style="max-height: 200px;">
                </div>
                <table class="w-full border-spacing-x-2">
                    <tr class="h-14">
                        <th colspan="2" class="text-center font-semibold">Product Details</th>
                    </tr>
                    <tr class="h-9">
                        <td class="w-1/3 text-left text-gray-500 flex h-full">Name:</td>
                        <td class="w-2/3 text-left">
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr class="h-9">
                        <td class="w-1/3 text-left text-gray-500 flex h-full">Price:</td>
                        <td class="w-2/3 text-left">
                            ₱ {{ $product->price }}
                        </td>
                    </tr>
                    <tr class="h-9">
                        <td class="w-1/3 text-left text-gray-500 flex h-full">Description:</td>
                        <td class="w-2/3 text-left">
                            {{ $product->description }}
                        </td>
                    </tr>
                    <tr class="h-9">
                        <td class="w-1/3 text-left text-gray-500 flex h-full">Stock:</td>
                        <td class="w-2/3 text-left">
                            {{ $product->stockquantity == 0 ? 'Out of Stock' : $product->stockquantity }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endisset
</div>
