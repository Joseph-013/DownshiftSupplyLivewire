<div>

    <div class="w-full flex-row px-3">
        <ul class="flex flex-row items-center w-full h-6 mr-2">
            <li class="w-2/12 h-full text-center sm:text-xs text-xxs">
                <button type="button" wire:click="sort('id')"
                    class="w-full h-full flex flex-row items-center justify-center hover:bg-gray-200">
                    ID
                    @if ($sortBy === 'id')
                        @if ($sortOrder === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        @endif
                    @endif
                </button>
            </li>
            <li class="w-2/12 h-full text-center sm:text-xs text-xxs">
                <button type="button" wire:click="sort('date')"
                    class="w-full h-full flex flex-row items-center justify-center hover:bg-gray-200">
                    Date
                    @if ($sortBy === 'created_at')
                        @if ($sortOrder === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        @endif
                    @endif
                </button>
            </li>
            <li class="w-3/12 h-full text-center sm:text-xs text-xxs">
                <button type="button" wire:click="sort('firstName')"
                    class="w-full h-full flex flex-row items-center justify-center hover:bg-gray-200">
                    Customer
                    @if ($sortBy === 'firstName')
                        @if ($sortOrder === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        @endif
                    @endif
                </button>
            </li>
            <li class="w-2/12 h-full text-center sm:text-xs text-xxs dropdown">
                <button class="w-full h-full dropbtn hover:bg-gray-200">Status</button>
                <div class="dropdown-content flex-col w-36">
                    <button wire:click="filter('All')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'All' ? 'underline' : '' }}">All</button>
                    <button wire:click="filter('Processing')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'Processing' ? 'underline' : '' }}">Processing</button>
                    <button wire:click="filter('On Hold')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'On Hold' ? 'underline' : '' }}">On
                        Hold</button>
                    <button wire:click="filter('Cancelled')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'Cancelled' ? 'underline' : '' }}">Cancelled</button>
                    <button wire:click="filter('Returned')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'Returned' ? 'underline' : '' }}">Returned</button>
                    <button wire:click="filter('In Transit')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'In Transit' ? 'underline' : '' }}">In
                        Transit</button>
                    <button wire:click="filter('Ready for Pickup')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'Ready for Pickup' ? 'underline' : '' }}">Ready
                        for
                        Pickup</button>
                    <button wire:click="filter('Completed')"
                        class="hover:bg-gray-200 h-7 {{ $filterStatus === 'Completed' ? 'underline' : '' }}">Completed</button>
                </div>
            </li>
            <li class="w-3/12 h-full text-center sm:text-xs text-xxs">
                <button type="button" wire:click="sort('total')"
                    class="w-full h-full flex flex-row items-center justify-center hover:bg-gray-200">
                    Total
                    @if ($sortBy === 'grandTotal')
                        @if ($sortOrder === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        @endif
                    @endif
                </button>
            </li>
        </ul>
    </div>
    <hr class="my-1">
    @isset($itemTemplateToggleRes)
        <div
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 block lg:hidden justify-center items-center z-50">
            @if ($itemTemplateToggleRes != false)
                <livewire:online-create :transaction="$itemTemplateToggleRes" mode="{{ 'read' }}" />
            @endif
        </div>
    @endisset
    <div class="w-full h-96 overflow-y-auto mb-5" id="orders-container">
        <ul class=" w-full flex flex-col items-center px-3">
            @foreach ($transactions as $transaction)
                @if ($transaction->purchaseType === 'Online')
                    <li class="w-full flex justify-center select-none px-2" wire:key="{{ $transaction->id }}">
                        {{-- Product Details --}}
                        <input wire:click="selectTransaction({{ $transaction->id }})" hidden type="radio"
                            id="transactionId{{ $transaction->id }}" name="productList">
                        <label
                            class="w-full py-2 my-1  border-t-2 border-b-2 border-gray shadow-sm text-sm flex items-center"
                            for="transactionId{{ $transaction->id }}">
                            <ul class="flex flex-row w-full">
                                <li class="w-2/12 flex items-center text-center sm:text-xs text-xxs">
                                    <span class="inline-block h-4 w-4 rounded-full mr-2 ml-2
                        ">
                                    </span>{{ $transaction->id }}
                                </li>
                                <li class="w-2/12 text-center sm:text-xs text-xxs">
                                    {{ \Carbon\Carbon::parse($transaction->created_at)->format('m-d-Y') }}
                                </li>
                                <li class="w-3/12 text-center sm:text-xs text-xxs">{{ $transaction->firstName }}
                                    {{ $transaction->lastName }}
                                </li>
                                <li class="w-2/12 text-center sm:text-xs text-xxs flex justify-center items-center">
                                    <div
                                        class="flex justify-center items-center rounded-full h-7 w-7 shadow-md
                        @switch($transaction->status)
            @case('Processing')
                bg-black
            @break

            @case('On Hold')
                bg-yellow-500
            @break

            @case('Cancelled')
                bg-red-500
            @break

            @case('Returned')
                bg-gray-500
            @break

            @case('In Transit')
                bg-cyan-600
            @break

            @case('Ready for Pickup')
                bg-cyan-600
            @break

            @case('Completed')
                bg-teal-500
            @break

            @default
                bg-black
        @endswitch
    ">

                                        @switch($transaction->status)
                                            @case('Processing')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-hourglass-split text-white"
                                                    viewBox="0 0 16 16"
                                                    style="filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.8));">
                                                    <path
                                                        d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                                                </svg>
                                            @break

                                            @case('On Hold')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-pause-circle text-white"
                                                    viewBox="0 0 16 16"
                                                    style="filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.8));">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0z" />
                                                </svg>
                                            @break

                                            @case('Cancelled')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-x-circle text-white" viewBox="0 0 16 16"
                                                    style="filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.8));">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                </svg>
                                            @break

                                            @case('Returned')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-arrow-return-left text-white"
                                                    viewBox="0 0 16 16"
                                                    style="filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.8));">
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                                                </svg>
                                            @break

                                            @case('In Transit')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-truck text-white" viewBox="0 0 16 16"
                                                    style="filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.8));">
                                                    <path
                                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                                                </svg>
                                            @break

                                            @case('Ready for Pickup')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-box-seam text-white" viewBox="0 0 16 16"
                                                    style="filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.8));">
                                                    <path
                                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                                                </svg>
                                            @break

                                            @case('Completed')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-check-circle text-white"
                                                    viewBox="0 0 16 16"
                                                    style="filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.8));">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                </svg>
                                            @break
                                        @endswitch
                                    </div>
                                </li>

                                <li class="w-3/12 text-center sm:text-xs text-xxs">
                                    {{ number_format($transaction->grandTotal, 2) }}
                                </li>
                                @if (!$transaction->viewedByAdmin && $transaction->status === 'Completed')
                                    <span
                                        class="top-0 right-0 bg-green-500 text-white rounded-full h-4 w-4 flex items-center justify-center text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                @elseif($transaction->status === 'Processing')
                                    <span
                                        class="top-0 right-0 bg-red-500 text-white rounded-full h-4 w-4 flex items-center justify-center text-xs">!</span>
                                @endif
                            </ul>
                        </label>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="flex flex-row items-center mt-4 w-full justify-center">

        <div class="w-96 lg:w-4/5 text-center px-3">
            {{ $transactions->links('pagination.default') }}
        </div>

        @isset($itemTemplateToggle)
            <livewire:online-create :transaction="$itemTemplateToggle" mode="{{ 'write' }}" />
        @endisset
    </div>
    <style>
        /* Select buttons inside the specified container */
        .flex-row button {
            cursor: pointer;
        }

        /* Additional styles for hover effects */
        .flex-row button:hover {
            /* Add hover effects here if needed */
        }

        li:hover {
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .text-xxs {
                font-size: 0.5rem;
            }
        }
    </style>
</div>
