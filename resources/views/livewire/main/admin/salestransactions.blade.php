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
                            <input
                                class="flex-1 focus:border-orange-500 outline-none rounded-s-lg border-gray-500 border-l-2 border-t-2 border-b-2 border-e-0 h-full"
                                type="text" />
                            <button type="clear"
                                class="rounded-e-lg border-gray-500 border-r-2 border-t-2 border-b-2 h-full w-10 flex items-center justify-center">
                                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                </svg>
                            </button>
                        </div>
                        <button
                            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200">Filters</button>
                        <button
                            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200">Search</button>
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
                            <div class="flex flex-1 w-full">
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
                        <div class="w-full h-96 overflow-y-auto" id="transactions-container"">
                            <ul class="w-full flex flex-col items-center">
                                {{-- Single Unit of Product --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Product Details --}}
                                    <input class="widenWhenSelected" hidden type="radio" id="productId1"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId1">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId2"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId2">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId3"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId3">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId4"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId4">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId5"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId5">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId6"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId6">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId7"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId7">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId8"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId8">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId9"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId9">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId10"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId10">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId11"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId11">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId12"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId12">
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
                                    <input class="widenWhenSelected" hidden type="radio" id="productId13"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId13">
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
                    </div>
                    {{-- Products --}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
