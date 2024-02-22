<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    FAQs
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full mx-3">
                {{-- Right Panel border-2 border-black --}}
                <div class="w-full h-full text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row">
                            <!-- QUESTIONS AND ANSWERS -->
                            <ul class="flex flex-row w-full my-1">
                                <li class="w-1/4 text-left text-sm ">
                                    <span class="font-medium mt-1">Have some questions?</span> <br>
                                    Find your answers here
                                </li>
                                <li class="w-3/4 h-full px-3 overflow-y-auto border" id="faqs-container">

                                    <livewire:main.user.livewire.user-faqs-qna />

                                </li>
                            </ul>
                            <!-- MAP -->
                            <ul class="flex flex-row w-full my-2">
                                <li class="w-1/4 text-left text-sm ">
                                    <span class="font-medium mt-1">Where can you find us?</span> <br>
                                    Be directed using this map
                                </li>
                                <li class="w-3/4 h-full px-3 border" id="faqs-container">
                                    <!-- MAP API HERE -->
                                </li>
                            </ul>
                            <!-- EMAIL -->
                            <livewire:main.user.livewire.user-faqs-email />

                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
