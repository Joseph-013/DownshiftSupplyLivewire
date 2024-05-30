<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1
                    class="lg:me-10 ml-5 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Shopping Cart
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Right Panel border-2 border-black --}}
                <div class="w-full h-full px-3 text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row ml-9">
                            <ul class="flex-row w-full lg:flex hidden">
                                <li class="w-5/12 text-center text-sm ml-[-5rem]">Item</li>
                                <li class="w-2/12 text-center text-sm ml-[-1.5rem]">Price</li>
                                <li class="w-3/12 text-center text-sm ml-[-1rem]">Quantity</li>
                                <li class="w-3/12 text-center text-sm ml-[-3.5rem]">Subtotal</li>
                            </ul>
                        </div>
                        <hr class="my-1 lg:block hidden">

                        {{-- Order List  --}}
                        @if ($cartNotEmpty)
                            <div class="w-full h-full px-3 overflow-y-auto" id="cart-container">
                                <livewire:main.user.livewire.user-cart />
                            </div>
                            <hr class="my-3 hidden sm:block">
                            <div class="w-full text-sm-right">
                                <livewire:main.user.livewire.user-cart-total />
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
                        @else
                            <div class="w-full h-full px-3 overflow-y-auto" id="cart-container">
                                <br />
                                <div class="w-full text-center text-gray-600">Your cart is empty</div>
                            </div>
                            <hr class="my-3 hidden sm:block">
                            <div class="w-full text-sm-right">
                                <livewire:main.user.livewire.user-cart-total />
                            </div>
                            <div class="w-full text-sm-right">
                                <ul class="flex flex-row w-full">
                                    <li class="w-4/5"></li>
                                    <li class="w-1/5 text-center text-sm ml-22 mr-[-3rem]">

                                    </li>
                                    <li class="w-2/5 text-center text-sm ml-[-10rem] mr-19 ">
                                        <hr class="my-2">
                                    </li>
                                </ul>
                            </div>
                        @endif

                        <div class="w-full mt-3 flex justify-end px-5">
                            <livewire:main.user.livewire.user-cart-checkout-button class="min-w-max" />
                            {{-- @else
                                <button disabled id="checkoutButton"
                                    class="h-10 w-35 px-20 mr-10 flex flex-row items-center justify-center rounded-lg bg-gray-300 ml-3 border-1 border-gray-400 text-gray-600 text-sm font-semibold text-spacing cursor-not-allowed">
                                    Check out
                                </button>
                            @endif --}}

                        </div>


                    </div>
                </div>
            </div>

        </div>
        @livewireScripts
    </div>
</x-app-layout>
