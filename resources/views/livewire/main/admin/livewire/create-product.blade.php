<form wire:submit.prevent="createProduct">
    <div class="columns-2">
        <div class="p-2">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Preview" style="max-height: 200px;">
            @else
                <img src="https://via.placeholder.com/640x480.png/000000?text=No+Image+Available"
                    alt="No Image Available">
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
            <label for="productImage" class="block text-sm font-medium text-gray-700">Upload Image (JPG or PNG
                only)</label>
            <input type="file" wire:model="image" id="productImage" accept=".jpg, .jpeg, .png" required>
            @error('image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex w-full py-2">
            <label class="w-1/4 h-10 flex items-center">Name:</label>
            <input wire:model="name" class="w-3/4 h-10 flex items-center" type="text" value="" required>
        </div>
        <x-input-error :messages="$errors->get('name')" class="text-center" />
        <div class="flex w-full py-2">
            <label class="w-1/4 h-10 flex items-center">Price:</label>
            <input wire:model="price" class="w-3/4 h-10 flex items-center" type="text" value="" required
            oninput="this.value = this.value.replace(/[^\d.]/g, '').replace(/(\..*)\./g, '$1').replace(/^(\d*\.\d{2}).*$/, '$1');">
        </div>
        <div class="flex w-full py-2">
            <label class="w-1/4 h-10 flex items-center">Remaining:</label>
            <input wire:model="stockquantity" class="w-1/4 h-10 flex items-center" type="text" value=""
                required oninput="this.value = this.value.replace(/[^0-9]/g, '');" pattern="[0-9]*">
            <label class="w-1/4 h-10 flex items-center justify-center">Crit. Level:</label>
            <input wire:model="criticallevel" class="w-1/4 h-10 flex items-center" type="text" required
            oninput="this.value = this.value.replace(/[^0-9]/g, '');" pattern="[0-9]*">
        </div>
        <div class="w-full mt-3 flex flex-row justify-center">
            <button type="submit"
                class="w-1/2 h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-gray-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing mb-2">
                Cancel
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash-circle ml-2" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708"/>
</svg>
            </button>

            <button type="submit"
                class="w-1/2 h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-blue-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing mb-2">
                Save
                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
            <path d="M11 2H9v3h2z" />
            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
        </svg>
            </button>
        </div>
    </div>
</form>
