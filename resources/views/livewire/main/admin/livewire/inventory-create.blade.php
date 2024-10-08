<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
    <div class="absolute inset-0 bg-black opacity-50" wire:click="dispatch('hideItemTemplate')"></div>

    @if ($mode == 'read')
        <div class="bg-white z-10 p-3 rounded-lg max-w-80 max-h-[37rem] overflow-y-auto overflow-x-hidden">
            @if ($productImages)
                <div id="inventoryReadCarousel"
                    class="carousel slide d-flex justify-content-center align-items-center w-72" data-ride="carousel">
                    <div class="carousel-inner h-48 rounded-md">
                        @foreach ($productImages as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="rounded-md object-cover max-w-72 mx-auto max-h-48"
                                    src="{{ filter_var($image->image, FILTER_VALIDATE_URL) ? $image->image : asset('storage/assets/' . $image->image) }}"
                                    alt="Product Image {{ $key + 1 }}" style="max-height: 200px;">
                            </div>
                        @endforeach
                    </div>
                    @if (count($productImages) != 1)
                        <button
                            class="carousel-control-prev my-auto h-12 bg-black rounded-full flex justify-center items-center"
                            onclick="prevSlideInvRead()" type="button">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next my-auto h-12 bg-black rounded-full flex justify-center items-center"
                            onclick="nextSlideInvRead()" type="button">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    @endif
                </div>
            @endif
            {{-- <div class="px-3"> --}}
            <table class="w-full text-left">
                <tr class="h-14">
                    <th colspan="2" class="text-center font-semibold">Item Details</th>
                </tr>
                <tr class="h-9">
                    <td class="w-5/12">Item ID:</td>
                    <td class="w-7/12">{{ $id }}</td>
                </tr>
                <tr class="h-9">
                    <td>Name:</td>
                    <td>{{ $name }}</td>
                </tr>
                <tr class="h-9">
                    <td>Price:</td>
                    <td>{{ $price }}</td>
                </tr>
                <tr class="h-9">
                    <td>Category</td>
                    <td>{{ $category }}</td>
                </tr>
                <tr class="h-9">
                    <td>Stocks:</td>
                    <td class="{{ $stockquantity <= $criticallevel ? 'text-red-600 font-semibold' : '' }}">
                        {{ $stockquantity }}
                    </td>
                </tr>
                <tr class="h-9">
                    <td>Critical Level:</td>
                    <td>{{ $criticallevel }}</td>
                </tr>
            </table>
            <div class="columns-2 mt-2">
                <div class="flex justify-center">
                    <button wire:click="deleteConfirm"
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Delete
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-center">
                    <button wire:click="modifyProduct"
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Modify
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                        </svg>
                    </button>
                </div>
            </div>
            @if ($confirmDelete)
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
            @endif
        </div>
    @elseif($mode == 'write')
        <div class="bg-white z-10 p-3 rounded-lg max-w-80 max-h-[37rem] overflow-y-auto overflow-x-hidden" id="itemTemplate" >
            <div style="display:flex; justify-content: center; align-items: center;">
                @if ($this->images)
                    @if ($temporaryImages)
                        <div id="previewCarousel"
                            class="carousel slide d-flex justify-content-center align-items-center w-96"
                            data-ride="carousel">
                            <div class="carousel-inner h-48 rounded-md">
                                @foreach ($temporaryImages as $key => $image)
                                    @if ($image != null)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ $image->temporaryUrl() }}" alt="Preview"
                                                class="rounded-md object-cover max-h-48 mx-auto max-w-96">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @if (count(array_filter($temporaryImages)) != 1)
                                <button
                                    class="carousel-control-prev my-auto h-12 bg-black rounded-full flex justify-center items-center"
                                    onclick="prevSlidePrev()" type="button">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button
                                    class="carousel-control-next my-auto h-12 bg-black rounded-full flex justify-center items-center"
                                    onclick="nextSlidePrev()" type="button">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <img src="https://via.placeholder.com/350x200.png/000000?text=..."
                            class="rounded-md object-cover" style="max-height: 200px;" />
                    @endif
                @elseif($productImages)
                    <div id="inventoryWriteCarousel"
                        class="carousel slide d-flex justify-content-center align-items-center w-96"
                        data-ride="carousel">
                        <div class="carousel-inner h-48 rounded-md">
                            @foreach ($productImages as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                                    <img class="rounded-md object-cover max-w-96 mx-auto max-h-48"
                                        src="{{ filter_var($image->image, FILTER_VALIDATE_URL) ? $image->image : asset('storage/assets/' . $image->image) }}"
                                        alt="Product Image {{ $key + 1 }}">
                                </div>
                            @endforeach
                        </div>
                        @if (count($productImages) != 1)
                            <button
                                class="carousel-control-prev my-auto h-12 bg-black rounded-full flex justify-center items-center"
                                onclick="prevSlideInvWrite()" type="button">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button
                                class="carousel-control-next my-auto h-12 bg-black rounded-full flex justify-center items-center"
                                onclick="nextSlideInvWrite()" type="button">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        @endif
                    </div>
                @endif
            </div>
            {{-- @if (!isset($product)) --}}
            <form
                @if ($product) wire:submit.prevent="editProduct"
                @else
                    wire:submit.prevent="createProduct" @endif
                class="h-full w-full flex flex-col">
                <div class="overflow-y-auto max-w-80">
                    <table class="w-full">
                        <tr class="h-14">
                            <th colspan="2" class="text-center font-semibold">Item Details</th>
                        </tr>
                        @if ($overwrite)
                            @foreach ($images as $index => $image)
                                <tr class="h-11 text-xxs">
                                    <td class="mt-3" colspan="2">
                                        <input wire:model="images.{{ $index }}" type="file"
                                            @if (!$product) required @endif>
                                        <button wire:click="removeImage({{ $index }})" class="ml-2"
                                            type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @error('images.' . $index)
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-red-500">{{ $message }}</span>
                                        </td>
                                    </tr>
                                @enderror
                            @endforeach
                            @if (count($images) < 4)
                                <tr class="h-11 text-center items-center justify-center">
                                    <td colspan="2">
                                        <button type="button" wire:click="addImages"
                                            class="h-10 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing px-2">
                                            Add Image +
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr class="h-11 text-center items-center justify-center">
                                <td colspan="2">
                                    <button type="button" wire:click="setOverwrite"
                                        class="h-10 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing px-2">
                                        Overwrite Images
                                    </button>
                                </td>
                            </tr>
                        @endif
                        <tr class="h-11">
                            <td class="pe-3">Name:</td>
                            <td><input wire:model="name" type="text" class="rounded-lg h-9 w-full" required></td>
                        </tr>
                        <tr class="h-11">
                            <td class="pe-3">Description:</td>
                            <td>
                                <textarea wire:model="description" name="" id="" rows="5" class="rounded-lg w-full"
                                    style="resize: none;"></textarea>
                                {{-- <input wire:model="name" type="text" class="rounded-lg h-9" required> --}}
                            </td>
                        </tr>
                        <tr class="h-11">
                            <td class="pe-3">Price:</td>
                            <td><input wire:model="price" type="number" step="any"
                                    class="rounded-lg h-9 w-full" required>
                            </td>
                        </tr>
                        <tr class="h-11">
                            <td class="pe-3">Category:</td>
                            <td>
                                <select wire:model="category" class="rounded-lg h-10 w-full" required>
                                    @if ($category === null)
                                        <option></option>
                                    @endif
                                    @foreach ($categoryOptions as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr class="h-11">
                            <td class="pe-3">Stocks:</td>
                            <td><input wire:model="stockquantity" type="number" class="rounded-lg h-9 w-full"
                                    min="0" max="999" required>
                            </td>
                        </tr>
                        <tr class="h-11">
                            <td class="pe-3">Critical Level:</td>
                            <td><input wire:model="criticallevel" type="number" class="rounded-lg h-9 w-full"
                                    required>
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    @error('price')
                        <span class="text-red-500 text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    @error('stockquantity')
                        <span class="text-red-500 text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    @error('criticallevel')
                        <span class="text-red-500 text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="columns-2 mt-2">
                    <div class="flex justify-center">
                        <button type="button" wire:click="cancel"
                            class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                            Cancel
                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708" />
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
        </div>
    @endif

<style>
    @media (max-width: 600px) {
            .text-xxs {
                font-size: 0.8rem;
            }
        }
</style>
</div>
