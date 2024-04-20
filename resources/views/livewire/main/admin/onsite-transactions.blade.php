<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1
                    class="ms-3 md:me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Onsite <br class="block sm:hidden" />Transactions
                </h1>
                <livewire:search-transaction />
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

                        {{-- Products List  --}}
                        <livewire:onsite-transaction-list />

                    </div>

                    {{-- Products --}}
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
