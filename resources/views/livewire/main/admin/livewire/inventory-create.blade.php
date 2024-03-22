<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
    <div class="absolute inset-0 bg-black opacity-50" wire:click="dispatch('hideItemTemplate')"></div>
    <div class="bg-gray-100 p-6 rounded-lg relative z-10 border" id="itemTemplate">
        <div style="display:flex; justify-content: center; align-items: center;">
            @if ($temporaryImage)
                <img src="{{ $temporaryImage->temporaryUrl() }}" alt="Preview" class="rounded-md object-cover"
                    style="max-height: 200px;" />
            @else
                <img src="{{ isset($image) ? (filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('storage/assets/' . $image)) : 'https://via.placeholder.com/350x200.png/000000?text=...' }}"
                    class="rounded-md object-cover" style="max-height: 200px;" />
            @endif
        </div>
        {{-- @if (!isset($product)) --}}
        <form
            @if ($product) wire:submit.prevent="editProduct"
            @else
                wire:submit.prevent="createProduct" @endif
            class="h-full w-full flex flex-col">
            <table class="w-full">
                <tr class="h-14">
                    <th colspan="2" class="text-center font-semibold">Item Details</th>
                </tr>
                <tr>
                    <td class="h-11 mt-3" colspan="2"><input wire:model="image" type="file"
                            @if (!$product) required @endif></td>
                </tr>
                <tr class="h-11">
                    <td class="pe-3">Name:</td>
                    <td><input wire:model="name" type="text" class="rounded-lg h-9 w-full" required></td>
                </tr>
                <tr class="h-11">
                    <td class="pe-3">Description:</td>
                    <td>
                        <textarea name="" id="" rows="5" class="rounded-lg w-full"></textarea>
                        {{-- <input wire:model="name" type="text" class="rounded-lg h-9" required> --}}
                    </td>
                </tr>
                <tr class="h-11">
                    <td class="pe-3">Price:</td>
                    <td><input wire:model="price" type="number" step="any" class="rounded-lg h-9 w-full" required>
                    </td>
                </tr>
                <tr class="h-11">
                    <td class="pe-3">Stocks:</td>
                    <td><input wire:model="stockquantity" type="number" class="rounded-lg h-9 w-full" required></td>
                </tr>
                <tr class="h-11">
                    <td class="pe-3">Critical Level:</td>
                    <td><input wire:model="criticallevel" type="number" class="rounded-lg h-9 w-full" required></td>
                </tr>
            </table>
            <div class="columns-2 mt-2">
                <div class="flex justify-center">
                    <button type="button" wire:click="cancel"
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Cancel
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Save
                        <svg class="ml-2"xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                            <path d="M11 2H9v3h2z" />
                            <path
                                d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        {{-- @endif --}}

    </div>
</div>
