<div class="border-black border-1 w-full rounded-lg text-right p-3 flex" style="height: 75vh;">
    <div class="w-full h-full flex flex-col">
        {{-- Products List  --}}
        <div class="w-full h-96 overflow-y-auto" id="orders-container">
            <p class="text-center font-semibold h-9">Transaction Details</p>
            <div class=" flex flex-1 w-full">
                <div class="w-2/5 text-left text-xs pr-2">
                    <div class="text-left text-xs my-2">
                        <span class="font-semibold">Transaction ID:</span> {{ isset($selectedTransaction) ? $selectedTransaction->id : '--' }}
                    </div>
                    <div class="text-left text-xs my-2">
                        <span class="font-semibold">Date:</span> {{ isset($selectedTransaction) ? $selectedTransaction->created_at : '--' }}
                    </div>
                    <div class="text-left text-xs my-2">
                        <span class="font-semibold">Name:</span> {{ isset($selectedTransaction) ? $selectedTransaction->firstName . ' ' . $selectedTransaction->lastName : '--' }}
                    </div>
                    {{-- <div class="text-left text-xs my-2">
                            <span class="font-semibold">Username:</span> {{ $selectedTransaction->user->username }}
                </div>
                <div class="text-left text-xs my-2">
                    <span class="font-semibold">Email:</span> {{ $selectedTransaction->user->email }}
                </div> --}}
                <div class="text-left text-xs my-2">
                    <span class="font-semibold">Contact #:</span> {{ isset($selectedTransaction) ? $selectedTransaction->contact : '--' }}
                </div>
                <div class="text-left text-xs my-2">
                    <span class="font-semibold">Payment Opt:</span> {{ isset($selectedTransaction) ? $selectedTransaction->paymentOption : '--' }}
                </div>
                <div class="text-left text-xs my-2">
                    <span class="font-semibold">Preferred Service:</span>
                    {{ isset($selectedTransaction) ? $selectedTransaction->preferredService : '--' }}
                </div>
                @if(isset($selectedTransaction))
                @if($selectedTransaction->preferredService === "Delivery")
                <div class="text-left text-xs my-2 flex items-center">
                    <span class="font-semibold mr-2">Courier Service:</span>
                    {{ isset($selectedTransaction) ? $selectedTransaction->courierUsed : '--' }}
                </div>
                <div class="text-left text-xs my-2 flex items-center">
                    <span class="font-semibold mr-2">Shipping Fee:</span>
                    {{ isset($selectedTransaction) ? $selectedTransaction->shippingFee : '--' }}
                </div>
                <div class="text-left text-xs my-2 flex items-center">
                    <span class="font-semibold mr-2">Tracking #:</span>
                    {{ isset($selectedTransaction) ? $selectedTransaction->trackingNumber : '--' }}
                </div>
                @endif
                @endif
            </div>
            <div class="w-2/5 text-left text-xs px-2 mx-1">
                <div class="text-left text-xs font-semibold px-2">
                    Address
                </div>
                {{-- <div>
                    <textarea class="w-full h-50 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" rows="9" placeholder="Papalitan ng maps"></textarea>
                </div> --}}
                <div id="map" class="w-full h-4/5 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500">
                </div>
                
                <div class="text-left text-xs px-2 my-2">
                    {{ isset($selectedTransaction) ? $selectedTransaction->shippingAddress : '--' }}
                </div>
                {{-- <div>
                    @if(isset($selectedTransaction))
                    {{ isset($selectedTransaction) ? $selectedTransaction->shippingAddress : '--' }}
                    <input id="autocomplete{{ $selectedTransaction->id }}" type="text" wire:model.="shippingAddress" class="w-full h-50 p-2 mx-1 border text-xs mt-2"></input>
                    @endif
                </div> --}}
            </div>
            <div class="w-2/5 text-left text-xs px-2 mx-1">
                <div class="text-left text-xs font-semibold px-2">
                    Proof of Payment
                </div>
                <div id="imageDiv" class="w-full p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" style="height: 30vh;" onclick="showOverlay()">
                    @if(isset($selectedTransaction))
                    <img id="image" src="{{ filter_var($selectedTransaction->proofOfPayment, FILTER_VALIDATE_URL) ? $selectedTransaction->proofOfPayment : asset('storage/assets/' . $selectedTransaction->proofOfPayment) }}" class="max-w-full max-h-full object-contain">
                    @endif
                </div>
            </div>

        </div>
        <div class="w-full h-full flex flex-col mt-10">
            <div class="w-full flex-row px-5">
                <table class="w-full">
                    <thead>
                        <tr class="flex flex-row w-full mt-3">
                            <th class="w-4/12 text-center text-xs font-semibold">Item</th>
                            <th class="w-3/12 text-center text-xs font-semibold">Price</th>
                            <th class="w-2/12 text-center text-xs font-semibold">Quantity</th>
                            <th class="w-3/12 text-center text-xs font-semibold">Subtotal</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <hr class="my-1">
            <!-- Single Unit of Product -->
            <table class="w-full">
    <tbody>
        @php
            $grandTotal = 0;
        @endphp
        @if($details)
            @foreach ($details as $detail)
                @if ($detail->products)
                    @php
                        $subtotal = $detail->products->price * $detail->quantity;
                        $grandTotal += $subtotal;
                    @endphp
                    <tr class="flex flex-row w-full px-5 my-2">
                        <td class="w-4/12 text-xs flex items-center justify-start">
                            <img src="{{ filter_var($detail->products->image, FILTER_VALIDATE_URL) ? $detail->products->image : asset('storage/assets/' . $detail->products->image) }}" class="w-12 h-12 mr-2 object-cover rounded" style="vertical-align: middle;">
                            <span class="text-left">{{ $detail->products->name }}</span>
                        </td>
                        <td class="w-3/12 text-center text-xs items-center justify-center">₱
                            {{ number_format($detail->products->price, 2) }}
                        </td>
                        <td class="w-2/12 text-center text-xs items-center justify-center">
                            {{ $detail->quantity }}
                        </td>
                        <td class="w-3/12 text-center text-xs items-center justify-center">₱
                            {{ number_format($subtotal, 2) }}
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    </tbody>
</table>
                    
        </div>

    </div>
    <hr class="mt-3 mb-2">
    <div class="w-full text-xs text-right pr-1 flex items-center">
        <div class="w-1/2 flex ml-20">
            <span class="font-semibold text-xs flex items-center mr-2">Status: </span> {{ isset($selectedTransaction) ? $selectedTransaction->status : '--' }}
            {{-- <select wire:model="status" class="ml-2 border rounded-md text-sm">
                @foreach ($statusOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select> --}}
        </div>


        <div class="w-2/2 flex ml-20">
            <span class="font-semibold">Total: </span>
            <span>&nbsp;₱ {{ number_format($grandTotal, 2) }}</span>
        </div>
    </div>

    <div class="w-full mt-4 flex justify-end">
        <button id="updateButton" onclick="updateTransactionWithCurrentAddress({{ $selectedTransaction }})" class="h-9 px-5 flex flex-row items-center justify-center rounded-lg bg-blue-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
            <span class="flex pl-3 mr-[-1.5em]">Update</span>
            <svg class="svg-icon ml-2" style="width: 4.5em; height: 1.5em; vertical-align: middle; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M730.584615 78.769231v267.815384c0 19.692308-15.753846 37.415385-37.415384 37.415385H273.723077c-19.692308 0-37.415385-15.753846-37.415385-37.415385V78.769231H157.538462C114.215385 78.769231 78.769231 114.215385 78.769231 157.538462v708.923076c0 43.323077 35.446154 78.769231 78.769231 78.769231h708.923076c43.323077 0 78.769231-35.446154 78.769231-78.769231V220.553846L803.446154 78.769231h-72.861539z m137.846154 750.276923c0 19.692308-15.753846 37.415385-37.415384 37.415384H194.953846c-19.692308 0-37.415385-15.753846-37.415384-37.415384V500.184615c0-19.692308 15.753846-37.415385 37.415384-37.415384h636.061539c19.692308 0 37.415385 15.753846 37.415384 37.415384v328.861539zM488.369231 267.815385c0 19.692308 15.753846 37.415385 37.415384 37.415384h90.584616c19.692308 0 37.415385-15.753846 37.415384-37.415384V78.769231h-163.446153l-1.969231 189.046154z" />
            </svg>
        </button>
    </div>
</div>
@livewireScripts
<script>
    let map

    Livewire.on('loadMap', (data) => {
        initMap(data);
    })

    async function initMap(data)
    {
        const address = data[0];
        const { Map } = await google.maps.importLibrary("maps");

        map = new Map(document.getElementById("map"), {
            zoom: 16,
            disableDefaultUI: true,
            mapTypeControl: false,
            fullscreenControl: true,
        });

        geocoder = new google.maps.Geocoder();

        geocodeAddress(address);
    }
    // let map;
    // let data;
    // let marker;
    // let geocoder;

    // Livewire.on('loadMap', (data) => {
    //     initMap(data);
    // });

    // async function initMap(data) {
    //     if (!Array.isArray(data) || data.length < 2) {
    //         return;
    //     }

    //     const shippingAddress = data[0];
    //     const transactionId = data[1];

    //     const {
    //         Map
    //     } = await google.maps.importLibrary("maps");

    //     map = new Map(document.getElementById("map"), {
    //         zoom: 16,
    //         disableDefaultUI: true,
    //         mapTypeControl: false,
    //         fullscreenControl: true,
    //     });

    //     geocoder = new google.maps.Geocoder();

    //     geocodeAddress(shippingAddress);

    //     const searchInput = document.querySelector(`#autocomplete${transactionId}`);
    //     var autocomplete = new google.maps.places.Autocomplete(searchInput, {
    //         types: ['address'],
    //         componentRestrictions: {
    //             country: 'ph'
    //         }
    //     });
    //     autocomplete.addListener('place_changed', function() {
    //         var place = autocomplete.getPlace();

    //         map.marker && map.marker.setMap(null);

    //         map.setCenter(place.geometry.location);

    //         map.marker = new google.maps.Marker({
    //             map: map,
    //             position: place.geometry.location
    //         });
    //     });
    // }

    function geocodeAddress(address) {
        geocoder.geocode({
            'address': address
        }, function(results, status) {
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

    // function updateTransactionWithCurrentAddress(transactionId) {
    //     var address = document.getElementById('autocomplete' + transactionId).value;
    //     @this.set('shippingAddress', address);
    //     @this.call('updateTransaction');
    // }
</script>