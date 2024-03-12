<x-app-layout>
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto px-3 lg:px-6 flex flex-col h-full">
            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4 ml-4 md:ml-0">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Reports
                </h1>
            </div>
            {{-- Content --}}
            <div class="flex flex-col md:flex-row flex-1 w-full -mx-3 my-3">
                {{-- Left Panel --}}
                <div class="w-full md:w-4/12 px-3">
                    <div class="w-full h-full text-right flex justify-center">
                        <livewire:main.admin.livewire.report-setup />
                    </div>
                </div>
                {{-- Right Panel border-2 border-black --}}
                <div class="w-full md:w-8/12 h-full text-right flex">
                    <div class="w-full h-full flex-row px-1 m-2">
                        <livewire:main.admin.livewire.report-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
