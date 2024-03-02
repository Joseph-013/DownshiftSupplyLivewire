<x-app-layout>
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Reports
                </h1>
            </div>
            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3 my-3">
                {{-- Left Panel --}}
                <div class="w-2/5 h-full px-3">
                    <div class="w-full h-full text-right flex">
                        <div class="w-full h-full flex flex-col">
                            <livewire:main.admin.livewire.report-setup />
                        </div>
                    </div>
                </div>
                {{-- Right Panel border-2 border-black --}}
                <div class="w-3/5 h-full text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="flex flex-row w-full font-medium">Daily Report Preview</div>
                        <div class="w-full flex-row px-1 my-2 text-xs font-light">
                            <livewire:main.admin.livewire.report-table />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
