<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Onsite Transactions (Create)
                </h1>
                
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
            
                {{-- Left Panel --}}
                <div class="w-2/5 h-full px-3">
                    <div class="w-full h-full text-right flex">
                        <form class="createTransaction" method="POST" action="{{ route('create.transaction') }}">
                            @csrf
                            @method('PUT')
                        <div class="w-full h-full flex flex-col">
                            <div class="w-full flex-row ">
                                <ul class="flex flex-row w-full">
                                    <li class="w-full text-left text-sm font-semibold ">Overview</li>
                                </ul>
                            </div>
                            <hr class="my-1">
                            <div class="w-full flex-row mt-4">
                                <ul class="flex flex-row w-full">
                                    <li class="w-1/2 pr-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">First Name:</label>
                                        <input name="firstName" class="w-full h-10 flex items-center" type="text">
                                    </li>

                                    <li class="w-1/2 pl-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">Last Name:</label>
                                        <input name="lastName" class="w-full h-10 flex items-center" type="text">
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full flex-row mt-3">
                                <ul class="flex flex-row w-full">
                                    <li class="w-1/2 pr-2 text-left text-sm">
                                        <label class="w-full h-10 flex items-center font-semibold">Contact #:</label>
                                        <input name="contact" class="w-full h-10 flex items-center" type="text">
                                    </li>
                                </ul>
                            </div>

                            <div class="w-full mt-5 flex justify-center">
                                <button type="submit"
                                    class="h-10 w-60  items-center justify-center rounded-lg bg-orange-500  border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                                    Save Changes
                                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                        <path d="M11 2H9v3h2z" />
                                        <path
                                            d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                    </svg>
                                </button>
                            </div>
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
                                <li data-product-id="" class="product-item w-full flex justify-center select-none px-2">
                                </li>
                            </ul>
                        </div>
                        <hr class="mb-2">
                        <div class="w-full text-sm text-right pr-7 mx-[-5rem] mb-5">
                            <span class="font-semibold">Total:
                            </span><p id="grand-total">₱ </p>
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

            document.addEventListener('click', (event) => {
                const deleteButton = event.target.closest('.delete-button');
                if (deleteButton) {
                    event.preventDefault();
                    const listItem = deleteButton.closest('.product-item');
                    if (listItem) {
                        listItem.remove();
                        updateTotal();
                    }   
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
            });

            document.addEventListener('click', (event) => {
                const deleteButton = event.target.closest('.delete-button');
                if (deleteButton) {
                    event.preventDefault();
                    const listItem = deleteButton.closest('.product-item');
                    if (listItem) {
                        listItem.remove();
                        updateSubtotalAndTotal();
                    }   
                }
            });

            function updateSubtotalAndTotal() {
                const subtotalElements = document.querySelectorAll('.subtotal');
                subtotalElements.forEach(subtotalElement => {
                    const listItem = subtotalElement.closest('.product-item');
                    const quantity = parseInt(listItem.querySelector('.quantity').value);
                    const price = parseFloat(listItem.querySelector('.price').textContent.trim().replace('₱', ''));
                    const subtotal = price * quantity;
                    subtotalElement.textContent = '₱ ' + subtotal.toFixed(2);
                    subtotalElement.setAttribute('data-subtotal', subtotal.toFixed(2));
                });

                let grandTotal = 0;
                subtotalElements.forEach(subtotalElement => {
                    grandTotal += parseFloat(subtotalElement.getAttribute('data-subtotal'));
                });

                document.getElementById('grand-total').textContent = "₱ " + grandTotal.toFixed(2);
            }

            Livewire.on('addedItem', (data) => {
                const productId = parseInt(data[0]);
                const quantity = parseInt(data[1]);
                const existingProductItem = document.querySelector(`#product-list li[data-product-id="${productId}"]`);

                if (existingProductItem) {
                    const quantityElement = existingProductItem.querySelector('.quantity');
                    const currentQuantity = parseInt(quantityElement.value);

                    quantityElement.value = currentQuantity + quantity;

                    const priceElement = existingProductItem.querySelector('.price');
                    const priceText = priceElement.textContent.trim();
                    const priceValue = parseFloat(priceText.replace('₱', '').trim());
                    const price = isNaN(priceValue) ? 0 : priceValue;

                    const subtotalElement = existingProductItem.querySelector('.subtotal');
                    const subtotalText = subtotalElement.textContent.trim();
                    const currentSubtotal = parseFloat(subtotalText.replace('₱', '').trim())
                    const newSubtotal = price * (currentQuantity + quantity);
                    subtotalElement.textContent = '₱ ' + newSubtotal.toFixed(2);

                    updateSubtotalAndTotal();
                } else {
                    fetch(`/get-product-details/${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            if(data.success) {
                                const form = document.querySelector('.createTransaction');
                                const input = document.createElement('input');
                                input.setAttribute('type', 'hidden');
                                input.setAttribute('name', 'productList[]');
                                input.setAttribute('value', `${productId}`);
                                form.appendChild(input);

                                const quantityInput = document.createElement('input');
                                quantityInput.setAttribute('type', 'hidden');
                                quantityInput.setAttribute('name', 'quantity[]');
                                quantityInput.setAttribute('value', `${quantity}`);
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
                                    <input hidden id="productId${productId}"
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
                                                ${productPrice.toFixed(2)}</li>
                                            <li class="w-2/12 text-center flex items-center justify-center text-sm">
                                                <input class="w-4/6 h-10 flex items-center text-xs quantity" type="text" name="quantity[]" value="${quantity}">
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
