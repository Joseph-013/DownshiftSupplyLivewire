<ul class=" w-full flex flex-col items-center">



    @foreach ($cartEntries as $entry)
        <li class="w-full flex justify-center select-none px-2 my-3 mt-4">
            {{-- Order Details --}}
            <ul class="flex flex-row w-full">
                <li class="w-6/12 flex items-center text-sm text-left">
                    <img src="{{ $entry->product->image }}" class="w-20 h-20 border-2 border-gray rounded object-cover">
                    <div class="container">
                        <div class="fixed-width-container text-left px-0">
                            <span class="flex-grow text-left">{{ Str::limit($entry->product->name, 40) }}</span>
                        </div>
                        <div class="hover-text">
                            <span class="full-text">{{ $entry->product->name }}</span>
                        </div>
                    </div>

                </li>

                <li class="w-3/12 text-center text-sm flex items-center ml-[-2rem]">
                    ₱&nbsp;{{ number_format($entry->product->price, 2) }}</li>
                <li class="w-3/12 text-center text-sm flex items-center relative">
                    <div class="relative flex flex-col items-center max-w-[6rem]">
                        <div class="flex h-full w-full">
                            <button wire:click="decrementQuantity({{ $entry->product->id }})" type="button"
                                id="decrement-button" data-input-counter-decrement="quantity-input"
                                class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="number" id="quantity-input-{{ $entry->product->id }}" data-input-counter
                                data-stock-quantity="{{ $entry->product->stockquantity }}"
                                aria-describedby="helper-text-explanation"
                                class="bg-white border-gray-300 h-8 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value='{{ $entry->quantity }}' required>
                            <button wire:click="incrementQuantity({{ $entry->product->id }})" type="button"
                                id="increment-button" data-input-counter-increment="quantity-input"
                                class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                        <div class="remaining-text text-left text-red-500 italic text-xs mt-1">
                            {{ $entry->product->stockquantity <= $entry->product->criticallevel ? $entry->product->stockquantity . ' item/s left' : '' }}
                        </div>
                    </div>
                </li>



                <li class="w-2/12 text-center text-sm flex items-center ml-5">
                    ₱&nbsp;{{ number_format($entry->product->price * $entry->quantity, 2) }}</li>
                <li class="w-1/12 text-center text-sm flex items-center">
                    <button wire:click="removeItem({{ $entry->product->id }})"
                        class=" h-full w-10 flex items-center justify-center">
                        <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                        </svg>
                    </button>
                </li>
            </ul>


        </li>
    @endforeach

</ul>
