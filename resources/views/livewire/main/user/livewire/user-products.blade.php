<div>
    <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-3 gap-y-16 w-full overflow-y-auto"
        id="questions-container">

        {{-- Separate Overlay to New Component and use isset --}}
        {{-- <div id="overlay"
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl mb-4 text-center">Have you received order XXXXXXXXloveu yet?</h2>
                <p class="text-sm text-gray-600 mb-4 text-center">Once you choose yes, the order is set to complete. This
                    is an irreversible action.</p>
                <div class="flex justify-center">
                    <button
                        class="flex-none w-24 mr-2 py-2 text-sm bg-gray-600 text-white border border-gray-300 rounded hover:bg-gray-700">Show
                        me</button>
                    <button
                        class="flex-none w-24 mr-2 py-2 text-sm bg-red-600 text-white border border-red-300 rounded hover:bg-red-700">Not
                        yet</button>
                    <button
                        class="flex-none w-24 py-2 text-sm bg-blue-600 text-white border border-blue-300 rounded hover:bg-blue-700">Yes</button>
                </div>

            </div>
        </div> --}}

        @if ($products)
            @foreach ($products as $product)
                <li class="px-2 text-left text-sm relative">
                    <div class="w-full h-5/6 relative">
                        <img src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/assets/' . $product->image) }}"
                            class="w-full h-full rounded-lg border-gray-500 border-1 object-fit">
                        @if ($product->stockquantity <= 0)
                            <div class="absolute inset-0 flex justify-center items-center">
                                <div
                                    class="bg-black bg-opacity-50 text-white text-lg font-bold py-2 px-4 rounded-lg max-w-full absolute inset-0 flex justify-center items-center">
                                    Out of Stock
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="w-full h-10 flex items-center">
                        <ul class="flex flex-row w-full items-center">
                            <li class="w-10/12 pl-2 text-left text-sm">
                                <div class="text-left text-sm mt-4 leading-5 line-clamp-2">
                                    {{ $product->name }}
                                </div>
                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                    ₱&nbsp;{{ number_format($product->price, 2) }}
                                </div>
                            </li>
                            <li class="w-2/12 text-left text-sm flex justify-center">
                                @if ($product->stockquantity > 0)
                                    <button wire:click="addToCart({{ $product->id }})">
                                        <svg class="svg-icon mt-3 w-full h-full hover:brightness-90"
                                            style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                        </svg>
                                    </button>
                                @else
                                    <button disabled>
                                        <svg class="svg-icon mt-3 w-full h-full hover:brightness-90"
                                            style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #ccc; overflow: hidden;"
                                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                        </svg>
                                    </button>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
    <div class="flex flex-row items-center mt-4 justify-center w-full">
        <div class="w-96 text-center px-3">
            {{ $products->links('pagination.default') }}
        </div>
    </div>
</div>
