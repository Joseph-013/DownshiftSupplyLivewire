<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Transactions
                </h1>
                <div class="flex-1">
                    <form class="flex flex-row">
                        <div class="mx-2 flex flex-row w-full">
                            <input class="flex-1 focus:border-orange-500 outline-none rounded-s-lg border-gray-500 border-l-2 border-t-2 border-b-2 border-e-0 h-full" type="text" />
                            <button type="clear" class="rounded-e-lg border-gray-500 border-r-2 border-t-2 border-b-2 h-full w-10 flex items-center justify-center">
                                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                </svg>
                            </button>
                        </div>
                        <button class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200">Filters</button>
                        <button class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200">Search</button>
                    </form>
                </div>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="w-2/5 h-full px-3">
                    <div class="w-full h-full text-right flex">
                        <div class="w-full h-full flex flex-col">
                            <div class="w-full flex-row px-5">
                                <ul class="flex flex-row w-full">
                                    <li class="w-full text-center text-sm font-semibold">Overview</li>
                                </ul>
                            </div>
                            <hr class="my-1">
                            {{-- Products List  --}}
                            <div class="w-full h-96 overflow-y-auto" id="transactions-container"">
                            <div class=" flex flex-1 w-full">
                                <div class="w-2/4 h-full text-left text-sm my-1"><span class="font-semibold">Order ID:</span> 754321569</div>
                                <div class="w-2/4 h-full text-left text-sm my-1"><span class="font-semibold">Contact #:</span> 09564982312</div>
                            </div>
                            <div class="flex flex-1 w-full">
                                <div class="w-2/4 h-full text-left text-sm my-1"><span class="font-semibold">Name:</span> Leroy Johnston</div>
                                <div class="w-2/4 h-full text-left text-sm my-1"><span class="font-semibold">Status:</span> Complete</div>
                            </div>
                            <ul class="w-full flex flex-col items-center">
                                {{-- Single Unit of Product --}}
                                <div class="w-full h-full flex flex-col">
                                    <div class="w-full flex-row px-5">
                                        <ul class="flex flex-row w-full mt-3">
                                            <li class="w-4/12 text-center text-xs font-semibold">Item</li>
                                            <li class="w-3/12 text-center text-xs font-semibold">Unit Price</li>
                                            <li class="w-2/12 text-center text-xs font-semibold">Quantity</li>
                                            <li class="w-3/12 text-center text-xs font-semibold">Subtotal</li>
                                        </ul>
                                    </div>
                                    <hr class="my-1">
                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                    <!-- Single Unit of Product -->
                                    <div class="w-full flex-row px-5 my-2">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12 ml-[-2.5rem]">
                                                BC Racing Coilovers
                                            </li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                            <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                            <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                        </ul>
                                    </div>

                                </div>

                            </ul>
                        </div>
                        <hr class="mt-5 mb-2">
                        <div class="w-full text-xs text-right pr-5 mx-[-3rem]"><span class="font-semibold">Total: </span>₱ 101,000.00 </div>

                        <div class="w-full mt-4 flex justify-end">
                            <button type="reset" class="h-9 px-6 flex flex-row items-center justify-center rounded-lg bg-gray-500 ml-3 border-1 border-black text-black text-sm font-semibold text-spacing">
                                Update Transaction 
                                <svg class="svg-icon ml-2" style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M834.3 705.7c0 82.2-66.8 149-149 149H325.9c-82.2 0-149-66.8-149-149V346.4c0-82.2 66.8-149 149-149h129.8v-42.7H325.9c-105.7 0-191.7 86-191.7 191.7v359.3c0 105.7 86 191.7 191.7 191.7h359.3c105.7 0 191.7-86 191.7-191.7V575.9h-42.7v129.8z" />
                                    <path d="M889.7 163.4c-22.9-22.9-53-34.4-83.1-34.4s-60.1 11.5-83.1 34.4L312 574.9c-16.9 16.9-27.9 38.8-31.2 62.5l-19 132.8c-1.6 11.4 7.3 21.3 18.4 21.3 0.9 0 1.8-0.1 2.7-0.2l132.8-19c23.7-3.4 45.6-14.3 62.5-31.2l411.5-411.5c45.9-45.9 45.9-120.3 0-166.2zM362 585.3L710.3 237 816 342.8 467.8 691.1 362 585.3zM409.7 730l-101.1 14.4L323 643.3c1.4-9.5 4.8-18.7 9.9-26.7L436.3 720c-8 5.2-17.1 8.7-26.6 10z m449.8-430.7l-13.3 13.3-105.7-105.8 13.3-13.3c14.1-14.1 32.9-21.9 52.9-21.9s38.8 7.8 52.9 21.9c29.1 29.2 29.1 76.7-0.1 105.8z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Products --}}
                </div>

            </div>
            {{-- Right Panel border-2 border-black --}}
            <div class="w-3/5 h-full text-right flex">
                <div class="w-full h-full flex flex-col">
                    <div class="w-full flex-row px-5">
                        <ul class="flex flex-row w-full">
                            <li class="w-2/12 text-center text-sm">ID</li>
                            <li class="w-2/12 text-center text-sm">Date</li>
                            <li class="w-3/12 text-center text-sm">Customer</li>
                            <li class="w-2/12 text-center text-sm">Status</li>
                            <li class="w-3/12 text-center text-sm">Total</li>
                        </ul>
                    </div>
                    <hr class="my-1">
                    {{-- Products List  --}}
                    <div class="w-full h-96 overflow-y-auto mb-5" id="transactions-container"">
                            <ul class=" w-full flex flex-col items-center">
                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId1" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId1">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">754321569</li>
                                    <li class="w-2/12 text-center text-sm">9/1/2023</li>
                                    <li class="w-3/12 text-center text-sm">Leroy Johnston</li>
                                    <li class="w-2/12 text-center text-sm">Complete</li>
                                    <li class="w-3/12 text-center text-sm">₱ 18,000.00</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId2" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId2">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId3" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId3">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId4" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId4">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId5" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId5">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId6" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId6">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId7" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId7">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId8" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId8">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId9" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId9">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId10" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId10">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId11" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId11">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId12" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId12">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId13" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId13">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">ID</li>
                                    <li class="w-2/12 text-center text-sm">Date</li>
                                    <li class="w-3/12 text-center text-sm">Customer</li>
                                    <li class="w-2/12 text-center text-sm">Status</li>
                                    <li class="w-3/12 text-center text-sm">Total</li>
                                </ul>
                            </label>
                        </li>

                        </ul>
                    </div>
                    <div class="w-full mt-5 flex justify-center">
                        <button type="reset" class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                            New Transaction
                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Products --}}
            </div>

        </div>

    </div>
    </div>
</x-app-layout>