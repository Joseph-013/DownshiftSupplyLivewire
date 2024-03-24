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
                        {{-- Products List  --}}
                        <livewire:onsite-transaction-details />
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
                        <livewire:onsite-transaction-list />

                    </div>

                    {{-- Products --}}
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
