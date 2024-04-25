<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
    <div class="absolute inset-0 bg-black opacity-50" wire:click="hideCategoriesWindow()"></div>
    {{-- content --}}
    {{-- <div class="bg-white z-10 p-3 rounded-lg w-96 max-w-80"> --}}
    <div class="bg-white z-10 p-3 rounded-lg w-80 h-full flex flex-col" style="max-height: 400px;">
        <div class="flex-1 overflow-y-auto">
            <div class="w-full text-center text-lg font-bold mb-3 overflow-y-auto">Product Categories</div>
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <td class="w-10/12">Categories</td>
                        <td class="w-1/12">Edit</td>
                        <td class="w-1/12">Remove</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $category)
                    @if ($confirmDelete)
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
                        <!-- Semi-transparent overlay -->
                        <div class="absolute inset-0 bg-black opacity-50"></div>

                        <!-- Confirmation prompt -->
                        <div class="bg-gray-100 p-6 rounded-lg relative z-10 border">
                            <p class="text-xs text-gray-800 mb-4 font-medium">Are you sure you want to delete this
                                product?</p>
                            <div class="flex justify-end">
                                <button type="button" wire:click="deleteCategory('{{ $category }}')"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md mr-2">Yes</button>
                                <button type="button" wire:click="$set('confirmDelete', false)"
                                    class="px-4 py-2 bg-gray-400 text-white rounded-md">No</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <tr>
                        <td>
                            @if ($editingCategory === $category)
                            <input type="text" wire:model="editingCategory" wire:keydown.enter="updateCategory({{ $index }})" class="w-full">
                            @else
                            {{ $category }}
                            @endif
                        </td>
                        <td>
                            @if ($editingCategory === $category)
                            <button type="button" wire:click="updateCategory({{ $index }})" class="h-full w-full p-2 flex items-center justify-center hover:bg-gray-200 rounded-md" wire:click="editCategory('{{ $category }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                  </svg>
                            </button>
                            @else
                            <button type="button" class="h-full w-full p-2 flex items-center justify-center hover:bg-gray-200 rounded-md" wire:click="editCategory('{{ $category }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                </svg>
                            </button>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="h-full w-full p-2 flex items-center justify-center hover:bg-gray-200 rounded-md" wire:click="deleteConfirm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7A.5.5 0 0 0 8 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><input type="text" wire:model="newCategory" wire:keydown.enter="addCategory" class="w-full"></td>
                        <td colspan="2">
                            <button type="button" class="h-full w-full p-2 flex items-center justify-center hover:bg-gray-200 rounded-md" wire:click="addCategory">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-center w-full mt-4">
            <button type="button" wire:click="hideCategoriesWindow()"
                class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row max-w-48">
                Cancel
                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708" />
                </svg>
            </button>
        </div>
    </div>
</div>
