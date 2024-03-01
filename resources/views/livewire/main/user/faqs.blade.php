<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    FAQs
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full mx-3">
                {{-- Right Panel border-2 border-black --}}
                <div class="w-full h-full text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row">
                            <!-- QUESTIONS AND ANSWERS -->
                            <ul class="flex flex-col md:flex-row w-full my-1">
                                <li class="w-full md:w-1/4 text-left text-sm ">
                                    <span class="font-medium mt-1">Have some questions?</span> <br>
                                    Find your answers here
                                </li>
                                <li class="w-full md:w-3/4 h-full px-3 overflow-y-auto border" id="faqs-container">

                                    <livewire:main.user.livewire.user-faqs-qna />

                                </li>
                            </ul>
                            <!-- MAP -->
                            <ul class="flex flex-col md:flex-row w-full my-2">
                                <li class="w-full md:w-1/4 text-left text-sm">
                                    <span class="font-medium mt-1">Where can you find us?</span> <br>
                                    Be directed using this map
                                </li>
                                <div class="w-3/4 h-full px-3 border" id="faqs-container">
                                    <div class="w-full h-full px-3 border" id="map"></div>
                                </div>
                            </ul>

                            <!-- EMAIL -->
                            <div class="overlay-container">
                                <!-- Livewire component section with overlay -->
                                <livewire:main.user.livewire.user-faqs-email />

                                @guest
                                    <div class="overlay">
                                        <div class="center-content">
                                            <p>Please login to use this feature.</p>
                                            <a href="{{ route('login') }}"
                                                class="h-8 w-35 px-20 mt-3 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                                                Go to Login
                                            </a>
                                        </div>
                                    </div>
                                @endguest
                                <!-- Overlay for the livewire component -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            async function initMap() {
                const { Map } = await google.maps.importLibrary("maps");
                const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
                const map = new Map(document.getElementById("map"), {
                    center: {lat: 14.629639825768203, lng: 121.0009090238659},
                    zoom: 14,
                    mapId: "c1568d819b26135",
                });
                const contentString = '<p><b>Downshift Supply</b></p>';
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    ariaLabel: "Downshift Supply",
                });
                const marker = new AdvancedMarkerElement({
                    map,
                    position: {lat: 14.629639825768203, lng: 121.0009090238659},
                    title: "Downshift Supply"
                });
                marker.addListener("click", () => {
                    infowindow.open({
                        anchor: marker,
                        map,
                    });
                });
            }

            initMap();
        </script>
</x-app-layout>
