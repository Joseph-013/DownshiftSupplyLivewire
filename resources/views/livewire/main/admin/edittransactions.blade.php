<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Onsite Transactions (Edit)
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
            
                {{-- Left Panel --}}
                <div class="w-2/5 h-full px-3">
                    <div class="w-full h-full text-right flex">
                        <form class="updateTransaction" method="POST" action="{{ route('update.transaction', ['id' => $transaction->id]) }}">
                            @csrf
                            @method('PUT')
                        <div class="w-full h-full flex flex-col">
                            <div class="w-full flex-row ">
                                <ul class="flex flex-row w-full">
                                    <li class="w-full text-left text-sm font-semibold ">Overview</li>
                                </ul>
                            </div>
                            <hr class="my-1">
                            <div class="w-full text-sm text-left"><span class="font-semibold">Order ID:
                                </span>{{ $transaction->id }}
                            </div>
                            <div class="w-full flex-row mt-4">
                                <ul class="flex flex-row w-full">
                                    <li class="w-1/2 pr-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">First Name:</label>
                                        <input name="firstName" class="w-full h-10 flex items-center" type="text" value="{{ $transaction->firstName }}">
                                    </li>

                                    <li class="w-1/2 pl-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">Last Name:</label>
                                        <input name="lastName" class="w-full h-10 flex items-center" type="text" value="{{ $transaction->lastName }}">
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full flex-row mt-3">
                                <ul class="flex flex-row w-full">
                                    <li class="w-1/2 pr-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">Contact #:</label>
                                        <input name="contact" class="w-full h-10 flex items-center" type="text" value="{{ $transaction->contact }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" 
                                            maxlength="11" pattern="[0-9]*" 
                                            title="Please enter only positive integers with a maximum length of 11 characters">
                                    </li>
                                </ul>
                            </div>
                            <livewire:save-changes-update />
                        </div>
                    </div>
                </div>  

                {{-- Right Panel border-2 border-black --}}
                <div class="w-3/5 h-full text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row ">
                            <ul class="flex flex-row w-full">
                                <li class="w-full text-left text-sm font-semibold pl-2">Particulars</li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        <div class="w-full flex-row px-5">
                            <ul class="flex flex-row w-full">
                                <li class="w-6/12 text-center text-xs">Item</li>
                                <li class="w-2/12 text-center text-xs">Price</li>
                                <li class="w-2/12 text-center text-xs">Quantity</li>
                                <li class="w-2/12 text-center text-xs">Subtotal</li>
                                <li class="w-1/12 text-center text-xs"></li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        {{-- Products List  --}}
                        <div class="w-full h-96 overflow-y-auto mb-3" id="edittransactions-container">
                            <ul class=" w-full flex flex-col items-center" id="product-list">
                                @php
                                    $grandTotal = 0;
                                @endphp
                                @foreach($transaction->details as $detail)
                                @if($detail->products)
                                @php
                                    $pricetofloat = floatval($detail->products->price);
                                    $calcsubtotal = $detail->quantity * $pricetofloat;
                                    $subtotal = (double)($calcsubtotal);
                                    $grandTotal += $subtotal;
                                    $detailProductId = (int)$detail->products->id;
                                @endphp
                                {{-- Single Unit of Product --}}
                                <li data-product-id="{{ $detailProductId }}" class="product-item w-full flex justify-center select-none px-2">
                                    {{-- Product Details --}}
                                    <input hidden id="{{ $detailProductId }}"
                                        name="productList[]" value="{{ $detailProductId }}" checked>
                                    <label
                                        class="w-11/12 py-2 my-1 rounded border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId{{ $detailProductId }}">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-6/12 text-center text-xs flex items-center justify-center">
                                                <div class="flex items-center">
                                                    <!-- Wrapping content in a flex container -->
                                                    <img src="{{ filter_var($detail->products->image, FILTER_VALIDATE_URL) ? $detail->products->image : asset('storage/assets/' . $detail->products->image) }}" class="w-24 h-20 ml-[-2rem] object-cover">

                                                    <div class="ml-2">
                                                        <!-- Adding margin to separate image and text -->
                                                        <div class="text-sm text-left mb-3">
                                                            <span class="font-semibold">Item ID:</span> {{ $detail->products->id }}
                                                        </div>
                                                        <div class="text-sm text-left">{{ $detail->products->name }}</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm price">₱ {{ number_format($detail->products->price, 2) }}</li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">
                                                <input class="w-4/6 h-10 flex items-center text-xs quantity" type="text" name="quantity[]" value="{{ $detail->quantity }}" data-product-id="{{ $detail->products->id }}">
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm subtotal" data-subtotal="{{ $subtotal }}">₱
                                                {{ number_format($subtotal, 2) }}</li>
                                            <li class="w-1/12 text-center flex items-center justify-center text-sm">
                                                <button type="button" class="delete-button h-full w-10 flex items-center justify-center">
                                                    <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </label>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <hr class="mb-2">
                        <div class="w-full text-sm text-right pr-7 mx-[-5rem] mb-5">
                            <span class="font-semibold">Total:
                            </span><p id="grand-total">₱ {{ number_format($grandTotal, 2) }}</p>
                        </div>
                        <livewire:product-search />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const decrementButton = document.getElementById('decrement-button');
            const incrementButton = document.getElementById('increment-button');
            const quantityInput = document.getElementById('quantity-input');

            decrementButton.addEventListener('click', () => {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue > 0) {
                    quantityInput.value = currentValue - 1;
                } else {
                    quantityInput.value = 0;
                }
            });

            incrementButton.addEventListener('click', () => {
                let currentValue = parseInt(quantityInput.value);
                if (isNaN(currentValue) || currentValue < 0) {
                    quantityInput.value = 1;
                } else {
                    quantityInput.value = currentValue + 1;
                }
            });

            document.addEventListener('submit', (event) => {
                const quantityInputs = document.querySelectorAll('.quantity');
                    for (const quantityInput of quantityInputs) {
                        const quantity = parseInt(quantityInput.value);
                        if (isNaN(quantity) || quantity <= 0) {
                        event.preventDefault();
                    }
                }
            });

            quantityInput.addEventListener('input', updateSubtotalAndTotal);
            document.addEventListener('input', (event) => {
                const quantityInput = event.target.closest('.quantity');
                if (quantityInput) {
                    updateSubtotalAndTotal();
                }
                const listItem = quantityInput.closest('.product-item');
                const productId = listItem.getAttribute('data-product-id');
                const hiddenQuantityInput = document.querySelector(`input[name="quantity[]"][data-product-id="${productId}"]`);
                hiddenQuantityInput.setAttribute('value', `${quantityInput.value}`);
            });

            document.addEventListener('click', (event) => {
                const deleteButton = event.target.closest('.delete-button');
                if (deleteButton) {
                    event.preventDefault();
                    const listItem = deleteButton.closest('.product-item');
                    if (listItem) {
                        listItem.remove();
                        const productId = listItem.getAttribute('data-product-id');
                        const hiddenProductInput = document.querySelector(`input[name="productList[]"][value="${productId}"]`);
                        const hiddenQuantityInput = document.querySelector(`input[name="quantity[]"][data-product-id="${productId}"]`);
                        if (hiddenProductInput) {
                            hiddenProductInput.remove();
                        }
                        if (hiddenQuantityInput) {
                            hiddenQuantityInput.remove();
                        }
                        const quantityInputs = document.querySelectorAll(`input[name="quantity[]"][data-product-id="${productId}"]`);
                        quantityInputs.forEach((input, index) => {
                            input.setAttribute('name', `quantity[${index}]`);
                        });
                    }
                updateSubtotalAndTotal();
                }
            });

            function updateSubtotalAndTotal() {
                const subtotalElements = document.querySelectorAll('.subtotal');
                subtotalElements.forEach(subtotalElement => {
                    const listItem = subtotalElement.closest('.product-item');
                    const quantity = parseInt(listItem.querySelector('.quantity').value);
                    const priceText = listItem.querySelector('.price').textContent.trim().replace('₱', '').replace(/,/g, '').trim();
                    const priceValue = parseFloat(priceText);
                    const price = isNaN(priceValue) ? 0 : priceValue;
                    const subtotal = price * quantity;
                    subtotalElement.textContent = '₱ ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    subtotalElement.setAttribute('data-subtotal', subtotal.toFixed(2));
                });

                let grandTotal = 0;
                subtotalElements.forEach(subtotalElement => {
                    grandTotal += parseFloat(subtotalElement.getAttribute('data-subtotal'));
                });

                document.getElementById('grand-total').textContent = "₱ " + grandTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }



            Livewire.on('addedItem', (data) => {
                const productId = parseInt(data[0]);
                const quantity = parseInt(data[1]);
                const existingProductItem = document.querySelector(`#product-list li[data-product-id="${productId}"]`);

                if (existingProductItem) {
                    const quantityElement = existingProductItem.querySelector('.quantity');
                    const currentQuantity = parseInt(quantityElement.value);

                    quantityElement.value = currentQuantity + quantity;
                    
                    const quantityInput = document.querySelector(`input[name="quantity[]"][data-product-id="${productId}"]`);
                    quantityInput.setAttribute('value', `${currentQuantity + quantity}`);

                    const priceElement = existingProductItem.querySelector('.price');
                    const priceText = priceElement.textContent.trim();
                    const priceValue = parseFloat(priceText.replace('₱', '').replace(/,/g, '').trim());
                    const price = isNaN(priceValue) ? 0 : priceValue;   

                    const subtotalElement = existingProductItem.querySelector('.subtotal');
                    const subtotalText = subtotalElement.textContent.trim();
                    const currentSubtotal = parseFloat(subtotalText.replace('₱', '').trim())
                    const newSubtotal = price * (currentQuantity + quantity); // Update subtotal based on new quantity
                    subtotalElement.textContent = '₱ ' + newSubtotal.toFixed(2);

                    updateSubtotalAndTotal();
                } else {
                    fetch(`/get-product-details/${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            if(data.success) {
                                const form = document.querySelector('.updateTransaction');
                                const input = document.createElement('input');
                                input.setAttribute('type', 'hidden');
                                input.setAttribute('name', 'productList[]');
                                input.setAttribute('value', `${productId}`);
                                form.appendChild(input);

                                const quantityInput = document.createElement('input');
                                quantityInput.setAttribute('type', 'hidden');
                                quantityInput.setAttribute('name', 'quantity[]');
                                quantityInput.setAttribute('value', `${quantity}`);
                                quantityInput.setAttribute('data-product-id', `${productId}`);
                                form.appendChild(quantityInput);

                                const product = data.product;
                                const productName = product.name;
                                const productPrice = parseFloat(product.price);
                                const productImage = product.image;
                                const subtotal = parseFloat((product.price * quantity));

                                const productList = document.querySelector('#product-list');
                                const newProductItem = document.createElement('li');
                                newProductItem.classList.add('product-item', 'w-full', 'flex', 'justify-center', 'select-none', 'px-2');
                                newProductItem.setAttribute('data-product-id', productId);

                                newProductItem.innerHTML = `
                                    {{-- Product Details --}}
                                    <input hidden id="${productId}"
                                        name="productList[]" value="${productId}" checked>
                                    <label
                                        class="w-11/12 py-2 my-1 rounded border-2 border-gray shadow-sm text-sm flex items-center"
                                        for="productId${productId}">
                                        <ul class="flex flex-row w-full">
                                            <li class="w-6/12 text-center text-xs flex items-center justify-center">
                                                <div class="flex items-center">
                                                    <!-- Wrapping content in a flex container -->
                                                    <img src="${getImageUrl(productImage)}" class="w-24 h-20 ml-[-2rem] object-cover">
                                                    <div class="ml-2">
                                                        <!-- Adding margin to separate image and text -->
                                                        <div class="text-sm text-left mb-3">
                                                            <span class="font-semibold">Item ID:</span> ${productId}
                                                        </div>
                                                        <div class="text-sm text-left">${productName}</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm price">₱
                                                ${productPrice.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">
                                                <input class="w-4/6 h-10 flex items-center text-xs quantity" type="text" name="quantity[]" value="${quantity}" data-product-id="${productId}">
                                            </li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm subtotal" data-subtotal="${subtotal}">₱
                                                ${subtotal.toFixed(2)}</li>
                                            <li class="w-1/12 text-center flex items-center justify-center text-sm">
                                                <button type="button" class="delete-button h-full w-10 flex items-center justify-center">
                                                    <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </label>
                                `;
                                productList.appendChild(newProductItem);
                                updateSubtotalAndTotal();
                            }
                        });
                }
            });

            function isValidURL(string) {
                try {
                    new URL(string);
                    return true;
                } catch (_) {
                    return false;  
                }
            }

            function getImageUrl(image) {
                const baseUrl = "{{ asset('storage/assets/') }}";
                if (isValidURL(image)) {
                    return image;
                } else {
                    return baseUrl + '/' + image;
                }
            }
        </script>
    </div>
</x-app-layout>
