<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1
                    class="ms-3 md:me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Inventory
                </h1>
                <livewire:search-inventory />
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="hidden lg:block w-4/12 h-full px-3">
                    <div class="w-full h-full">
                        {{-- Left Main Container --}}
                        <livewire:product-details productId="0" />
                    </div>
                </div>
                {{-- Right Panel border-2 border-black --}}
                <div class="w-full lg:w-8/12 h-full px-3 text-right flex">
                    <div class="w-full h-full px-4 flex flex-col">

                        {{-- Products List  --}}
                        <livewire:product-list />
                    </div>
                    {{-- Products --}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
