<div class="flex-1">
    <form id="searchForm" wire:submit.prevent="submitSearch" class="flex flex-row">
        <div class="mx-2 flex flex-row w-full">
            <input wire:model="search" name="search" id="searchInput"
                class="flex-1 focus:border-orange-500 outline-none rounded-s-lg border-gray-500 border-l-2 border-t-2 border-b-2 border-e-0 h-full w-full"
                type="text" />
            <button type="button" wire:click.prevent="clearSearch"
                class="rounded-e-lg border-gray-500 border-r-2 border-t-2 border-b-2 h-full w-10 flex items-center justify-center">
                <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                </svg>
            </button>
        </div>
        <style>
            /* Style for the filter options */
            #filterOptions {
                position: absolute;
                top: calc(100% + 10px);
                /* Position the options below the button */
                left: 0;
                z-index: 999;
                /* Ensure the options are above other content */
                background-color: white;
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 10px;
                display: none;
                /* Initially hidden */
                flex-direction: row;
                /* Display options in a column layout */
            }

            /* Style for individual filter options */
            #filterOptions label {
                margin-bottom: 5px;
                /* Add some spacing between options */
            }
        </style>

        <!-- Your HTML content -->

        <button type="submit"
            class="mx-2 rounded-lg border-gray-500 border-2 px-3 text-sm hover:bg-gray-200 flex items-center"><svg
                class="feather feather-search" fill="none" height="18" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" x2="16.65" y1="21" y2="16.65" />
            </svg>
            <span class="hidden md:inline">Search</span>
        </button>
    </form>
</div>
