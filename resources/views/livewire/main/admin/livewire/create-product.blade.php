<div>
<div class="columns-2">
            <div class="p-2">
                @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Preview">
                @else
                <img src="https://via.placeholder.com/640x480.png/000000?text=No+Image+Available" alt="No Image Available">
                @endif
            </div>
            <div class="p-2 flex flex-col h-full justify-center">
                <div class="text-lg h-min">
                    No Item Selected
                </div>
            </div>
        </div>
        {{-- Bottom --}}
        <div class="px-2 w-full">
            <div class="text-sm h-min mt-2">
                <label for="productImage" class="block text-sm font-medium text-gray-700">Upload Image (JPG or PNG only)</label>
                <input type="file" wire:model="image" id="productImage" accept=".jpg, .jpeg, .png">
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Name:</label>
                <input wire:model="name" class="w-3/4 h-10 flex items-center" type="text" value="">
            </div>
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Price:</label>
                <input wire:model="price" class="w-3/4 h-10 flex items-center" type="number" value="">
            </div>
            <div class="flex w-full py-2">
                <label class="w-1/4 h-10 flex items-center">Remaining:</label>
                <input wire:model="stockquantity" class="w-1/4 h-10 flex items-center" type="number" value="">
                <label class="w-1/4 h-10 flex items-center justify-center">Crit. Level:</label>
                <input wire:model="criticallevel" class="w-1/4 h-10 flex items-center" type="number">
            </div>
            <div class="w-full mt-3 flex justify-center">
                <button wire:click="createProduct" type="submit"
                    class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing mb-2">
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
        </div>
</div>