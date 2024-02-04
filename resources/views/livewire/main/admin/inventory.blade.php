<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Inventory
                </h1>
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
                {{-- Left Panel --}}
                <div class="w-2/5 h-full px-3">
                    <form class="w-full h-full">
                        {{-- Left Main Container --}}
                        <div class="border-black border-1 w-full rounded-lg">

                            {{-- Top --}}
                            <livewire:product-details />






                            {{-- Bottom --}}
                            <div class="px-2 w-full">

                                <div class="flex w-full py-2">
                                    <label class="w-1/4 h-10 flex items-center">Name:</label>
                                    <input class="w-3/4 h-10 flex items-center" type="text"
                                        value="BC Racing V1 Series Coilovers">
                                </div>
                                <div class="flex w-full py-2">
                                    <label class="w-1/4 h-10 flex items-center">Price:</label>
                                    <input class="w-3/4 h-10 flex items-center" type="number" value="38000">
                                </div>
                                <div class="flex w-full py-2">
                                    <label class="w-1/4 h-10 flex items-center">Remaining:</label>
                                    <input class="w-1/4 h-10 flex items-center" type="number" value="23">
                                    <label class="w-1/4 h-10 flex items-center justify-center">Crit. Level:</label>
                                    <input class="w-1/4 h-10 flex items-center" type="number" value="5">
                                </div>
                                <div class="flex w-full py-2 mt-4">
                                    <button type="submit"
                                        class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                                        Delete
                                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>
                                    <button type="submit"
                                        class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                                        Save
                                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                            <path d="M11 2H9v3h2z" />
                                            <path
                                                d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 flex justify-center">
                            <button type="reset"
                                class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                                Create Item
                                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                                    <path
                                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                </svg>
                            </button>
                        </div>
                    </form>

                </div>
                {{-- Right Panel border-2 border-black --}}
                <div class="w-3/5 h-full px-3 text-right flex">
                    <div class="w-full h-full px-4 flex flex-col">
                        <div class="w-full flex-row">
                            <ul class="flex flex-row w-full">
                                <li class="w-7/12 text-center text-sm">Item Name</li>
                                <li class="w-2/12 text-center text-sm">Remaining</li>
                                <li class="w-3/12 text-center text-sm">Price</li>
                            </ul>
                        </div>
                        <hr class="my-1">

                        {{-- Products List  --}}
                        <livewire:product-list />
                    </div>
                    {{-- Products --}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
