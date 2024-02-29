<ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-16 w-full">

    @if ($products)
        @foreach ($products as $product)
            <li class="px-2 text-left text-sm">
                <div class="w-full h-5/6">
                    <img src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/assets/' . $product->image) }}"
                        class="w-full h-full rounded-lg border-gray-500 border-1 object-fit">
                </div>
                <div class="w-full h-10 flex items-center">
                    <ul class="flex flex-row w-full items-center">
                        <li class="w-3/4 px-2 text-left text-sm">
                            <div class="text-left text-sm mt-4">
                                {{ $product->name }}
                            </div>
                            <div class="mt-2 text-left text-sm mb-[-1rem]">
                                ₱&nbsp;{{ number_format($product->price, 2) }}
                            </div>
                        </li>
                        <li class="w-1/4 text-left text-sm flex justify-center">
                            <button wire:click="addToCart({{ $product->id }})">
                                <svg class="svg-icon mt-3 w-full h-full"
                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                    viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
            </li>
        @endforeach
    @endif


</ul>
