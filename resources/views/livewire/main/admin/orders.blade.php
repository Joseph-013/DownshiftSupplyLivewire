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
                        
                        <button
                        class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg class="svg-icon mr-2" style="width: 1.2em; height: 1.2em; fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M859.02 234.524l0.808-0.756 0.749-0.813c27.047-29.356 33.876-70.34 17.823-106.957-15.942-36.366-50.416-58.957-89.968-58.957H163.604c-38.83 0-73.043 22.012-89.29 57.444-16.361 35.683-10.632 76.301 14.949 106.004l0.97 1.126 280.311 266.85 2.032 312.074c0.107 16.502 13.517 29.805 29.995 29.805l0.2-0.001c16.568-0.107 29.912-13.626 29.804-30.194l-2.198-337.564-296.478-282.241c-9.526-11.758-11.426-26.933-5.044-40.851 6.446-14.059 19.437-22.452 34.75-22.452h624.828c15.6 0 28.69 8.616 35.017 23.047 6.31 14.391 3.924 29.831-6.354 41.497l-304.13 284.832 1.302 458.63c0.047 16.54 13.469 29.916 29.998 29.915h0.087c16.568-0.047 29.962-13.517 29.915-30.085L573.04 502.36l285.98-267.836z" fill="" /><path d="M657.265 595.287c0 16.498 13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.498 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997H687.262c-16.498 0-29.997 13.499-29.997 29.997z m273.894 138.882H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z m0 168.878H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z" fill="" /></svg>Filters</button>
                        <button
                            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg class="feather feather-search" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg>Search</button>
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
                            <div class="w-full h-96 overflow-y-auto" id="orders-container"">
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
                                        <div id="map" class="w-full h-50 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500"></div>
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
                                </div>

                            </ul>
                        </div>
                        <hr class="mt-3 mb-2">
                        <div class="w-full text-xs text-right pr-1 mx-[-6.1rem]"><span class="font-semibold">Total: </span>₱ 101,000.00 </div>

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
                    <div class="w-full h-96 overflow-y-auto mb-5" id="orders-container"">
                            <ul class=" w-full flex flex-col items-center">
                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId1" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId1">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-xs">754321569</li>
                                    <li class="w-2/12 text-center text-xs">9/1/2023</li>
                                    <li class="w-3/12 text-center text-xs">Leroy Johnston</li>
                                    <li class="w-2/12 text-center text-xs flex justify-center items-center">
                                        <svg fill="#000000" height="20px" width="20px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 235.319 235.319" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 235.319 235.319">
                                            <g>
                                                <path d="m201.094,29.997c2.649-0.623 4.623-2.996 4.623-5.835v-18.162c0-3.313-2.687-6-6-6h-164.114c-3.313,0-6,2.687-6,6v18.163c0,2.839 1.974,5.212 4.623,5.835 1.812,32.314 18.594,61.928 45.682,80.076l11.324,7.586-11.324,7.586c-27.089,18.147-43.871,47.762-45.682,80.076-2.649,0.623-4.623,2.996-4.623,5.835v18.163c0,3.313 2.687,6 6,6h164.114c3.313,0 6-2.687 6-6v-18.163c0-2.839-1.974-5.212-4.623-5.835-1.812-32.314-18.594-61.928-45.683-80.076l-11.324-7.586 11.324-7.586c27.089-18.148 43.871-47.763 45.683-80.077zm-159.491-17.997h152.114v6.163h-152.114v-6.163zm152.114,211.319h-152.114v-6.163h152.114v6.163zm-63.749-110.644c-1.663,1.114-2.661,2.983-2.661,4.985s0.998,3.871 2.661,4.985l18.765,12.571c23.71,15.883 38.49,41.705 40.333,69.941h-142.812c1.843-28.235 16.623-54.057 40.333-69.941l18.765-12.571c1.663-1.114 2.661-2.983 2.661-4.985s-0.998-3.871-2.661-4.985l-18.765-12.571c-23.71-15.884-38.49-41.706-40.333-69.941h142.812c-1.843,28.236-16.623,54.057-40.333,69.941l-18.765,12.571z" />
                                                <path d="m133.307,82.66h-31.295c-2.487,0-4.717,1.535-5.605,3.858-0.888,2.324-0.25,4.955 1.604,6.613l15.647,14c1.139,1.019 2.57,1.528 4,1.528s2.862-0.509 4-1.528l15.647-14c1.854-1.659 2.492-4.29 1.604-6.613-0.885-2.323-3.115-3.858-5.602-3.858z" />
                                                <path d="m117.414,140.581l-15.218,9.775c-13.306,8.914-21.292,23.876-21.292,39.892h76.511c0-16.016-7.986-30.978-21.292-39.892l-15.218-9.775c-1.074-0.644-2.416-0.644-3.491,0z" />
                                            </g>
                                        </svg>
                                    </li>
                                    <li class="w-3/12 text-center text-xs">₱ 18,000.00</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId2" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId2">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-xs">ID</li>
                                    <li class="w-2/12 text-center text-xs">Date</li>
                                    <li class="w-3/12 text-center text-xs">Customer</li>
                                    <li class="w-2/12 text-center text-xs flex justify-center items-center">
                                        <svg height="20px" viewBox="0 0 24 24" width="20px" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="#141414" fill-rule="nonzero">
                                                <path d="m12 22c5.5228475 0 10-4.4771525 10-10s-4.4771525-10-10-10-10 4.4771525-10 10 4.4771525 10 10 10zm0 2c-6.627417 0-12-5.372583-12-12s5.372583-12 12-12 12 5.372583 12 12-5.372583 12-12 12z" />
                                                <path d="m9.20710678 16.2071068c-.39052429.3905243-1.02368927.3905243-1.41421356 0s-.39052429-1.0236893 0-1.4142136l6.99999998-6.99999998c.3905243-.39052429 1.0236893-.39052429 1.4142136 0s.3905243 1.02368927 0 1.41421356z" />
                                                <path d="m7.79289322 9.20710678c-.39052429-.39052429-.39052429-1.02368927 0-1.41421356s1.02368927-.39052429 1.41421356 0l7.00000002 6.99999998c.3905243.3905243.3905243 1.0236893 0 1.4142136s-1.0236893.3905243-1.4142136 0z" />
                                            </g>
                                        </svg>
                                    </li>
                                    <li class="w-3/12 text-center text-xs">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId3" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId3">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-xs">ID</li>
                                    <li class="w-2/12 text-center text-xs">Date</li>
                                    <li class="w-3/12 text-center text-xs">Customer</li>
                                    <li class="w-2/12 text-center text-xs flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512" height="20px" width="20px">
                                            <path fill-rule="nonzero" d="M255.99 0c70.68 0 134.7 28.66 181.02 74.98C483.33 121.3 512 185.31 512 256c0 70.68-28.67 134.69-74.99 181.01C390.69 483.33 326.67 512 255.99 512S121.3 483.33 74.98 437.01C28.66 390.69 0 326.68 0 256c0-70.67 28.66-134.7 74.98-181.02C121.3 28.66 185.31 0 255.99 0zm77.4 269.81c13.75-8.88 13.7-18.77 0-26.63l-110.27-76.77c-11.19-7.04-22.89-2.9-22.58 11.72l.44 154.47c.96 15.86 10.02 20.21 23.37 12.87l109.04-75.66zm79.35-170.56c-40.1-40.1-95.54-64.92-156.75-64.92-61.21 0-116.63 24.82-156.74 64.92-40.1 40.11-64.92 95.54-64.92 156.75 0 61.22 24.82 116.64 64.92 156.74 40.11 40.11 95.53 64.93 156.74 64.93 61.21 0 116.65-24.82 156.75-64.93 40.11-40.1 64.93-95.52 64.93-156.74 0-61.22-24.82-116.64-64.93-156.75z" />
                                        </svg>

                                    </li>
                                    <li class="w-3/12 text-center text-xs">Total</li>
                                </ul>
                            </label>
                        </li>

                        {{-- Single Unit of Product --}}
                        <li class="w-full flex justify-center select-none px-2">
                            {{-- Product Details --}}
                            <input class="widenWhenSelected" hidden type="radio" id="productId4" name="productList">
                            <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center" for="productId4">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-xs">ID</li>
                                    <li class="w-2/12 text-center text-xs">Date</li>
                                    <li class="w-3/12 text-center text-xs">Customer</li>
                                    <li class="w-2/12 text-center text-xs">Status</li>
                                    <li class="w-3/12 text-center text-xs">Total</li>
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
    <script>

    </script>
    </div>
</x-app-layout>