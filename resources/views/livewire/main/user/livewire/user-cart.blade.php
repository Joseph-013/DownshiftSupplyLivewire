<ul class=" w-full flex flex-col items-center">



    @foreach ($cartEntries as $entry)
        <li class="w-full flex justify-center select-none px-2 my-3 mt-4">
            {{-- Order Details --}}
            <ul class="flex flex-row w-full">
                <li class="w-6/14 flex items-center text-sm">
                    <img src="{{ $entry->product->image }}" class="w-25 border-2 border-gray rounded mr-2">
                    <div class="container">
                        <div class="fixed-width-container ml-[-3.5rem]">
                            <span class="flex-grow text-left ">{{ $entry->product->name }}</span>
                        </div>
                        <div class="hover-text">
                            <span class="full-text">{{ $entry->product->name }}</span>
                        </div>
                    </div>
                </li>

                <li class="w-3/12 text-center text-sm flex items-center mx-2  ">
                    ₱&nbsp;{{ number_format($entry->product->price, 2) }}</li>
                <li class="w-3/12 text-center text-sm flex items-center mx-2  ">
                    <div class="relative flex items-center max-w-[6rem]">
                        <button wire:click="decrementQuantity({{ $entry->id }})" type="button" id="decrement-button"
                            data-input-counter-decrement="quantity-input"
                            class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h16" />
                            </svg>
                        </button>
                        <input type="text" id="quantity-input" data-input-counter
                            aria-describedby="helper-text-explanation"
                            class="bg-white border-gray-300 h-8 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value='{{ $entry->quantity }}' required>
                        <button wire:click="incrementQuantity({{ $entry->id }})" type="button" id="increment-button"
                            data-input-counter-increment="quantity-input"
                            class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </div>
                </li>

                <li class="w-2/12 text-center text-sm flex items-center ml-5">₱ 57, 000.00 </li>
                <li class="w-1/12 text-center text-sm flex items-center">
                    <button type="clear" class=" h-full w-10 flex items-center justify-center">
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

<script>
    /*
    // Get references to the elements
    const decrementButton = document.getElementById('decrement-button');
    const incrementButton = document.getElementById('increment-button');
    const quantityInput = document.getElementById('quantity-input');

    // Add event listeners to the buttons
    decrementButton.addEventListener('click', () => {
        // Decrease the value by 1 if it's greater than 0
        let currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue) && currentValue > 0) {
            quantityInput.value = currentValue - 1;
        } else {
            quantityInput.value = 0;
        }
    });

    incrementButton.addEventListener('click', () => {
        // Increase the value by 1, or set to 1 if it's not a number or less than 0
        let currentValue = parseInt(quantityInput.value);
        if (isNaN(currentValue) || currentValue < 0) {
            quantityInput.value = 1;
        } else {
            quantityInput.value = currentValue + 1;
        }
    });
    */
</script>
