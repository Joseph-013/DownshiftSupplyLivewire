<div class="border-black border-1 w-full rounded-lg">
    @if ($selectedProduct)
        {{-- Top --}}
        <form wire:submit.prevent class="h-full w-full" enctype="multipart/form-data">
            <div class="columns-2">
                <div class="p-2">
                    <img src="{{ $newlyUploadedImage ? $newImage->temporaryUrl() : (filter_var($selectedProduct->image, FILTER_VALIDATE_URL) ? $selectedProduct->image : asset('storage/assets/' . $selectedProduct->image)) }}"
                        alt="{{ $selectedProduct->name }}" style="max-height: 200px;">
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
                @if ($confirmDelete && !$confirmUpdate)
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
                        <!-- Semi-transparent overlay -->
                        <div class="absolute inset-0 bg-black opacity-50"></div>

                        <!-- Confirmation prompt -->
                        <div class="bg-gray-100 p-6 rounded-lg relative z-10 border">
                            <p class="text-xs text-gray-800 mb-4 font-medium">Are you sure you want to delete this
                                product?</p>
                            <div class="flex justify-end">
                                <button type="button" wire:click="deleteProduct"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md mr-2">Yes</button>
                                <button type="button" wire:click="$set('confirmDelete', false)"
                                    class="px-4 py-2 bg-gray-400 text-white rounded-md">No</button>
                            </div>
                        </div>
                    </div>
                @elseif($confirmUpdate && !$confirmDelete)
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                        <!-- Semi-transparent overlay -->
                        <div class="absolute inset-0 bg-black opacity-50"></div>

                        <!-- Confirmation prompt -->
                        <div class="bg-gray-100 p-6 rounded-lg relative z-10">
                            <p class="text-xs text-gray-800 mb-4 font-medium">Are you sure you want to update this
                                product?</p>
                            <div class="flex justify-end">
                                <button type="button" wire:click="updateProduct"
                                    class="px-4 py-2 bg-sky-600 text-white rounded-md mr-2">Yes</button>
                                <button type="button" wire:click="$set('confirmUpdate', false)"
                                    class="px-4 py-2 bg-gray-400 text-white rounded-md">No</button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="text-sm h-min mt-2">
                    <label for="productImage" class="block text-sm font-medium text-gray-700">Upload Image (JPG or PNG
                        only)</label>
                    <input type="file" wire:model="newImage" id="productImage" accept=".jpg, .jpeg, .png">
                    @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex w-full py-2">
                    <label class="w-1/4 h-10 flex items-center">Name:</label>
                    <input wire:model="newName" class="w-3/4 h-10 flex items-center" type="text"
                        value="{{ $selectedProduct->name }}">
                </div>
                <div class="flex w-full py-2">
                    <label class="w-1/4 h-10 flex items-center">Price:</label>
                    <input wire:model="newPrice" class="w-3/4 h-10 flex items-center" type="text"
                        value="{{ $selectedProduct->price }}"
                        oninput="this.value = this.value.replace(/[^\d.]/g, '').replace(/(\..*)\./g, '$1').replace(/^(\d*\.\d{2}).*$/, '$1');">
                </div>
                <div class="flex w-full py-2">
                    <label class="w-1/4 h-10 flex items-center">Remaining:</label>
                    <input wire:model="newStockquantity" class="w-1/4 h-10 flex items-center" type="text"
                        value="{{ $selectedProduct->stockquantity }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" pattern="[0-9]*">
                    <label class="w-1/4 h-10 flex items-center justify-center">Crit. Level:</label>
                    <input wire:model="newCriticallevel" class="w-1/4 h-10 flex items-center" type="text"
                        value="{{ $selectedProduct->criticallevel }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" pattern="[0-9]*">
                </div>
                <div class="flex w-full py-2 mt-4 relative">
                    <button wire:click="deleteConfirm" type="submit" @if ($confirmDelete || $confirmUpdate) disabled @endif
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Delete
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                        </svg>
                    </button>
                    <button wire:click="updateConfirm" type="submit" @if ($confirmDelete || $confirmUpdate) disabled @endif
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Update
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                            <path d="M11 2H9v3h2z" />
                            <path
                                d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                        </svg>
                    </button>
                </div>


            </div>
        </form>
    @else
        <livewire:create-product />
    @endif
</div>

<script>
    document.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
</script>
