<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Check Out
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3">
                {{-- Left Panel --}}
                <div class="w-3/5 h-full px-3">
                    <livewire:main.user.livewire.user-checkout-list />
                </div>


                {{-- Right Panel border-2 border-black --}}
                <div class="w-2/5 h-full px-3 text-right flex text-xs ">
                    <form action="{{ route('user.checkout.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Left Main Container --}}
                        <div class="text-left font-semibold text-sm">
                            Details
                        </div>
                        <div class="border-black border-1 w-full rounded-lg p-1">
                            <div class="w-full h-96 overflow-y-auto flex-row" id="questions-container">
                                <ul class="flex flex-row w-auto mb-3">
                                    <li class="w-2/4 text-left pl-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">Name:</span>
                                        </div>
                                    </li>
                                    <li class="w-3/4 text-left pr-3">
                                        <div class="my-1 flex items-center">
                                            <span class="font-medium mr-2">First:</span>
                                            <input name="firstName" class="w-full h-10 text-xs" type="text" placeholder="First Name" required>
                                        </div>
                                        <div class="my-1 flex items-center">
                                            <span class="font-medium mr-2">Last:</span>
                                            <input name="lastName" class="w-full h-10 text-xs" type="text" placeholder="Last Name" required>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="flex flex-row w-full mb-3 pr-3">
                                    <li class="w-2/4 text-left pl-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">Contact Number:</span>
                                        </div>
                                    </li>
                                    <li class="w-3/4 text-left">
                                        <input name="contact" class="w-full h-10 text-xs" type="text" placeholder="Contact Number" 
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" 
                                            maxlength="11" pattern="[0-9]*" 
                                            title="Please enter only positive integers with a maximum length of 11 characters" required>
                                    </li>
                                </ul>
                                <div class="flex flex-row w-full mb-3 gap-2 px-3">
                                    <label for="pickup" class="w-1/2 rounded-md border border-gray-300 p-2 mr-4 flex items-center">
                                        <input name="preferredService" type="radio" id="pickup" name="delivery_option" value="Pickup" class="mr-2" required>
                                        <svg fill="#000000" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 442 442" xml:space="preserve">
                                            <g>
                                                <path d="M412.08,115.326c-0.006-0.322-0.027-0.643-0.064-0.961c-0.011-0.1-0.02-0.201-0.035-0.3
                                                    c-0.057-0.388-0.131-0.773-0.232-1.151c-0.013-0.05-0.032-0.097-0.046-0.146c-0.094-0.33-0.206-0.654-0.333-0.973
                                                    c-0.041-0.102-0.085-0.203-0.129-0.304c-0.126-0.289-0.266-0.571-0.42-0.848c-0.039-0.069-0.073-0.141-0.113-0.209
                                                    c-0.203-0.346-0.426-0.682-0.672-1.004c-0.019-0.025-0.042-0.049-0.061-0.074c-0.222-0.285-0.463-0.558-0.718-0.82
                                                    c-0.07-0.072-0.143-0.142-0.215-0.212c-0.225-0.217-0.461-0.424-0.709-0.622c-0.077-0.062-0.15-0.126-0.229-0.185
                                                    c-0.311-0.234-0.634-0.457-0.979-0.657L226.034,1.359c-3.111-1.813-6.956-1.813-10.067,0l-181.092,105.5
                                                    c-0.345,0.201-0.668,0.423-0.979,0.657c-0.079,0.059-0.152,0.124-0.229,0.185c-0.248,0.198-0.484,0.405-0.709,0.622
                                                    c-0.073,0.07-0.145,0.14-0.215,0.212c-0.255,0.262-0.496,0.535-0.718,0.82c-0.02,0.025-0.042,0.049-0.061,0.074
                                                    c-0.246,0.322-0.468,0.658-0.672,1.004c-0.04,0.068-0.075,0.14-0.113,0.209c-0.154,0.277-0.294,0.559-0.42,0.848
                                                    c-0.044,0.101-0.088,0.202-0.129,0.304c-0.127,0.319-0.239,0.643-0.333,0.973c-0.014,0.049-0.033,0.097-0.046,0.146
                                                    c-0.101,0.378-0.175,0.763-0.232,1.151c-0.014,0.099-0.023,0.2-0.035,0.3c-0.037,0.319-0.058,0.639-0.064,0.961
                                                    c-0.001,0.058-0.012,0.115-0.012,0.174v211c0,3.559,1.891,6.849,4.966,8.641l181.092,105.5c0.029,0.017,0.059,0.027,0.088,0.043
                                                    c0.357,0.204,0.725,0.391,1.108,0.55c0.004,0.002,0.009,0.003,0.014,0.005c0.362,0.15,0.736,0.273,1.118,0.38
                                                    c0.097,0.027,0.193,0.051,0.291,0.075c0.299,0.074,0.603,0.134,0.912,0.181c0.103,0.016,0.205,0.035,0.308,0.047
                                                    c0.393,0.047,0.79,0.078,1.195,0.078s0.803-0.031,1.195-0.078c0.103-0.012,0.205-0.031,0.308-0.047
                                                    c0.309-0.047,0.613-0.107,0.912-0.181c0.097-0.024,0.194-0.047,0.291-0.075c0.382-0.107,0.756-0.23,1.118-0.38
                                                    c0.004-0.002,0.009-0.003,0.014-0.005c0.383-0.159,0.751-0.346,1.108-0.55c0.029-0.016,0.059-0.027,0.088-0.043l181.092-105.5
                                                    c3.075-1.792,4.966-5.082,4.966-8.641v-211C412.092,115.441,412.081,115.385,412.08,115.326z M221,209.427l-70.68-41.177
                                                    l161.226-93.927l70.681,41.177L221,209.427z M221,21.573l70.68,41.177l-161.226,93.927L59.774,115.5L221,21.573z M392.092,320.752
                                                    L231,414.601V374c0-5.523-4.477-10-10-10s-10,4.477-10,10v40.601L49.908,320.752V132.899l75.626,44.058
                                                    c0.005,0.003,0.011,0.006,0.016,0.01L211,226.747V334c0,5.523,4.477,10,10,10s10-4.477,10-10V226.747l161.092-93.848V320.752z" />
                                                <path d="M284.613,247.88c1.858,3.189,5.208,4.968,8.65,4.968c1.709,0,3.441-0.438,5.024-1.361l36.584-21.313
                                                    c4.772-2.78,6.387-8.902,3.607-13.674c-2.78-4.772-8.903-6.386-13.674-3.607l-36.584,21.313
                                                    C283.448,236.986,281.833,243.108,284.613,247.88z" />
                                            </g>
                                        </svg>
                                        <span class="ml-2 font-medium">Pickup</span>
                                    </label>

                                    <label for="delivery" class="w-1/2 rounded-md border border-gray-300 p-2 flex items-center">
                                        <input name="preferredService" type="radio" id="delivery" name="delivery_option" value="Delivery" class="mr-2" required>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25" height="25" viewBox="0 0 256 256" xml:space="preserve">

                                            <defs>
                                            </defs>
                                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                                <path d="M 89.034 43.825 L 74.452 27.423 c -0.725 -0.816 -1.767 -1.284 -2.859 -1.284 H 58.256 v -0.448 c 0 -3.723 -3.029 -6.752 -6.751 -6.752 H 6.752 C 3.029 18.94 0 21.969 0 25.692 v 35.098 c 0 2.219 1.805 4.024 4.023 4.024 h 10.374 c 0.827 3.573 4.029 6.247 7.85 6.247 s 7.023 -2.674 7.85 -6.247 h 25.193 h 2.967 h 10.701 c 0.827 3.573 4.029 6.247 7.85 6.247 s 7.023 -2.674 7.85 -6.247 h 1.519 c 2.109 0 3.825 -1.715 3.825 -3.825 V 46.367 C 90 45.43 89.657 44.527 89.034 43.825 z M 85.213 43.993 H 67.936 c -0.336 0 -0.609 -0.274 -0.609 -0.61 v -7.785 c 0 -0.336 0.273 -0.609 0.609 -0.609 h 9.272 L 85.213 43.993 z M 6.752 21.907 h 44.753 c 2.086 0 3.784 1.698 3.784 3.785 v 0.448 v 22.322 H 2.967 v -22.77 C 2.967 23.605 4.665 21.907 6.752 21.907 z M 22.246 68.093 c -2.81 0 -5.097 -2.286 -5.097 -5.097 s 2.287 -5.097 5.097 -5.097 s 5.097 2.286 5.097 5.097 S 25.057 68.093 22.246 68.093 z M 30.218 61.846 c -0.561 -3.902 -3.917 -6.913 -7.972 -6.913 s -7.411 3.011 -7.972 6.913 H 4.023 c -0.582 0 -1.056 -0.474 -1.056 -1.057 v -9.361 h 52.322 v 10.417 H 30.218 z M 76.807 68.093 c -2.811 0 -5.097 -2.286 -5.097 -5.097 s 2.286 -5.097 5.097 -5.097 s 5.097 2.286 5.097 5.097 S 79.617 68.093 76.807 68.093 z M 86.175 61.846 h -1.397 c -0.561 -3.902 -3.917 -6.913 -7.972 -6.913 s -7.411 3.011 -7.972 6.913 H 58.256 v -32.74 h 13.337 c 0.244 0 0.478 0.105 0.641 0.288 l 2.335 2.627 h -6.634 c -1.972 0 -3.576 1.604 -3.576 3.576 v 7.785 c 0 1.972 1.604 3.577 3.576 3.577 h 19.097 v 14.029 C 87.033 61.462 86.649 61.846 86.175 61.846 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            </g>
                                        </svg>
                                        <span class="ml-2 font-medium">Delivery</span>
                                    </label>

                                    <div id="infoMessage" class="hidden absolute bg-white border border-gray-300 p-3 text-justify rounded shadow mt-[-4rem] mr-20 w-90">
                                        For delivery, the courier will collect shipping fees from the recipient upon
                                        arrival at the
                                        delivery location.
                                        <br />
                                        Please expect delivery within 7 days at most.
                                        <br />
                                        For any questions or concerns, please contact the courier or email us for more
                                        details.
                                    </div>

                                    <!-- Info button with provided icon -->
                                    <button id="infoButton" class="rounded-full p-2">
                                        <svg class="svg-icon" style="width: 3em; height: 3em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M512 179.2a332.8 332.8 0 1 1 0 665.6 332.8 332.8 0 0 1 0-665.6z m0 51.2a281.6 281.6 0 1 0 0 563.2 281.6 281.6 0 0 0 0-563.2z" />
                                            <path d="M512.768 339.968a38.7072 38.7072 0 1 1 0 77.3632 38.7072 38.7072 0 0 1 0-77.3632zM546.4576 678.6048h-27.2384c-14.2848 0-29.0304-12.3904-29.0304-23.7056V498.0224h-9.728a25.8048 25.8048 0 1 1 0-51.6096s31.488-0.1024 32.3072 0c13.1072 0.9728 22.5792 6.656 22.5792 17.3568v163.2768h11.1104a25.8048 25.8048 0 1 1 0 51.5584z" />
                                        </svg>
                                    </button>
                                </div>



                                <script>
                                    const infoButton = document.getElementById('infoButton');
                                    const infoMessage = document.getElementById('infoMessage');
                                    let timeoutId;

                                    function showInfoMessage() {
                                        infoMessage.classList.remove('hidden');
                                        clearTimeout(timeoutId);
                                        timeoutId = setTimeout(() => {
                                            infoMessage.classList.add('hidden');
                                        }, 10000);
                                    }

                                    infoButton.addEventListener('click', showInfoMessage);

                                    infoButton.addEventListener('mouseenter', showInfoMessage);

                                    infoButton.addEventListener('mouseleave', function() {
                                        clearTimeout(timeoutId);
                                        infoMessage.classList.add('hidden');
                                    });
                                </script>

                                <div class="w-full text-left px-3 font-semibold">
                                    Delivery Address:
                                    <div class="my-2">
                                        <input name="shippingAddress" id="autocomplete" class="w-full h-10 text-xs font-light" type="text" placeholder="Address" style="position: relative;" required>
                                    </div>
                                    <div id="map" class="h-48 bg-gray-100 justify-center flex items-center mb-3">
                                    </div>
                                </div>

                                {{-- <ul class="flex flex-row w-full mb-3 items-center pr-4">
                                    <li class="w-2/4 text-left pl-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">Email :</span>
                                        </div>
                                    </li>
                                    <li class="w-3/4 text-left">
                                        <div class="my-1 flex items-center">
                                            <input class="w-full h-10 text-xs" type="text" placeholder="Email">
                                        </div>
                                    </li>
                                </ul> --}}

                                <ul class="flex flex-row w-full mb-3 items-center pr-4">
                                    <li class="w-2/4 text-left pl-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">Payment Method :</span>
                                        </div>
                                    </li>
                                    <li class="w-3/4 text-left">
                                        <div class="my-1 flex items-center ">
                                            <select name="paymentOption" class="w-full h-10 text-xs bg-gray-200 rounded-lg border-none" required>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="Paypal">PayPal</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </li>
                                </ul>

                                <ul class="flex flex-row w-full mb-3 items-center pr-4">
                                    <li class="w-2/4 text-left pl-3">
                                        <div class="my-1 mt-2">
                                            <span class="font-medium">Payment Proof :</span>
                                        </div>
                                    </li>
                                    <li class="w-3/4 text-left">
                                        <div class="my-1 flex items-center">
                                            <!-- Modified file input -->
                                            <label for="fileUpload" class="w-full h-10 text-xs bg-gray-200 rounded-lg px-4 flex items-center justify-center cursor-pointer">
                                                <input name="proofOfPayment" type="file" id="fileUpload" class="hidden" accept=".jpg, .jpeg, .png" required>
                                                <ul id="uploadLabel" class="flex flex-row w-full items-center gap-10" style="max-width: 200px;">
                                                    <li class="w-full truncate">Upload Image</li>
                                                    <li class="w-1/4 font-medium text-lg text-right">+</li>
                                                </ul>
                                            </label>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const fileInput = document.getElementById('fileUpload');
                                                    const uploadLabel = document.getElementById('uploadLabel');
                                            
                                                    fileInput.addEventListener('change', function() {
                                                        if (fileInput.files.length > 0) {
                                                            uploadLabel.querySelector('li').textContent = fileInput.files[0].name;
                                                        } else {
                                                            uploadLabel.querySelector('li').textContent = 'Upload Image';
                                                        }
                                                    });
                                                });
                                            </script>
                                            <!-- End of modified file input -->
                                        </div>
                                    </li>
                                </ul>

                                <hr class="my-2">

                                <livewire:main.user.livewire.user-checkout-total />

                                <livewire:main.user.livewire.complete-transaction />



                                </ul>
                            </div>

                        </div>
                </div>
                </form>
            </div>
        </div>

    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('autocomplete');
            var map = null;
            var marker = null;

            async function initMap() {
                const { Map } = await google.maps.importLibrary("maps");
                const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
                map = new Map(document.getElementById("map"), {
                    center: {lat: 0, lng: 0},
                    zoom: 16,
                    mapId: "c1568d819b26135",
                });

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var userLatLng = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        map.setCenter(userLatLng);

                        marker.setPosition(map.getCenter());

                        updateAddress(marker.getPosition());
                    }, function() {
                        handleLocationError(true);
                    });
                } else {
                    handleLocationError(false);
                }

                function handleLocationError(browserHasGeolocation) {
                    var errorMessage = browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.';
                    alert(errorMessage);
                }

                marker = new google.maps.Marker({
                    position: map.getCenter(),
                    map: map,
                    draggable: false
                });

                updateAddress(marker.getPosition());

                let debounceTimer;

                map.addListener('drag', function() {
                    clearTimeout(debounceTimer);
                    marker.setPosition(map.getCenter());
                    debounceTimer = setTimeout(function() {
                        updateAddress(marker.getPosition());
                    }, 200);
                });

                map.addListener('zoom_changed', function() {
                    clearTimeout(debounceTimer);
                    marker.setPosition(map.getCenter());
                    debounceTimer = setTimeout(function() {
                        updateAddress(marker.getPosition());
                    }, 200); 
                });

                marker.addListener('dragend', function() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(function() {
                        map.panTo(marker.getPosition());
                        updateAddress(marker.getPosition());
                    }, 200);
                });

                var autocomplete = new google.maps.places.Autocomplete(searchInput, {
                    types: ['address'],
                    componentRestrictions: { country: 'ph' }
                });
                autocomplete.addListener('place_changed', function() {
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        console.error("No location selected");
                        return;
                    }
                    var lat = place.geometry.location.lat();
                    var lng = place.geometry.location.lng();
                    map.setCenter({ lat: lat, lng: lng });
                    marker.setPosition({ lat: lat, lng: lng });
                    updateAddress(marker.getPosition());
                });
            }

            initMap();

            function updateAddress(latLng) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'location': latLng }, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            searchInput.value = results[0].formatted_address;
                        } else {
                            console.error('No results found');
                        }
                    }
                });
            }
        });
    </script>
</x-app-layout>