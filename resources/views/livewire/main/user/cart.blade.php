<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Shopping Cart
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Right Panel border-2 border-black --}}
                <div class="w-full h-full px-3 text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row ml-9">
                            <ul class="flex flex-row w-full">
                                <li class="w-5/12 text-center text-sm ml-[-5rem]">Item</li>
                                <li class="w-2/12 text-center text-sm ml-[-1.5rem]">Price</li>
                                <li class="w-3/12 text-center text-sm ml-[-1rem]">Quantity</li>
                                <li class="w-3/12 text-center text-sm ml-[-3.5rem]">Subtotal</li>
                            </ul>
                        </div>
                        <hr class="my-1">

                        {{-- Order List  --}}
                        <div class="w-full h-full px-3 overflow-y-auto" id="cart-container">
                            <ul class=" w-full flex flex-col items-center">
                                {{--SINGLE--}}
                                <li class="w-full flex justify-center select-none px-2 my-3 mt-4">
                                    {{-- Order Details --}}
                                    <ul class="flex flex-row w-full">
                                        <li class="w-6/14 flex items-center text-sm">
                                            <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-25 border-2 border-gray rounded mr-2">
                                            <span class="flex-grow text-left mx-2 mr-5 px-3">BC Racing Coilovers</span>
                                        </li>

                                        <li class="w-3/12 text-center text-sm flex items-center mx-2  ">₱ 28, 500.00 </li>
                                        <li class="w-3/12 text-center text-sm flex items-center mx-2  ">
                                            <div class="relative flex items-center max-w-[6rem]">
                                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-white border-gray-300 h-8 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required>
                                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>

                                        <li class="w-2/12 text-center text-sm flex items-center ml-5">₱ 57, 000.00 </li>
                                        <li class="w-1/12 text-center text-sm flex items-center">
                                            <button type="clear" class=" h-full w-10 flex items-center justify-center">
                                                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>


                                </li>

                                {{--SINGLE--}}
                                <li class="w-full flex justify-center select-none px-2 my-3 mt-4">
                                    {{-- Order Details --}}
                                    <ul class="flex flex-row w-full">
                                        <li class="w-6/14 flex items-center text-sm">
                                            <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-25 border-2 border-gray rounded mr-2">
                                            <span class="flex-grow text-left mx-2 mr-5 px-3">BC Racing Coilovers</span>
                                        </li>

                                        <li class="w-3/12 text-center text-sm flex items-center mx-2  ">₱ 28, 500.00 </li>
                                        <li class="w-3/12 text-center text-sm flex items-center mx-2  ">
                                            <div class="relative flex items-center max-w-[6rem]">
                                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-white border-gray-300 h-8 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required>
                                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>

                                        <li class="w-2/12 text-center text-sm flex items-center ml-5">₱ 57, 000.00 </li>
                                        <li class="w-1/12 text-center text-sm flex items-center">
                                            <button type="clear" class=" h-full w-10 flex items-center justify-center">
                                                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>


                                </li>

                                {{--SINGLE--}}
                                <li class="w-full flex justify-center select-none px-2 my-3 mt-4">
                                    {{-- Order Details --}}
                                    <ul class="flex flex-row w-full">
                                        <li class="w-6/14 flex items-center text-sm">
                                            <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-25 border-2 border-gray rounded mr-2">
                                            <span class="flex-grow text-left mx-2 mr-5 px-3">BC Racing Coilovers</span>
                                        </li>

                                        <li class="w-3/12 text-center text-sm flex items-center mx-2  ">₱ 28, 500.00 </li>
                                        <li class="w-3/12 text-center text-sm flex items-center mx-2  ">
                                            <div class="relative flex items-center max-w-[6rem]">
                                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-white border-gray-300 h-8 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required>
                                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>

                                        <li class="w-2/12 text-center text-sm flex items-center ml-5">₱ 57, 000.00 </li>
                                        <li class="w-1/12 text-center text-sm flex items-center">
                                            <button type="clear" class=" h-full w-10 flex items-center justify-center">
                                                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>


                                </li>

                                {{--SINGLE--}}
                                <li class="w-full flex justify-center select-none px-2 my-3 mt-4">
                                    {{-- Order Details --}}
                                    <ul class="flex flex-row w-full">
                                        <li class="w-6/14 flex items-center text-sm">
                                            <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-25 border-2 border-gray rounded mr-2">
                                            <span class="flex-grow text-left mx-2 mr-5 px-3">BC Racing Coilovers</span>
                                        </li>

                                        <li class="w-3/12 text-center text-sm flex items-center mx-2  ">₱ 28, 500.00 </li>
                                        <li class="w-3/12 text-center text-sm flex items-center mx-2  ">
                                            <div class="relative flex items-center max-w-[6rem]">
                                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-white border-gray-300 h-8 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required>
                                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>

                                        <li class="w-2/12 text-center text-sm flex items-center ml-5">₱ 57, 000.00 </li>
                                        <li class="w-1/12 text-center text-sm flex items-center">
                                            <button type="clear" class=" h-full w-10 flex items-center justify-center">
                                                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>


                                </li>


                                
                            </ul>

                        </div>
                        <hr class="my-3">
                        <div class="w-full text-sm-right">
                            <ul class="flex flex-row w-full">
                                <li class="w-4/5"></li>
                                <li class="w-1/5 text-center text-sm ml-22 mr-[-3rem]">
                                    Total:
                                </li>
                                <li class="w-2/5 text-center text-sm ml-[-10rem] mr-19">
                                ₱ 104, 500.00
                                </li>
                            </ul>
                            
                        </div>
                        <div class="w-full text-sm-right">
                            <ul class="flex flex-row w-full">
                                <li class="w-4/5"></li>
                                <li class="w-1/5 text-center text-sm ml-22 mr-[-3rem]">
                                
                                </li>
                                <li class="w-2/5 text-center text-sm ml-[-10rem] mr-19">
                                <hr class="my-2">
                                </li>
                            </ul>
                            
                        </div>

                        <div class="w-full mt-3 flex justify-end px-5">
                            <button type="reset"
                                class="h-10 w-35 px-20 mr-10 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                                Check out
                                
                            </button>

                    </div>
                    <div class="w-full mt-3 flex justify-end px-5 text-sm">
                    Additional fees may be added upon checkout. 

                    </div>
                    {{-- Products --}}
                </div>
            </div>

        </div>
        <script>
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
                                                </script>
    </div>
</x-app-layout>