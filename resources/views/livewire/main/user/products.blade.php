<x-app-layout>
    {{-- Showing USER PRODUCTS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">
            <div class="mt-3">
                <h1
                    class="ms-2 md:me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Products
                </h1>
            </div>



            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">

                <livewire:search-product />
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Main List --}}
                <div class="w-full h-full px-3">
                    <div class="w-full h-full text-right flex">
                        <div class="w-full h-full flex flex-col">
                            <livewire:main.user.livewire.user-products />
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Overlays --}}
    <livewire:main.user.livewire.product-details />
    <livewire:main.user.livewire.order-notification />

</x-app-layout>
