<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Orders
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

                        <button class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg class="svg-icon mr-2" style="width: 1.2em; height: 1.2em; fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M859.02 234.524l0.808-0.756 0.749-0.813c27.047-29.356 33.876-70.34 17.823-106.957-15.942-36.366-50.416-58.957-89.968-58.957H163.604c-38.83 0-73.043 22.012-89.29 57.444-16.361 35.683-10.632 76.301 14.949 106.004l0.97 1.126 280.311 266.85 2.032 312.074c0.107 16.502 13.517 29.805 29.995 29.805l0.2-0.001c16.568-0.107 29.912-13.626 29.804-30.194l-2.198-337.564-296.478-282.241c-9.526-11.758-11.426-26.933-5.044-40.851 6.446-14.059 19.437-22.452 34.75-22.452h624.828c15.6 0 28.69 8.616 35.017 23.047 6.31 14.391 3.924 29.831-6.354 41.497l-304.13 284.832 1.302 458.63c0.047 16.54 13.469 29.916 29.998 29.915h0.087c16.568-0.047 29.962-13.517 29.915-30.085L573.04 502.36l285.98-267.836z" fill="" />
                                <path d="M657.265 595.287c0 16.498 13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.498 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997H687.262c-16.498 0-29.997 13.499-29.997 29.997z m273.894 138.882H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z m0 168.878H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z" fill="" />
                            </svg>Filters</button>
                        <button class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg class="feather feather-search" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" x2="16.65" y1="21" y2="16.65" />
                            </svg>Search</button>
                    </form>
                </div>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="w-4/5 h-full px-3">
                    <div class="w-full h-full text-right flex">
                        <div class="w-full h-full flex flex-col">
                            <div class="w-full flex-row px-5">
                                <ul class="flex flex-row w-full">
                                    <li class="w-full text-center text-sm font-semibold">Details</li>
                                </ul>
                            </div>
                            <hr class="my-1">
                            {{-- Products List  --}}
                            <div class="w-full h-96 overflow-y-auto" id="orders-container">
                            <div class=" flex flex-1 w-full">
                                <div class="w-2/5 text-left text-xs pr-2">
                                    <div class="text-left text-xs my-2">
                                        <span class="font-semibold">Order ID:</span> 458690014
                                    </div>
                                    <div class="text-left text-xs my-2">
                                        <span class="font-semibold">Date:</span> 458690014
                                    </div>
                                    <div class="text-left text-xs my-2">
                                        <span class="font-semibold">Name:</span> 458690014
                                    </div>
                                    <div class="text-left text-xs my-2">
                                        <span class="font-semibold">Username:</span> 458690014
                                    </div>
                                    <div class="text-left text-xs my-2">
                                        <span class="font-semibold">Email:</span> 458690014
                                    </div>
                                    <div class="text-left text-xs my-2">
                                        <span class="font-semibold">Contact #:</span> 458690014
                                    </div>
                                    <div class="text-left text-xs my-2">
                                        <span class="font-semibold">Payment Opt:</span> 458690014
                                    </div>
                                    <div class="text-left text-xs my-2">
                                        <span class="font-semibold">Preferred Service:</span> 458690014
                                    </div>
                                    <div class="text-left text-xs my-2 flex items-center">
                                        <span class="font-semibold mr-2">Courier Service:</span>
                                        <input type="text" class="border-b border-gray-300 text-xs" placeholder="Enter Courier Service" value="">
                                    </div>
                                    <div class="text-left text-xs my-2 flex items-center">
                                        <span class="font-semibold mr-2">Shipping Fee:</span>
                                        <input type="text" class="border-b border-gray-300 text-xs" placeholder="Enter Shipping Fee" value="">
                                    </div>
                                    <div class="text-left text-xs my-2 flex items-center">
                                        <span class="font-semibold mr-2">Tracking #:</span>
                                        <input type="text" class="border-b border-gray-300 text-xs" placeholder="Enter Tracking Number" value="">
                                    </div>
                                </div>
                                <div class="w-2/5 text-left text-xs px-2 mx-1">
                                    <div class="text-left text-xs font-semibold px-2">
                                        Address
                                    </div>
                                    <div>
                                        <textarea class="w-full h-50 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" rows="9" placeholder="Papalitan ng maps"></textarea>
                                    </div>
                                    <div>
                                        <textarea class="w-full h-50 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500 text-xs" rows="3" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="w-2/5 text-left text-xs px-2 mx-1">
                                    <div class="text-left text-xs font-semibold px-2">
                                        Proof of Payment
                                    </div>
                                    <div>
                                        <textarea class="w-full h-50 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" rows="12"></textarea>
                                    </div>
                                </div>

                            </div>
                            <ul class="w-full flex flex-col items-center">
                                {{-- Single Unit of Product --}}
                                <div class="w-full h-full flex flex-col">
                                    <div class="w-full flex-row px-5">
                                        <ul class="flex flex-row w-full mt-3">
                                            <li class="w-4/12 text-center text-xs font-semibold">Item</li>
                                            <li class="w-3/12 text-center text-xs font-semibold">Price</li>
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
                        <hr class="mt-3 mb-2">
                        <div class="w-full text-xs text-right pr-1 flex items-center">
                        <div class="w-1/2 flex ml-20">
    <span class="font-semibold text-xs flex items-center">Status: </span>
    <select class="ml-2 border rounded-md text-sm">
        <option value="option1">Complete</option>
        <option value="option2">In Transit</option>
        <option value="option3">Ready for Pickup</option>
        <option value="option4">Processing</option>
        <option value="option5">On Hold</option>
        <option value="option6">Drop</option>
    </select>
