<div class="w-full h-full text-right flex">
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex-row px-5">
            <ul class="flex flex-row w-full">
                <li class="w-full text-center text-sm font-semibold">Details</li>
            </ul>
        </div>
        <hr class="my-1">
        @if ($selectedTransaction)
            {{-- Products List  --}}
            <div class="w-full h-96 overflow-y-auto" id="orders-container">
                <div class=" flex flex-1 w-full">
                    <div class="w-2/5 text-left text-xs pr-2">
                        <div class="text-left text-xs my-2">
                            <span class="font-semibold">Order ID:</span> {{ $selectedTransaction->id }}
                        </div>
                        <div class="text-left text-xs my-2">
                            <span class="font-semibold">Date:</span> {{ $selectedTransaction->purchaseDate }}
                        </div>
                        <div class="text-left text-xs my-2">
                            <span class="font-semibold">Name:</span> {{ $selectedTransaction->firstName }}
                            {{ $selectedTransaction->lastName }}
                        </div>
                        <div class="text-left text-xs my-2">
                            <span class="font-semibold">Username:</span> {{ $selectedTransaction->user->username }}
                        </div>
                        <div class="text-left text-xs my-2">
                            <span class="font-semibold">Email:</span> {{ $selectedTransaction->user->email }}
                        </div>
                        <div class="text-left text-xs my-2">
                            <span class="font-semibold">Contact #:</span> {{ $selectedTransaction->contact }}
                        </div>
                        <div class="text-left text-xs my-2">
                            <span class="font-semibold">Payment Opt:</span> {{ $selectedTransaction->paymentOption }}
                        </div>
                        <div class="text-left text-xs my-2">
                            <span class="font-semibold">Preferred Service:</span>
                            {{ $selectedTransaction->preferredService }}
                        </div>
                        <div class="text-left text-xs my-2 flex items-center">
                            <span class="font-semibold mr-2">Courier Service:</span>
                            <input wire:model="courierUsed" type="text" class="border-b border-gray-300 text-xs"
                                placeholder="Enter Courier Service" value="{{ $selectedTransaction->courierUsed }}">
                        </div>
                        <div class="text-left text-xs my-2 flex items-center">
                            <span class="font-semibold mr-2">Shipping Fee:</span>
                            <input wire:model="shippingFee" type="number" class="border-b border-gray-300 text-xs"
                                placeholder="Enter Shipping Fee" value="{{ $selectedTransaction->shippingFee }}">
                        </div>
                        <div class="text-left text-xs my-2 flex items-center">
                            <span class="font-semibold mr-2">Tracking #:</span>
                            <input wire:model="trackingNumber" type="text" class="border-b border-gray-300 text-xs"
                                placeholder="Enter Tracking Number" value="{{ $selectedTransaction->trackingNumber }}">
                        </div>
                    </div>
                    <div class="w-2/5 text-left text-xs px-2 mx-1">
                        <div class="text-left text-xs font-semibold px-2">
                            Address
                        </div>
                        {{-- <div>
                    <textarea class="w-full h-50 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" rows="9" placeholder="Papalitan ng maps"></textarea>
                </div> --}}
                        <div id="map"
                            class="w-full h-4/5 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <input id="autocomplete" type="text" wire:model.defer="shippingAddress"
                                class="w-full h-50 p-2 mx-1 border text-xs mt-2"></input>
                        </div>
                    </div>
                    <div class="w-2/5 text-left text-xs px-2 mx-1">
                        <div class="text-left text-xs font-semibold px-2">
                            Proof of Payment
                        </div>
                        <div id="imageDiv"
                            class="w-full p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500"
                            style="height: 40vh;" onclick="showOverlay()">
                            <img id="image"
                                src="{{ filter_var($selectedTransaction->proofOfPayment, FILTER_VALIDATE_URL) ? $selectedTransaction->proofOfPayment : asset('storage/assets/' . $selectedTransaction->proofOfPayment) }}"
                                class="max-w-full max-h-full object-contain">
                        </div>
                    </div>

                </div>
                <ul class="w-full flex flex-col items-center">
                    {{-- Single Unit of Product --}}
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row px-5">
                            <ul class="flex flex-row w-full mt-3">
                                <li class="w-4/12 text-center text-xs font-semibold">Item</li>
                                <li class="w-3/12 text-center text-xs font-semibold">Price</li>
                                <li class="w-2/12 text-center text-xs font-semibold">Quantity</li>
                                <li class="w-3/12 text-center text-xs font-semibold">Subtotal</li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        <!-- Single Unit of Product -->
                        @php
                            $grandTotal = 0;
                        @endphp
                        @foreach ($selectedTransaction->details as $detail)
                            @if ($detail->products)
                                @php
                                    $subtotal = $detail->products->price * $detail->quantity;
                                    $grandTotal += $subtotal;
                                @endphp
                                <div class="w-full flex-row px-5 my-2">
                                    <ul class="flex flex-row w-full">
                                        <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                            <img src="{{ filter_var($detail->products->image, FILTER_VALIDATE_URL) ? $detail->products->image : asset('storage/assets/' . $detail->products->image) }}"
                                                class="w-12 h-12 ml-[-2.5rem]">
                                            {{ $detail->products->name }}
                                        </li>
                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                            {{ number_format($detail->products->price, 2) }}</li>
                                        <li class="w-2/12 text-center text-xs items-center justify-center">
                                            {{ $detail->quantity }}</li>
                                        <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                            {{ number_format($subtotal, 2) }}</li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </ul>
            </div>
            <hr class="mt-3 mb-2">
            <div class="w-full text-xs text-right pr-1 flex items-center">
                <div class="w-1/2 flex ml-20">
                    <span class="font-semibold text-xs flex items-center">Status: </span>
                    <select wire:model="status" class="ml-2 border rounded-md text-sm">
                        @foreach ($statusOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="w-2/2 flex ml-20">
                    <span class="font-semibold">Total: </span>
                    <span>&nbsp;₱ {{ number_format($grandTotal, 2) }}</span>
                </div>
            </div>

            <div class="w-full mt-4 flex justify-end">
                <button id="updateButton" onclick="updateTransactionWithCurrentAddress()"
                    class="h-9 px-5 flex flex-row items-center justify-center rounded-lg bg-blue-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                    <span class="flex pl-3 mr-[-1.5em]">Update</span>
                    <svg class="svg-icon ml-2"
                        style="width: 4.5em; height: 1.5em; vertical-align: middle; fill: currentColor; overflow: hidden;"
                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M730.584615 78.769231v267.815384c0 19.692308-15.753846 37.415385-37.415384 37.415385H273.723077c-19.692308 0-37.415385-15.753846-37.415385-37.415385V78.769231H157.538462C114.215385 78.769231 78.769231 114.215385 78.769231 157.538462v708.923076c0 43.323077 35.446154 78.769231 78.769231 78.769231h708.923076c43.323077 0 78.769231-35.446154 78.769231-78.769231V220.553846L803.446154 78.769231h-72.861539z m137.846154 750.276923c0 19.692308-15.753846 37.415385-37.415384 37.415384H194.953846c-19.692308 0-37.415385-15.753846-37.415384-37.415384V500.184615c0-19.692308 15.753846-37.415385 37.415384-37.415384h636.061539c19.692308 0 37.415385 15.753846 37.415384 37.415384v328.861539zM488.369231 267.815385c0 19.692308 15.753846 37.415385 37.415384 37.415384h90.584616c19.692308 0 37.415385-15.753846 37.415384-37.415384V78.769231h-163.446153l-1.969231 189.046154z" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    @livewireScripts

    <script>
        function showOverlay() {
            var imageUrl = document.getElementById('image').src;

            var overlay = document.createElement('div');
            overlay.id = 'overlay';
            overlay.style.position = 'fixed';
            overlay.style.top = '0';
            overlay.style.left = '0';
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
            overlay.style.zIndex = '9999';
            overlay.style.display = 'flex';
            overlay.style.justifyContent = 'center';
            overlay.style.alignItems = 'center';
            overlay.onclick = hideOverlay;

            var overlayImage = document.createElement('img');
            overlayImage.id = 'overlayImage';
            overlayImage.src = imageUrl;
            overlayImage.style.maxWidth = '80%';
            overlayImage.style.maxHeight = '80%';

            overlay.appendChild(overlayImage);

            document.body.appendChild(overlay);
        }

        function hideOverlay() {
            var overlay = document.getElementById('overlay');
            if (overlay) {
                overlay.parentNode.removeChild(overlay);
            }
        }

        function updateTransactionWithCurrentAddress() {
            var address = document.getElementById('autocomplete').value;
            console.log(address);
            @this.set('shippingAddress', address);
            @this.call('updateTransaction');
        }

        let map;
        let marker;
        let geocoder;

        Livewire.on('loadMap', (shippingAddress) => {
            initMap(shippingAddress);
        });

        async function initMap(shippingAddress) {
            const {
                Map
            } = await google.maps.importLibrary("maps");

            map = new Map(document.getElementById("map"), {
                zoom: 16,
                disableDefaultUI: true,
                mapTypeControl: false,
                fullscreenControl: true,
            });

            geocoder = new google.maps.Geocoder();
            
            const autocompleteOptions = {
                types: ['geocode'],
                componentRestrictions: {
                    country: 'PH'
                }
            };
            const autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'),
                autocompleteOptions);

            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    console.error("Place details not found for the input: '" + place.name + "'");
                    return;
                }

                map.marker && map.marker.setMap(null);

                map.setCenter(place.geometry.location);

                map.marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location
                });
            });

            geocodeAddress(shippingAddress[0]);
        }

        function geocodeAddress(address) {
            geocoder.geocode({ 'address': address }, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                    marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    console.error('Geocode was not successful for the following reason: ' + status);
                }
            }).catch(console.error);
        }
    </script>
