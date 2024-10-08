<div class="">
    @isset($product)
        <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
            <!-- Semi-transparent overlay -->
            <div class="absolute inset-0 bg-black opacity-50 w-full h-full" wire:click="hideDetails"></div>

            <!-- Product details card -->
            <div class="bg-gray-100 p-6 rounded-lg relative z-50 border flex flex-col items-center justify-start w-full max-w-md lg:max-w-[55rem] mx-7 overflow-y-auto"
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
                @if ($productImages)
                    <div id="detailsCarousel"
                        class="carousel slide d-flex justify-content-center align-items-center w-[350px]"
                        data-ride="carousel">
                        <div class="carousel-inner h-60 rounded-md">
                            @foreach ($productImages as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="rounded-md object-cover mx-auto max-h-60 max-w-[350px]"
                                        src="{{ filter_var($image->image, FILTER_VALIDATE_URL) ? $image->image : asset('storage/assets/' . $image->image) }}"
                                        alt="Product Image {{ $key + 1 }}">
                                </div>
                            @endforeach
                        </div>
                        @if (count($productImages) != 1)
                            <button
                                class="carousel-control-prev my-auto h-12 bg-black rounded-full flex justify-center items-center"
                                onclick="prevSlideDet()" type="button">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button
                                class="carousel-control-next my-auto h-12 bg-black rounded-full flex justify-center items-center"
                                onclick="nextSlideDet()" type="button">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        @endif
                    </div>
                @endif
                <table class="w-full border-spacing-x-2">
                    <tr class="h-14">
                        <th colspan="2" class="text-center font-semibold">Product Details</th>
                    </tr>
                    <tr class="mb-10 h-9">
                        <td class="w-3/12 text-left text-gray-500 flex h-full">Name:</td>
                        <td class="w-9/12 text-left">
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr class="mb-10 h-9">
                        <td class="text-left text-gray-500 flex h-full">Price:</td>
                        <td class="text-left">
                            ₱ {{ $product->price }}
                        </td>
                    </tr>
                    <tr class="mb-10 h-9">
                        <td class="text-left text-gray-500 flex h-full">Category:</td>
                        <td class="text-left italic">
                            {{ $productCategory }}
                        </td>
                    </tr>
                    <tr class="mb-10 h-9">
                        <td class="text-left text-gray-500 flex h-full">Description:</td>
                        <td class="text-left leading-7">
                            {!! nl2br(html_entity_decode(e($product->description))) !!}
                        </td>
                    </tr>
                    <tr class="mb-10 h-9">
                        <td class="text-left text-gray-500 flex h-full">Stock:</td>
                        <td class="text-left">
                            {{ $product->stockquantity == 0 ? 'Out of Stock' : $product->stockquantity }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endisset
</div>
