<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Orders
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                {{-- <livewire:main.user.livewire.user-products /> --}}
                <livewire:main.user.livewire.user-orders-detail />
                {{-- Right Panel border-2 border-black --}}
                <livewire:main.user.livewire.user-orders-list />
            </div>

        </div>
    </div>
</x-app-layout>
