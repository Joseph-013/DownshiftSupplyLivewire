<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Downshift Supply') }}</title>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZDzNhZrn-mUo6YL9-pFwJmFhhdymQovs&loading=async&libraries=places&callback=initMap">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">

    <!-- Bootstrap Head -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-montserrat antialiased">
    {{-- <div class="min-h-screen bg-gray-100"> --}}
    <div class="flex flex-col h-screen">
        <div id="alertDiv"
            class="notificationTemp shadow-md shadow-gray-500 rounded-lg text-center font-bold animate-slide-out px-4 py-2 mt-4 border max-w-96 border-none">
            {{-- Text Container --}}
            <div class="font-normal" id="alertMessageDiv">
                {{-- message --}}
            </div>
        </div>

        <livewire:layout.confirmation-notification />

        <script type="text/javascript" src="{{ URL::asset('js/alert.js') }}"></script>

        {{-- alertConfirmFrontEnd --}}
        <livewire:layout.navigation />

        <!-- Page Content -->
        <main class="flex flex-grow justify-center">
            {{ $slot }}
        </main>

        {{--  --}}
    </div>

    <!-- Bootstrap Body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        function prevSlideDet() {
            $('#detailsCarousel').carousel('prev');
        }

        function nextSlideDet() {
            $('#detailsCarousel').carousel('next');
        }

        function prevSlideInvRead() {
            $('#inventoryReadCarousel').carousel('prev');
        }

        function nextSlideInvRead() {
            $('#inventoryReadCarousel').carousel('next');
        }

        function prevSlideInvWrite() {
            $('#inventoryWriteCarousel').carousel('prev');
        }

        function nextSlideInvWrite() {
            $('#inventoryWriteCarousel').carousel('next');
        }

        function prevSlidePrev() {
            $('#previewCarousel').carousel('prev');
        }

        function nextSlidePrev() {
            $('#previewCarousel').carousel('next');
        }
    </script>
    {{-- @livewireScripts --}}

</body>

</html>
