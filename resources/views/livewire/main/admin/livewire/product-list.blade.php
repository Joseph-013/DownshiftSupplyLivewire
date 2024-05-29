<div class="w-full h-full ">

    @isset($itemTemplateToggleRes)
        <div
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 block lg:hidden justify-center items-center z-50">
            @if ($itemTemplateToggleRes != false)
                <livewire:main.admin.livewire.inventory-create :product="$itemTemplateToggleRes" mode="{{ 'read' }}" />
            @endif
        </div>
    @endisset
    <div class="w-full flex-row ">
        <ul class="flex flex-row items-center w-full h-6 ">
            <li class="w-1/12 text-center"></li>
            <li class="sm:w-5/12 w-4/12 h-full text-center sm:text-xs text-xxs">
                <button type="button" wire:click="sort('itemName')"
                    class="w-full h-full flex flex-row items-center justify-center hover:bg-gray-200">
                    Item Name
                    @if ($sortBy === 'name')
                        @if ($sortOrder === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        @endif
                    @endif
                </button>
            </li>
            <li class="sm:w-2/12 w-3/12 h-full text-center text-xs dropdown sm:text-xs text-xxs">
                <button type="button" class="w-full h-full dropbtn hover:bg-gray-200">Category</button>
                <div class="dropdown-content flex-col w-36">
                    <button wire:click="filter('All')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'All' ? 'underline' : '' }}">All</button>
                    @foreach($categories as $category)
                    <button wire:click="filter('{{ $category }}')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === $category ? 'underline' : '' }}">{{ $category }}</button>
                    @endforeach
                    <button wire:click="setCategoriesWindow(true)"
                        class="hover:bg-gray-200 h-7 bg-gray-300 flex flex-row justify-center items-center">Edit
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-pencil-fill ml-1" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                        </svg>
                    </button>
                </div>
            </li>
            <li class="w-2/12 h-full text-center sm:text-xs text-xxs">
                <button type="button" wire:click="sort('remaining')"
                    class="w-full h-full flex flex-row items-center justify-center hover:bg-gray-200">
                    Remaining
                    @if ($sortBy === 'stockquantity')
                        @if ($sortOrder === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        @endif
                    @endif
                </button>
            </li>
            <li class="w-2/12 h-full text-center sm:text-xs text-xxs">
                <button type="button" wire:click="sort('price')"
                    class="w-full h-full flex flex-row items-center justify-center ml-2 hover:bg-gray-200">
                    Price
                    @if ($sortBy === 'price')
                        @if ($sortOrder === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        @endif
                    @endif
                </button>
            </li>
        </ul>
    </div>
    <hr class="my-1">
    <div class="w-full h-96 overflow-y-auto" id="questions-container">
        <ul class="w-full flex flex-col items-center">
            @if ($products)
                @foreach ($products as $product)
                    <li wire:key='{{ $product->id }}' class="w-full flex justify-center select-none ">
                        <input wire:click="selectProduct({{ $product->id }})"  hidden
                            type="radio" id="productId{{ $product->id }}" name="productList">
                        <label
                            class="
                    @if ($product->stockquantity <= 0) bg-gray-400
                    @elseif ($product->stockquantity <= $product->criticallevel) bg-red-400 @endif
                    w-full py-1 border-t-2 border-b-2 border-gray shadow-sm text-sm flex items-center
                    {{ $product->stockquantity <= $product->criticallevel ? 'text-white' : '' }}"
                            for="productId{{ $product->id }}">
                            <ul class="flex flex-row w-full">
                                <li class="w-1/12 text-center sm:text-sm text-xxs">{{ $product->id }}</li>
                                <li class="sm:w-5/12 w-4/12 text-center sm:text-sm text-xxs">{{ $product->name }}</li>
                                <li class="sm:w-2/12 w-3/12 text-center sm:text-sm text-xxs ">
                                    @if($product->category_id) 
                                    {{ $product->product_categories->category }}
                                    @endif
                                </li>
                                <li class="w-2/12 text-center sm:text-sm text-xxs ">{{ $product->stockquantity }}</li>
                                <li class="w-2/12 text-center sm:text-sm text-xxs ">₱&nbsp;{{ number_format($product->price, 2) }}
                                </li>
                            </ul>
                        </label>
                    </li>
                @endforeach
            @endif
        </ul>


    </div>

    <div class="flex flex-row items-center mt-4">
        <div class="w-1/2 text-center px-0 sm:px-4">
            {{ $products->links('pagination.default') }}
        </div>

        <div class="w-1/2 flex justify-center">
            <button wire:click="itemTemplate(null)"
                class="h-10 px-4 flex flex-row items-center justify-center  bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing mb-2">
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

        <!-- OVERLAY -->

        {{-- For desktop create/edit --}}
        @isset($itemTemplateToggle)
            <livewire:main.admin.livewire.inventory-create :product="$itemTemplateToggle" mode="{{ 'write' }}" />
        @endisset

        <!-- END OF OVERLAY -->

    </div>

    @if ($showCategoriesWindow)
        <livewire:main.admin.livewire.inventory-categories />
    @endif

    <style>
        /* Select buttons inside the specified container */
        .flex-row button {
            cursor: pointer;
        }

        /* Additional styles for hover effects */
        .flex-row button:hover {
            /* Add hover effects here if needed */
        }

        li:hover {
            cursor: pointer;
        }

        @media (max-width: 600px){
            .text-xxs
        {
            font-size: 0.5rem;
        }
        }
        
    </style>
</div>
