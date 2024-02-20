<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Orders
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="w-2/5 h-full px-3">
                    <form class="w-full h-full">
                        {{-- Left Main Container --}}
                        {{-- <livewire:main.user.livewire.user-products /> --}}
                        <div class="border-black border-1 w-full rounded-lg p-1">
                            <div class="w-full h-96 overflow-y-auto flex-row" id="questions-container">
                                <ul class="flex flex-row w-full mb-3">
                                    <li class="w-2/4 text-left text-sm px-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">ID:</span> 7FHJGUT869
                                        </div>
                                        <div class="my-1">
                                            <span class="font-medium">Payment Option:</span><br> 7FHJGUT869
                                        </div>
                                        <div class="my-1">
                                            <span class="font-medium">Shipping Address:</span><br> 615 W Greenfield St.
                                            Valley Center, Kansas(KS), 67147
                                        </div>
                                    </li>
                                    <li class="w-2/4 text-left text-sm px-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">Date:</span> 11/25/2023
                                        </div>
                                        <div class="my-1">
                                            <span class="font-medium">Preferred Service:</span><br> Delivery
                                        </div>
                                        <div class="my-1">
                                            <span class="font-medium">Courier Service:</span><br> XXXXXXXXX
                                        </div>
                                        <div class="my-1">
                                            <span class="font-medium">Tracking Number:</span><br> XXXXXXXXX
                                        </div>
                                    </li>
                                </ul>

                                <div class="w-full text-left text-sm px-3 font-semibold">
                                    Particulars:
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
                                            <div class="w-full flex-row px-5 my-2">
                                                <ul class="flex flex-row w-full">
                                                    <li
                                                        class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                        <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                                            class="w-12 h-12 ml-[-2.5rem]">
                                                        BC Racing Coilovers
                                                    </li>
                                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                                        28,500.00</li>
                                                    <li class="w-2/12 text-center text-xs items-center justify-center">2
                                                    </li>
                                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                                        57,000.00</li>
                                                </ul>
                                            </div>

                                            <!-- Single Unit of Product -->
                                            <div class="w-full flex-row px-5 my-2">
                                                <ul class="flex flex-row w-full">
                                                    <li
                                                        class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                        <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                                            class="w-12 h-12 ml-[-2.5rem]">
                                                        BC Racing Coilovers
                                                    </li>
                                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                                        28,500.00</li>
                                                    <li class="w-2/12 text-center text-xs items-center justify-center">2
                                                    </li>
                                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                                        57,000.00</li>
                                                </ul>
                                            </div>

                                            <!-- Single Unit of Product -->
                                            <div class="w-full flex-row px-5 my-2">
                                                <ul class="flex flex-row w-full">
                                                    <li
                                                        class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                        <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                                            class="w-12 h-12 ml-[-2.5rem]">
                                                        BC Racing Coilovers
                                                    </li>
                                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                                        28,500.00</li>
                                                    <li class="w-2/12 text-center text-xs items-center justify-center">2
                                                    </li>
                                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                                        57,000.00</li>
                                                </ul>
                                            </div>

                                            <!-- Single Unit of Product -->
                                            <div class="w-full flex-row px-5 my-2">
                                                <ul class="flex flex-row w-full">
                                                    <li
                                                        class="w-4/12 text-center text-xs flex items-center justify-center ">
                                                        <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                                            class="w-12 h-12 ml-[-2.5rem]">
                                                        BC Racing Coilovers
                                                    </li>
                                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                                        28,500.00</li>
                                                    <li class="w-2/12 text-center text-xs items-center justify-center">2
                                                    </li>
                                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                                        57,000.00</li>
                                                </ul>
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
                <div class="w-3/5 h-full px-3 text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row ml-9">
                            <ul class="flex flex-row w-full">
                                <li class="w-2/12 text-center text-sm">ID</li>
                                <li class="w-2/12 text-center text-sm">Date</li>
                                <li class="w-2/12 text-center text-sm">Mode</li>
                                <li class="w-2/12 text-center text-sm">Price</li>
                                <li class="w-2/12 text-center text-sm">Total</li>
                            </ul>
                        </div>
                        <hr class="my-1">

                        {{-- Order List  --}}
                        <div class="w-full h-full px-3 overflow-y-auto" id="questions-container">
                            <ul class=" w-full flex flex-col items-center">
                                {{-- SINGLE --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Order Details --}}
                                    <input class="widenWhenSelected" hidden type="radio" id="productId1"
                                        name="productList">
                                    <label
                                        class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId1">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-2/12 text-center text-sm">ID</li>
                                            <li class="w-2/12 text-center text-sm">Date</li>
                                            <li class="w-3/12 text-center text-sm">Customer</li>
                                            <li class="w-2/12 text-center text-sm">Status</li>
                                            <li class="w-2/12 text-center text-sm">Total</li>
                                        </ul>
                                    </label>
                                </li>
                                {{-- SINGLE --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Order Details --}}
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
                                            <li class="w-2/12 text-center text-sm">Total</li>
                                        </ul>
                                    </label>
                                </li>

                                {{-- SINGLE --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Order Details --}}
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
                                            <li class="w-2/12 text-center text-sm">Total</li>
                                        </ul>
                                    </label>
                                </li>

                                {{-- SINGLE --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Order Details --}}
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
                                            <li class="w-2/12 text-center text-sm">Total</li>
                                        </ul>
                                    </label>
                                </li>

                                {{-- SINGLE --}}
                                <li class="w-full flex justify-center select-none px-2">
                                    {{-- Order Details --}}
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
                                            <li class="w-2/12 text-center text-sm">Total</li>
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
