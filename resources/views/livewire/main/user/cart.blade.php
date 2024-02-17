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

                            <livewire:main.user.livewire.user-cart />

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

        </div>
    </div>
</x-app-layout>
