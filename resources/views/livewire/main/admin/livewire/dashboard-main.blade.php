<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    {{-- <div class="w-screen h-full"> --}}
    <div class="w-screen">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full"> --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Dashboard
                </h1>

            </div>

            {{-- Content --}}
            <div class="w-full grid grid-cols-3 gap-6">

                <livewire:main.admin.livewire.components-dashboard.lowstock />
                <livewire:main.admin.livewire.components-dashboard.outstock />
                <livewire:main.admin.livewire.components-dashboard.most-sold />
                <div class="col-span-2">
                    graph to later
                    <livewire:main.admin.livewire.components-dashboard.most-sold />
                </div>
                {{-- <livewire:main.admin.livewire.components-dashboard.least-sold /> --}}

            </div>


        </div>
    </div>
</x-app-layout>
