<div class="flex-1">
    <form id="searchForm" wire:submit.prevent="submitSearch" class="flex flex-row">
        <div class="md:ml-2 ms-2 flex flex-row w-full">
            <input wire:model="search" name="search" id="searchInput" class="flex-1 focus:border-orange-500 outline-none rounded-s-lg border-gray-500 border-l-2 border-t-2 border-b-2 border-e-0 h-full w-full" type="text">
            <button type="button" wire:click.prevent="clearSearch"
                class="rounded-e-lg border-gray-500 border-r-2 border-t-2 border-b-2 h-full w-10 flex items-center justify-center">
                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                </svg>
            </button>
        </div>
        <style>
    /* Style for the filter options */
    #filterOptions {
        position: absolute;
        top: calc(100% + 10px); /* Position the options below the button */
        left: 0;
        z-index: 999; /* Ensure the options are above other content */
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        display: none; /* Initially hidden */
        flex-direction: row; /* Display options in a column layout */
    }

    /* Style for individual filter options */
    #filterOptions label {
        margin-bottom: 5px; /* Add some spacing between options */
    }
</style>

<!-- Your HTML content -->

{{-- <button type="button" id="filterButton" class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center">
    <svg class="svg-icon mr-2" style="width: 1.2em; height: 1.2em; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <path
                    d="M859.02 234.524l0.808-0.756 0.749-0.813c27.047-29.356 33.876-70.34 17.823-106.957-15.942-36.366-50.416-58.957-89.968-58.957H163.604c-38.83 0-73.043 22.012-89.29 57.444-16.361 35.683-10.632 76.301 14.949 106.004l0.97 1.126 280.311 266.85 2.032 312.074c0.107 16.502 13.517 29.805 29.995 29.805l0.2-0.001c16.568-0.107 29.912-13.626 29.804-30.194l-2.198-337.564-296.478-282.241c-9.526-11.758-11.426-26.933-5.044-40.851 6.446-14.059 19.437-22.452 34.75-22.452h624.828c15.6 0 28.69 8.616 35.017 23.047 6.31 14.391 3.924 29.831-6.354 41.497l-304.13 284.832 1.302 458.63c0.047 16.54 13.469 29.916 29.998 29.915h0.087c16.568-0.047 29.962-13.517 29.915-30.085L573.04 502.36l285.98-267.836z"
                    fill="" />
                <path
                    d="M657.265 595.287c0 16.498 13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.498 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997H687.262c-16.498 0-29.997 13.499-29.997 29.997z m273.894 138.882H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z m0 168.878H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z"
                    fill="" />
    </svg>
    <span class="hidden sm:inline">Filters</span>
</button>

<div id="filterOptions" class="flex flex-row">
    <input type="checkbox" id="filter1" name="filter1">
    <label for="filter1">Engine</label><br>
    <input type="checkbox" id="filter2" name="filter2">
    <label for="filter2">Filter 2</label><br>
    <input type="checkbox" id="filter3" name="filter3">
    <label for="filter3">Filter 3</label><br>
    <input type="checkbox" id="filter4" name="filter4">
    <label for="filter4">Filter 4</label><br>
</div> --}}


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButton = document.getElementById('filterButton');
        const filterOptions = document.getElementById('filterOptions');

        filterButton.addEventListener('click', function(event) {
            // Prevent default behavior (page reload)
            event.preventDefault();
            // Toggle the visibility of filter options
            filterOptions.style.display = (filterOptions.style.display === 'none') ? 'block' : 'none';
        });

        // Position the filter options near the filter button
        function positionFilterOptions() {
            const buttonRect = filterButton.getBoundingClientRect();
            filterOptions.style.top = `${buttonRect.bottom}px`;
            filterOptions.style.left = `${buttonRect.left}px`;
        }

        // Initial positioning
        positionFilterOptions();

        // Recalculate position on window resize
        window.addEventListener('resize', positionFilterOptions);
    });
</script>
        <!-- <button type="button"
            class="ml-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg
                class="svg-icon mr-2"
                style="width: 1.2em; height: 1.2em; fill: currentColor;overflow: hidden;"
                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M859.02 234.524l0.808-0.756 0.749-0.813c27.047-29.356 33.876-70.34 17.823-106.957-15.942-36.366-50.416-58.957-89.968-58.957H163.604c-38.83 0-73.043 22.012-89.29 57.444-16.361 35.683-10.632 76.301 14.949 106.004l0.97 1.126 280.311 266.85 2.032 312.074c0.107 16.502 13.517 29.805 29.995 29.805l0.2-0.001c16.568-0.107 29.912-13.626 29.804-30.194l-2.198-337.564-296.478-282.241c-9.526-11.758-11.426-26.933-5.044-40.851 6.446-14.059 19.437-22.452 34.75-22.452h624.828c15.6 0 28.69 8.616 35.017 23.047 6.31 14.391 3.924 29.831-6.354 41.497l-304.13 284.832 1.302 458.63c0.047 16.54 13.469 29.916 29.998 29.915h0.087c16.568-0.047 29.962-13.517 29.915-30.085L573.04 502.36l285.98-267.836z"
                    fill="" />
                <path
                    d="M657.265 595.287c0 16.498 13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.498 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997H687.262c-16.498 0-29.997 13.499-29.997 29.997z m273.894 138.882H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z m0 168.878H687.262c-16.498 0-29.997 13.499-29.997 29.997s13.499 29.997 29.997 29.997h243.897c16.498 0 29.997-13.499 29.997-29.997 0-16.498-13.499-29.997-29.997-29.997z"
                    fill="" />
            </svg>
            <span class="hidden md:inline">Filters</span>
            <div class="absolute">
                Filters Container
            </div>
        </button> -->
        <button type="submit"
            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg
                class="feather feather-search" fill="none" height="18" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                width="24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" x2="16.65" y1="21" y2="16.65" />
            </svg>
            <span class="hidden md:inline">Search</span>
        </button>
    </form>
</div>