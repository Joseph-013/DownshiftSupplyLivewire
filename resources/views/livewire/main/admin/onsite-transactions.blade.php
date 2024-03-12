<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1
                    class="ms-3 md:me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Onsite <br class="block sm:hidden" />Transactions
                </h1>
                <div class="flex-1">
                    <form id="searchForm" action="{{ route('admin.onsitetransactions.search') }}" method="GET"
                        class="flex flex-row">
                        <div class="mx-2 flex flex-row w-full">
                            <input name="search" id="searchInput"
                                class="flex-1 focus:border-orange-500 outline-none rounded-s-lg border-gray-500 border-l-2 border-t-2 border-b-2 border-e-0 h-full w-full"
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
                        <button type="button"
                            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg
                                class="svg-icon sm:mr-1"
                                style="width: 1.2em; height: 1.2em; fill: currentColor;overflow: hidden;"
                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M859.02 234.524l0.808-0.756 0.749-0.813c27.047-29.356 33.876-70.34 17.823-106.957-15.942-36.366-50.416-58.957-89.968-58.957H163.604c-38.83 0-73.043 22.012-89.29 57.444-16.361 35.683-10.632 76.301 14.949 106.004l0.97 1.126 280.311 266.85 2.032 312.074c0.107 16.502 13.517 29.805 29.995 29.805l0.2-0.001c16.568-0.107 29.912-13.626 29.804-30.194l-2.198-337.564-296.478-282.241c-9.526-11.758-11.426-26.933-5.044-40.851 6.446-14.059 19.437-22.452 34.75-22.452h624.828c15.6 0 28.69 8.616 35.017 23.047 6.31 14.391 3.924 29.831-6.354 41.497l-304.13 284.832 1.302 458.63c0.047 16.54 13.469 29.916 29.998 29.915h0.087c16.568-0.047 29.962-13.517 29.915-30.085L573.04 502.36l285.98-267.836z"
                                    fill="" />
                                <path
                                    d="M657.265 595.287c0 16.498 13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.498 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997H687.262c-16.498 0-29.997 13.499-29.997 29.997z m273.894 138.882H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z m0 168.878H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z"
                                    fill="" />
                            </svg>
                            <span class="hidden md:inline">Filters</span>
                        </button>
                        <button
                            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg
                                class="feather feather-search" fill="none" height="18" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" x2="16.65" y1="21" y2="16.65" />
                            </svg>
                            <span class="hidden md:inline">Search</span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="wifull lg:w-2/5 h-full px-3 hidden lg:block">
                    {{-- <div class="w-full h-full text-right flex flex-col"> --}}
                    <div class="w-full h-full text-right flex flex-col">
                        <div class="w-full flex-row px-5">
                            <ul class="flex flex-row w-full">
                                <li class="w-full text-center text-sm font-semibold">Overview</li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        {{-- Products List  --}}
                        <livewire:onsite-transaction-details transId="{{ 0 }}" />
                    </div>
                    {{-- </div> --}}

                </div>
                {{-- Right Panel border-2 border-black --}}
                <div class="w-full lg:w-3/5 h-full text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row px-5">
                            <ul class="flex flex-row w-full">
                                <li class="w-3/12 text-center text-sm">ID</li>
                                <li class="w-3/12 text-center text-sm">Date</li>
                                <li class="w-3/12 text-center text-sm">Customer</li>
                                <li class="w-3/12 text-center text-sm">Total</li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        {{-- Products List  --}}
                        <livewire:onsite-transaction-list :transactions="$transactions" />
                        <div class="w-full text-center">Pagination</div>
                        <div class="w-full mt-5 flex justify-center">
                            <button onclick="window.location='{{ route('admin.createtransactions') }}'"
                                class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                                New Transaction
                                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                                    <path
                                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Products --}}
                </div>

            </div>

        </div>
    </div>
    <script>
        document.getElementById("searchInput").addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                document.getElementById("searchForm").submit();
            }
        });
    </script>
</x-app-layout>
