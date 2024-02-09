<x-app-layout>
    {{-- Showing USER PRODUCTS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">
            <div class="mt-3">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Products
                </h1>
            </div>
            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">


                <div class="flex-1">
                    <form class="flex flex-row">
                        <div class="mx-2 flex flex-row w-full">
                            <input
                                class="flex-1 focus:border-orange-500 outline-none rounded-s-lg border-gray-500 border-l-2 border-t-2 border-b-2 border-e-0 h-full"
                                type="text" />
                            <button type="clear"
                                class="rounded-e-lg border-gray-500 border-r-2 border-t-2 border-b-2 h-full w-10 flex items-center justify-center">
                                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                </svg>
                            </button>
                        </div>
                        <button
                            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200">Filters</button>
                        <button
                            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200">Search</button>
                    </form>
                </div>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Main List --}}
                <div class="w-full h-full px-3 overflow-y-auto" id="questions-container">
                    <div class="w-full h-full text-right flex">
                        <div class="w-full h-full flex flex-col">
                            <livewire:main.user.livewire.user-products />

                            {{--
                            <ul class="flex flex-row w-full">

                                <li class="w-3/12 px-2 text-left text-sm">
                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                        class="w-30 h-30 rounded-lg border-gray-500 border-1">
                                    <div class="w-full h-10 flex items-center">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-3/4 px-2 text-left text-sm">
                                                <div class="text-left text-sm mt-4">
                                                    BC Racing V1 Series Coilovers for EG/EK
                                                </div>
                                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                                    ₱ 28,500.00
                                                </div>
                                            </li>
                                            <li class="w-1/4 text-left text-sm mt-4 flex justify-center">
                                                <svg class="svg-icon mt-3"
                                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                                    viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="w-3/12 px-2 text-left text-sm">
                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                        class="w-30 h-30 rounded-lg border-gray-500 border-1">
                                    <div class="w-full h-10 flex items-center">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-3/4 px-2 text-left text-sm">
                                                <div class="text-left text-sm mt-4">
                                                    BC Racing V1 Series Coilovers for EG/EK
                                                </div>
                                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                                    ₱ 28,500.00
                                                </div>
                                            </li>
                                            <li class="w-1/4 text-left text-sm mt-4 flex justify-center">
                                                <svg class="svg-icon mt-3"
                                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                                    viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="w-3/12 px-2 text-left text-sm">
                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                        class="w-30 h-30 rounded-lg border-gray-500 border-1">
                                    <div class="w-full h-10 flex items-center">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-3/4 px-2 text-left text-sm">
                                                <div class="text-left text-sm mt-4">
                                                    BC Racing V1 Series Coilovers for EG/EK
                                                </div>
                                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                                    ₱ 28,500.00
                                                </div>
                                            </li>
                                            <li class="w-1/4 text-left text-sm mt-4 flex justify-center">
                                                <svg class="svg-icon mt-3"
                                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                                    viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="w-3/12 px-2 text-left text-sm">
                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                        class="w-30 h-30 rounded-lg border-gray-500 border-1">
                                    <div class="w-full h-10 flex items-center">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-3/4 px-2 text-left text-sm">
                                                <div class="text-left text-sm mt-4">
                                                    BC Racing V1 Series Coilovers for EG/EK
                                                </div>
                                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                                    ₱ 28,500.00
                                                </div>
                                            </li>
                                            <li class="w-1/4 text-left text-sm mt-4 flex justify-center">
                                                <svg class="svg-icon mt-3"
                                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                                    viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                            <ul class="flex flex-row w-full mt-5">

                                <li class="w-3/12 px-2 text-left text-sm">
                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                        class="w-30 h-30 rounded-lg border-gray-500 border-1">
                                    <div class="w-full h-10 flex items-center">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-3/4 px-2 text-left text-sm">
                                                <div class="text-left text-sm mt-4">
                                                    BC Racing V1 Series Coilovers for EG/EK
                                                </div>
                                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                                    ₱ 28,500.00
                                                </div>
                                            </li>
                                            <li class="w-1/4 text-left text-sm mt-4 flex justify-center">
                                                <svg class="svg-icon mt-3"
                                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                                    viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="w-3/12 px-2 text-left text-sm">
                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                        class="w-30 h-30 rounded-lg border-gray-500 border-1">
                                    <div class="w-full h-10 flex items-center">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-3/4 px-2 text-left text-sm">
                                                <div class="text-left text-sm mt-4">
                                                    BC Racing V1 Series Coilovers for EG/EK
                                                </div>
                                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                                    ₱ 28,500.00
                                                </div>
                                            </li>
                                            <li class="w-1/4 text-left text-sm mt-4 flex justify-center">
                                                <svg class="svg-icon mt-3"
                                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                                    viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="w-3/12 px-2 text-left text-sm">
                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                        class="w-30 h-30 rounded-lg border-gray-500 border-1">
                                    <div class="w-full h-10 flex items-center">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-3/4 px-2 text-left text-sm">
                                                <div class="text-left text-sm mt-4">
                                                    BC Racing V1 Series Coilovers for EG/EK
                                                </div>
                                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                                    ₱ 28,500.00
                                                </div>
                                            </li>
                                            <li class="w-1/4 text-left text-sm mt-4 flex justify-center">
                                                <svg class="svg-icon mt-3"
                                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                                    viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="w-3/12 px-2 text-left text-sm">
                                    <img src="{{ asset('assets/BC Racing M1 Series.png') }}"
                                        class="w-30 h-30 rounded-lg border-gray-500 border-1">
                                    <div class="w-full h-10 flex items-center">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-3/4 px-2 text-left text-sm">
                                                <div class="text-left text-sm mt-4">
                                                    BC Racing V1 Series Coilovers for EG/EK
                                                </div>
                                                <div class="mt-2 text-left text-sm mb-[-1rem]">
                                                    ₱ 28,500.00
                                                </div>
                                            </li>
                                            <li class="w-1/4 text-left text-sm mt-4 flex justify-center">
                                                <svg class="svg-icon mt-3"
                                                    style="width: 2.5em; height: 2.5em; vertical-align: middle; fill: #fb923c; overflow: hidden;"
                                                    viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 96C282.2 96 96 282.2 96 512s186.2 416 416 416 416-186.2 416-416S741.8 96 512 96z m181 448H544v149c0 17.6-14.4 32-32 32-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6V544h-149c-8.8 0-16.8-3.6-22.6-9.4-5.8-5.8-9.4-13.8-9.4-22.6 0-17.6 14.4-32 32-32H480v-149c0-17.6 14.4-32 32-32s32 14.4 32 32V480h149c17.6 0 32 14.4 32 32s-14.4 32-32 32z" />
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul> --}}




                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
