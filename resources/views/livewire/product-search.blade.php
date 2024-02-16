<div class="w-full flex-row px-5 ml-[-.5rem]">
    <ul class="flex flex-row w-full rounded border border-gray-500 px-1 py-2">
        <li class="w-5/12 text-center text-xs flex items-center justify-center ">
            <div class="flex items-center"> <!-- Wrapping content in a flex container -->
                <div class=""> <!-- Adding margin to separate image and text -->
                    <label class="w-full h-10 flex items-center font-semibold">Item ID/Name:</label>
                    <input wire:model.live="search" class="w-4/6 h-10 flex items-center text-xs" type="text" id="searchInput">
                    <ul id="searchResults" class="list-group absolute z-10">
                        @foreach($results as $result)
                        <li class="list-group-item w-28" onclick="fillInputAndHide('{{ $result->id }}', '{{ $result->name }}', '{{ $result->image }}')">{{ $result->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <img id="displayImage" src=""
                    class="w-24 h-20 ml-[-3rem]">
            </div>
        </li>
        <li id="displayName" class="w-2/12 text-center flex items-center justify-center text-xs ">
        </li>
        <li class="w-3/12 text-center flex items-center justify-center text-xs mr-2">
            <div class=""> <!-- Adding margin to separate image and text -->
                <label
                    class="w-full h-10 flex items-center font-semibold text-xs">Quantity:</label>
                <div class="relative flex items-center max-w-[6rem]">
                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                        </svg>
                    </button>
                    <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-white border-gray-300 h-8 text-center text-gray-900 text-xs focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="1" required>
                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-white dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-2 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-2 h-2 text-gray-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </li>
        <li class="w-3/12 text-center flex items-center justify-center pr-2 ">
            <button type="button"
                onclick="addItem()"
                class="h-9 w-60 text-xs items-center justify-center rounded-lg bg-orange-500  border-1 border-black text-white text-xs  font-semibold text-spacing flex flex-row">
                Add Item
                <svg fill="#FFFFFF" height="20px" width="20px" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    enable-background="new 0 0 512 512">
                    <g>
                        <g>
                            <path
                                d="M256,11C120.9,11,11,120.9,11,256s109.9,245,245,245s245-109.9,245-245S391.1,11,256,11z M256,460.2    c-112.6,0-204.2-91.6-204.2-204.2S143.4,51.8,256,51.8S460.2,143.4,460.2,256S368.6,460.2,256,460.2z" />
                            <path
                                d="m357.6,235.6h-81.2v-81.2c0-11.3-9.1-20.4-20.4-20.4-11.3,0-20.4,9.1-20.4,20.4v81.2h-81.2c-11.3,0-20.4,9.1-20.4,20.4s9.1,20.4 20.4,20.4h81.2v81.2c0,11.3 9.1,20.4 20.4,20.4 11.3,0 20.4-9.1 20.4-20.4v-81.2h81.2c11.3,0 20.4-9.1 20.4-20.4s-9.1-20.4-20.4-20.4z" />
                        </g>
                    </g>
                </svg>
            </button>
        </li>
    </ul>
</div>

<script>
    var selectedProductId;

    function fillInputAndHide(id, name, image) {
        var imageUrl = "{{ asset('storage/assets/') }}" + '/' + image;
        document.getElementById('searchInput').value = name;
        document.getElementById('displayName').textContent = name;
        document.getElementById('searchResults').style.display = 'none';
        document.getElementById('displayImage').src = imageUrl;

        selectedProductId = id;
    }

    function addItem() {
        if(selectedProductId != null)
        {
            var productId = selectedProductId;
            var quantity = document.getElementById('quantity-input').value;
            Livewire.dispatch('itemAdded', {
                addedProductId: productId, 
                addedQuantity: quantity
            });
            console.log("Selected Product ID:", productId);
            console.log("Quantity:", quantity);
        }
    }
</script>