</div>


                            <div class="w-2/2 flex ml-20">
                                <span class="font-semibold">Total: </span>
                                <span>₱ 101,000.00</span>
                            </div>
                        </div>

                        <div class="w-full mt-4 flex justify-end">
                            <button type="reset" class="h-9 px-5 flex flex-row items-center justify-center rounded-lg bg-blue-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                                <span class="flex pl-3 mr-[-1.5em]">Update</span>
                                <svg class="svg-icon ml-2" style="width: 4.5em; height: 1.5em; vertical-align: middle; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M730.584615 78.769231v267.815384c0 19.692308-15.753846 37.415385-37.415384 37.415385H273.723077c-19.692308 0-37.415385-15.753846-37.415385-37.415385V78.769231H157.538462C114.215385 78.769231 78.769231 114.215385 78.769231 157.538462v708.923076c0 43.323077 35.446154 78.769231 78.769231 78.769231h708.923076c43.323077 0 78.769231-35.446154 78.769231-78.769231V220.553846L803.446154 78.769231h-72.861539z m137.846154 750.276923c0 19.692308-15.753846 37.415385-37.415384 37.415384H194.953846c-19.692308 0-37.415385-15.753846-37.415384-37.415384V500.184615c0-19.692308 15.753846-37.415385 37.415384-37.415384h636.061539c19.692308 0 37.415385 15.753846 37.415384 37.415384v328.861539zM488.369231 267.815385c0 19.692308 15.753846 37.415385 37.415384 37.415384h90.584616c19.692308 0 37.415385-15.753846 37.415384-37.415384V78.769231h-163.446153l-1.969231 189.046154z" />
                                </svg>
                            </button>
                        </div>


                    </div>

                    {{-- Products --}}
                </div>

            </div>
            {{-- Right Panel border-2 border-black --}}
            <div class="w-2/4 h-full text-right flex">
                <div class="w-full h-full flex flex-col">
                    <div class="w-full flex-row px-5">
                        <ul class="flex flex-row w-full">
                            <li class="w-2/12 text-center text-xs">ID</li>
                            <li class="w-2/12 text-center text-xs">Date</li>
                            <li class="w-3/12 text-center text-xs">Customer</li>
                            <li class="w-2/12 text-center text-xs">Status</li>
                            <li class="w-3/12 text-center text-xs">Total</li>
                        </ul>
                    </div>
                    <hr class="my-1">
                    {{-- Products List  --}}
                    
                    <livewire:online-transaction-list :transactions="$transactions" />
                </div>

                {{-- Products --}}
            </div>

        </div>

    </div>
    </div>
</x-app-layout>