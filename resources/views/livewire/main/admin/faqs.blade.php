<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    FAQs
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="w-2/5 h-full px-3">
                    <div class="w-full h-full"> {{-- Not part of a livewire component. --}}
                        {{-- Left Main Container --}}
                        <livewire:faq-details />
                    </div>

                </div>
                {{-- Right Panel border-2 border-black --}}
                <div class="w-3/5 h-full px-3 text-right flex">
                    <div class="w-full h-full px-4 flex flex-col">
                        <div class="w-full flex-row">
                            <ul class="flex flex-row w-full">
                                <li class="w-full text-center text-sm">Questions</li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        {{-- Products List  --}}
                        <livewire:faq-list />
                    </div>
                    {{-- Products --}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
