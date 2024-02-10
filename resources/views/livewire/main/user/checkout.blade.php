<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Check Out
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="w-3/5 h-full px-3">
                    <form class="w-full h-full">
                        {{-- Left Main Container --}}
                        <div class=" p-1">
                            <div class="w-full h-96 overflow-y-auto flex-row" id="questions-container">
                                <div class="w-full text-left text-sm px-3 font-semibold">
                                    Particulars
                                </div>

                                <div class="px-3">
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
                                            <div class="w-full flex-row  my-1 select-none flex justify-center">
                                                <input class="widenWhenSelectedEdit" hidden type="radio" id="productId1" name="productList">
                                                <label class="w-full py-2 my-1 px-3 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId1">
                                                    <ul class="flex flex-row w-full flex justify-center items-center">
                                                        <li class="w-4/12 text-center text-xs flex items-center justify-center">
                                                            <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12">
                                                            BC Racing Coilovers
                                                        </li>
                                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                                        <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                                    </ul>
                                                </label>
                                            </div>


                                            <!-- Single Unit of Product -->
                                            <div class="w-full flex-row  my-1 select-none flex justify-center">
                                                <input class="widenWhenSelectedEdit" hidden type="radio" id="productId2" name="productList">
                                                <label class="w-full py-2 my-1 px-3 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId2">
                                                    <ul class="flex flex-row w-full flex justify-center items-center">
                                                        <li class="w-4/12 text-center text-xs flex items-center justify-center">
                                                            <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12">
                                                            BC Racing Coilovers
                                                        </li>
                                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                                        <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                                    </ul>
                                                </label>
                                            </div>

                                            <!-- Single Unit of Product -->
                                            <div class="w-full flex-row  my-1 select-none flex justify-center">
                                                <input class="widenWhenSelectedEdit" hidden type="radio" id="productId3" name="productList">
                                                <label class="w-full py-2 my-1 px-3 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId3">
                                                    <ul class="flex flex-row w-full flex justify-center items-center">
                                                        <li class="w-4/12 text-center text-xs flex items-center justify-center">
                                                            <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12">
                                                            BC Racing Coilovers
                                                        </li>
                                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                                        <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                                    </ul>
                                                </label>
                                            </div>

                                            <!-- Single Unit of Product -->
                                            <div class="w-full flex-row  my-1 select-none flex justify-center">
                                                <input class="widenWhenSelectedEdit" hidden type="radio" id="productId4" name="productList">
                                                <label class="w-full py-2 my-1 px-3 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId4">
                                                    <ul class="flex flex-row w-full flex justify-center items-center">
                                                        <li class="w-4/12 text-center text-xs flex items-center justify-center">
                                                            <img src="{{ asset('assets/BC Racing M1 Series.png') }}" class="w-12 h-12">
                                                            BC Racing Coilovers
                                                        </li>
                                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱ 28,500.00</li>
                                                        <li class="w-2/12 text-center text-xs items-center justify-center">2</li>
                                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱ 57,000.00</li>
                                                    </ul>
                                                </label>
                                            </div>

                                            <div class="w-full flex-row px-5 my-2">
                                                <ul class="flex flex-row w-full">
                                                    <li class="w-full text-right text-xs mr-5">
                                                        <span class="font-semibold mr-5">Shipping Fee: </span> ₱ 200.00
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </ul>
                                </div>

                            </div>
                            <hr class="my-1">
                            <div class="w-full text-right text-xs ml-[-5rem] my-2">
                                <span class="font-semibold mr-5">Total: </span> ₱ 101,000.00
                            </div>
                        </div>
                    </form>

                </div>


                {{-- Right Panel border-2 border-black --}}
                <div class="w-2/5 h-full px-3 text-right flex text-xs">
                    <form class="w-full h-full">
                        {{-- Left Main Container --}}
                        <div class="text-left font-semibold text-sm">
                            Details
                        </div>
                        <div class="border-black border-1 w-full rounded-lg p-1">
                            <div class="w-full h-96 overflow-y-auto flex-row" id="questions-container">
                                <ul class="flex flex-row w-full mb-3">
                                    <li class="w-2/4 text-left pl-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">Name:</span>
                                        </div>
                                    </li>
                                    <li class="w-3/4 text-left">
                                        <div class="my-1 flex items-center">
                                            <span class="font-medium mr-2">First:</span>
                                            <input class="w-4/6 h-10 text-xs" type="text" value="First Name">
                                        </div>
                                        <div class="my-1 flex items-center">
                                            <span class="font-medium mr-2">Last:</span>
                                            <input class="w-4/6 h-10 text-xs" type="text" value="Last Name">
                                        </div>
                                    </li>
                                </ul>
                                <ul class="flex flex-row w-full mb-3">
                                    <li class="w-2/4 text-left pl-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">Contact Number:</span>
                                        </div>
                                    </li>
                                    <li class="w-3/4 text-left">
                                        <input class="w-4/5 h-10 text-xs" type="text" value="Contact Number">
                                    </li>
                                </ul>

                                <div class="flex">
                                    <label for="pickup" class="rounded-md border border-gray-300 p-2 mr-4 flex items-center">
                                        <input type="radio" id="pickup" name="delivery_option" value="pickup" class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <!-- SVG icon for pickup option -->

                                        </svg>
                                        <span class="ml-2">Pickup</span>
                                    </label>

                                    <label for="delivery" class="rounded-md border border-gray-300 p-2 flex items-center">
                                        <input type="radio" id="delivery" name="delivery_option" value="delivery" class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <!-- SVG icon for delivery option -->
                                        </svg>
                                        <span class="ml-2">Delivery</span>
                                    </label>
                                </div>



                                <div class="w-full text-left px-3 font-semibold">
                                    Particulars:
                                </div>

                                <div class="px-3">
                                    <ul class="w-full flex flex-col items-center">

                                </div>
                                </ul>
                            </div>

                        </div>
                </div>
                </form>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>