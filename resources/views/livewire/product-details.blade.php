<div class="border-black border-1 w-full rounded-lg">
    @if ($selectedProduct)
        {{-- Top --}}
        <div class="columns-2">
            <div class="p-2">
                <img src="{{ $selectedProduct->image }}">
            </div>
            <div class="p-2 flex flex-col h-full justify-center">
                <div class="text-sm h-min">
                    Item ID: {{ $selectedProduct->id }}
                </div>
                <div class="text-sm h-min">
                    Name: {{ $selectedProduct->name }}
                </div>
                <div class="text-sm h-min">
                    Price: ₱ {{ number_format($selectedProduct->price, 2) }}
                </div>
                <div class="text-sm h-min">
                    Remaining: {{ $selectedProduct->stockquantity }} left
                </div>
            </div>
        </div>
        {{-- Bottom --}}
        <div class="px-2 w-full">
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Name:</label>
                <input class="w-3/4 h-10 flex items-center" type="text" value="{{ $selectedProduct->name }}">
            </div>
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Price:</label>
                <input class="w-3/4 h-10 flex items-center" type="number" value="{{ $selectedProduct->price }}">
            </div>
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Remaining:</label>
                <input class="w-1/4 h-10 flex items-center" type="number"
                    value="{{ $selectedProduct->stockquantity }}">
                <label class="w-1/4 h-10 flex items-center justify-center">Crit. Level:</label>
                <input class="w-1/4 h-10 flex items-center" type="number" value="5">
            </div>
            <div class="flex w-full py-2 mt-4">
                <button type="submit"
                    class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                    Delete
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path
                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                    </svg>
                </button>
                <button type="submit"
                    class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                    Save
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                        <path d="M11 2H9v3h2z" />
                        <path
                            d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                    </svg>
                </button>
            </div>
        </div>
    @else
        {{-- Top --}}
        <div class="columns-2">
            <div class="p-2">
                <img src="https://via.placeholder.com/640x480.png/000000?text=No+Image+Available">
            </div>
            <div class="p-2 flex flex-col h-full justify-center">
                <div class="text-lg h-min">
                    No Item Selected
                </div>
            </div>
        </div>
        {{-- Bottom --}}
        <div class="px-2 w-full">
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Name:</label>
                <input class="w-3/4 h-10 flex items-center" type="text" value="">
            </div>
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Price:</label>
                <input class="w-3/4 h-10 flex items-center" type="number" value="">
            </div>
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Remaining:</label>
                <input class="w-1/4 h-10 flex items-center" type="number" value="">
                <label class="w-1/4 h-10 flex items-center justify-center">Crit. Level:</label>
                <input class="w-1/4 h-10 flex items-center" type="number" value="5">
            </div>
            <div class="flex w-full py-2 mt-4">
                <button type="submit"
                    class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                    Delete
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path
                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                    </svg>
                </button>
                <button type="submit"
                    class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                    Save
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                        <path d="M11 2H9v3h2z" />
                        <path
                            d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
</div>
