<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">
            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1
                    class="ms-3 md:me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Online <br class="block sm:hidden" />Transactions
                </h1>
                <livewire:search-transaction />
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="hidden lg:block w-4/5 h-full px-3">
                    <livewire:online-transaction-details transaction="0" />
                </div>

            </div>
            {{-- Right Panel border-2 border-black --}}
            <div class="w-full lg:w-2/4 h-full text-right flex">
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

                    <livewire:online-transaction-list />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
