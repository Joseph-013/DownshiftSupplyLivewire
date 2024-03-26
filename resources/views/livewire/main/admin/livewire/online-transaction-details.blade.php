<div class="border-black border-1 w-full rounded-lg text-right p-3 flex" style="height: 75vh;">
    <div class="w-full h-full flex flex-col">
        <p class="text-center font-semibold h-9">Transaction Details</p>
        {{-- Products List  --}}
        <div class="w-full h-96 overflow-y-auto" id="orders-container">
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
        <div class="w-full flex flex-col mt-10">
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

    @if(isset($selectedTransaction))
    <div class="w-full mt-4 flex justify-end">
        <button id="updateButton" wire:click="modifyTrans" class="h-9 px-5 flex flex-row items-center justify-center rounded-lg bg-blue-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
            Modify
            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-pencil" viewBox="0 0 16 16">
                <path
                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
            </svg>
        </button>
    </div>
    @endif
</div>
@livewireScripts
<script>
    let map;
    let data;
    let marker;
    let geocoder;

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
</script>