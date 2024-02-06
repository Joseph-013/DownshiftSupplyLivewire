<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Transactions (Edit)
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
                            <div class="w-full flex-row ">
                                <ul class="flex flex-row w-full">
                                    <li class="w-full text-left text-sm font-semibold ">Overview</li>
                                </ul>
                            </div>
                            <hr class="my-1">
                            <div class="w-full text-sm text-left"><span class="font-semibold">Order ID:
                                </span>754321569
                            </div>
                            <div class="w-full flex-row mt-4">
                                <ul class="flex flex-row w-full">
                                    <li class="w-1/2 pr-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">First Name:</label>
                                        <input class="w-full h-10 flex items-center" type="text" value="23">
                                    </li>

                                    <li class="w-1/2 pl-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">Last Name:</label>
                                        <input class="w-full h-10 flex items-center" type="text" value="23">
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full flex-row mt-3">
                                <ul class="flex flex-row w-full">
                                    <li class="w-1/2 pr-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">Contact #:</label>
                                        <input class="w-full h-10 flex items-center" type="text" value="23">
                                    </li>
                                    <li class="w-1/2 pl-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">Status:</label>
                                        <select class="w-full h-10 flex items-center">
                                            <option value="">Complete</option>
                                            <option value="">Pending</option>
                                            <option value="">In Transit</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </li>
                                </ul>
                            </div>

                            <div class="w-full mt-5 flex justify-center">
                                <button type="submit"
                                    class="h-10 w-60  items-center justify-center rounded-lg bg-orange-500  border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                                    Save Changes
                                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                        <path d="M11 2H9v3h2z" />
                                        <path
                                            d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Panel border-2 border-black --}}
                <div class="w-3/5 h-full text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row ">
                            <ul class="flex flex-row w-full">
                                <li class="w-full text-left text-sm font-semibold pl-2">Particulars</li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        <div class="w-full flex-row px-5">
                            <ul class="flex flex-row w-full">
                                <li class="w-6/12 text-center text-xs">Item</li>
                                <li class="w-2/12 text-center text-xs">Price</li>
                                <li class="w-2/12 text-center text-xs">Quantity</li>
                                <li class="w-2/12 text-center text-xs">Subtotal</li>
                                <li class="w-1/12 text-center text-xs"></li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        {{-- Products List  --}}
                        <div class="w-full h-96 overflow-y-auto mb-3" id="edittransactions-container"">
                            <ul class=" w-full flex flex-col items-center">
                                {{-- Single Unit of Product --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Product Details --}}
                                    <input class="widenWhenSelectedEdit" hidden type="radio" id="productId1"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId1">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-6/12 text-center text-xs flex items-center justify-center">
                                                <div class="flex items-center">
                                                    <!-- Wrapping content in a flex container -->
                                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                                        class="w-24 h-20 ml-[-2rem] object-cover">
                                                    <div class="ml-2">
                                                        <!-- Adding margin to separate image and text -->
                                                        <div class="text-sm text-left mb-3">
                                                            <span class="font-semibold">Item ID:</span> 754321569
                                                        </div>
                                                        <div class="text-sm text-left">BC Racing Crossovers</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">₱
                                                28,500.00</li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">2
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">₱
                                                57,000.00</li>
                                            <li class="w-1/12 text-center flex items-center justify-center text-sm">
                                                <button type="clear"
                                                    class=" h-full w-10 flex items-center justify-center">
                                                    <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </label>
                                </li>
                                {{-- Single Unit of Product --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Product Details --}}
                                    <input class="widenWhenSelectedEdit" hidden type="radio" id="productId1"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId1">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-6/12 text-center text-xs flex items-center justify-center">
                                                <div class="flex items-center">
                                                    <!-- Wrapping content in a flex container -->
                                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                                        class="w-24 h-20 ml-[-2rem] object-cover">
                                                    <div class="ml-2">
                                                        <!-- Adding margin to separate image and text -->
                                                        <div class="text-sm text-left mb-3">
                                                            <span class="font-semibold">Item ID:</span> 754321569
                                                        </div>
                                                        <div class="text-sm text-left">BC Racing Crossovers</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">₱
                                                28,500.00</li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">2
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">₱
                                                57,000.00</li>
                                            <li class="w-1/12 text-center flex items-center justify-center text-sm">
                                                <button type="clear"
                                                    class=" h-full w-10 flex items-center justify-center">
                                                    <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </label>
                                </li>
                                {{-- Single Unit of Product --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Product Details --}}
                                    <input class="widenWhenSelectedEdit" hidden type="radio" id="productId1"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId1">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-6/12 text-center text-xs flex items-center justify-center">
                                                <div class="flex items-center">
                                                    <!-- Wrapping content in a flex container -->
                                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                                        class="w-24 h-20 ml-[-2rem] object-cover">
                                                    <div class="ml-2">
                                                        <!-- Adding margin to separate image and text -->
                                                        <div class="text-sm text-left mb-3">
                                                            <span class="font-semibold">Item ID:</span> 754321569
                                                        </div>
                                                        <div class="text-sm text-left">BC Racing Crossovers</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">₱
                                                28,500.00</li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">2
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">₱
                                                57,000.00</li>
                                            <li class="w-1/12 text-center flex items-center justify-center text-sm">
                                                <button type="clear"
                                                    class=" h-full w-10 flex items-center justify-center">
                                                    <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </label>
                                </li>
                                {{-- Single Unit of Product --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Product Details --}}
                                    <input class="widenWhenSelectedEdit" hidden type="radio" id="productId1"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId1">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-6/12 text-center text-xs flex items-center justify-center">
                                                <div class="flex items-center">
                                                    <!-- Wrapping content in a flex container -->
                                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                                        class="w-24 h-20 ml-[-2rem]">
                                                    <div class="ml-2">
                                                        <!-- Adding margin to separate image and text -->
                                                        <div class="text-sm text-left mb-3">
                                                            <span class="font-semibold">Item ID:</span> 754321569
                                                        </div>
                                                        <div class="text-sm text-left">BC Racing Crossovers</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">₱
                                                28,500.00</li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">2
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">₱
                                                57,000.00</li>
                                            <li class="w-1/12 text-center flex items-center justify-center text-sm">
                                                <button type="clear"
                                                    class=" h-full w-10 flex items-center justify-center">
                                                    <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </label>
                                </li>

                            </ul>
                        </div>
                        <hr class="mb-2">
                        <div class="w-full text-sm text-right pr-7 mx-[-5rem] mb-5">
                            <span class="font-semibold">Total:
                            </span>₱ 101,000.00
                        </div>

                        <div class="w-full flex-row px-5 ml-[-.5rem]">
                            <ul class="flex flex-row w-full rounded border border-gray-500 px-2 py-2">
                                <li class="w-6/12 text-center text-xs flex items-center justify-center ">
                                    <div class="flex items-center"> <!-- Wrapping content in a flex container -->

                                        <div class=""> <!-- Adding margin to separate image and text -->
                                            <label class="w-full h-10 flex items-center font-semibold">Item
                                                ID/Name:</label>
                                            <input class="w-5/6 h-10 flex items-center text-xs" type="text"
                                                value="23">
                                        </div>
                                        <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                            class="w-24 h-20 ml-[-1rem]">
                                    </div>
                                </li>
                                <li class="w-3/12 text-center flex items-center justify-center text-xs ">Random Item
                                </li>
                                <li class="w-2/12 text-center flex items-center justify-center text-xs ">
                                    <div class=""> <!-- Adding margin to separate image and text -->
                                        <label
                                            class="w-full h-10 flex items-center font-semibold text-xs">Quantity:</label>
                                        <input class="w-5/6 h-10 flex items-center text-xs" type="number"
                                            value="23">
                                    </div>
                                </li>
                                <li class="w-3/12 text-center flex items-center justify-center text-sm">
                                    <button type="submit"
                                        class="h-10 w-60 items-center justify-center rounded-lg bg-orange-500  border-1 border-black text-white text-xs  font-semibold text-spacing flex flex-row">
                                        Add Item
                                        <svg fill="#FFFFFF" height="20px" width="20px" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            enable-background="new 0 0 512 512">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M256,11C120.9,11,11,120.9,11,256s109.9,245,245,245s245-109.9,245-245S391.1,11,256,11z M256,460.2    c-112.6,0-204.2-91.6-204.2-204.2S143.4,51.8,256,51.8S460.2,143.4,460.2,256S368.6,460.2,256,460.2z" />
                                                    <path
                                                        d="m357.6,235.6h-81.2v-81.2c0-11.3-9.1-20.4-20.4-20.4-11.3,0-20.4,9.1-20.4,20.4v81.2h-81.2c-11.3,0-20.4,9.1-20.4,20.4s9.1,20.4 20.4,20.4h81.2v81.2c0,11.3 9.1,20.4 20.4,20.4 11.3,0 20.4-9.1 20.4-20.4v-81.2h81.2c11.3,0 20.4-9.1 20.4-20.4s-9.1-20.4-20.4-20.4z" />
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
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
