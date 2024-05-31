<div class="w-full lg:w-3/5 h-full px-3 text-right flex">
    @isset($itemTemplateToggleRes)
        <div
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 block lg:hidden justify-center items-center z-50">
            @if ($itemTemplateToggleRes != false)
                <livewire:order-overlay order="{{ $itemTemplateToggleRes }}" />
            @endif
        </div>
    @endisset
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex-row ml-6 sm:ml-12">
            <ul class="flex flex-row items-center w-full h-6 pr-2">
                <li class="w-3/12 h-full text-center text-xxs sm:text-xs">
                    <button type="button" wire:click="sort('date')"
                        class="w-full h-full flex flex-row items-center justify-center hover:bg-gray-200">
                        Date
                        @if ($sortBy === 'created_at')
                            @if ($sortOrder === 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    fill="currentColor" class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                    <path
                                        d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    fill="currentColor" class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                                    <path
                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            @endif
                        @endif
                    </button>
                </li>
                <li class="w-3/12 h-full text-center text-xxs sm:text-xs dropdown">
                    <button class="w-full h-full dropbtn hover:bg-gray-200">Mode</button>
                    <div class="dropdown-content flex-col w-36">
                        <button wire:click="filter(['Mode', 'All'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'preferredService' && $filterColumn[1] === 'All' ? 'underline' : '' }}">All</button>
                        <button wire:click="filter(['Mode', 'Delivery'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'preferredService' && $filterColumn[1] === 'Delivery' ? 'underline' : '' }}">Delivery</button>
                        <button wire:click="filter(['Mode', 'Pickup'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'preferredService' && $filterColumn[1] === 'Pickup' ? 'underline' : '' }}">Pickup</button>
                    </div>
                </li>
                <li class="w-3/12 h-full text-center text-xxs sm:text-xs dropdown">
                    <button class="w-full h-full dropbtn hover:bg-gray-200">Status</button>
                    <div class="dropdown-content flex-col w-36">
                        <button wire:click="filter(['Status', 'All'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'status' && $filterColumn[1] === 'All' ? 'underline' : '' }}">All</button>
                        <button wire:click="filter(['Status', 'Processing'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'status' && $filterColumn[1] === 'Processing' ? 'underline' : '' }}">Processing</button>
                        <button wire:click="filter(['Status', 'On Hold'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'status' && $filterColumn[1] === 'On Hold' ? 'underline' : '' }}">On
                            Hold</button>
                        <button wire:click="filter(['Status', 'Cancelled'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'status' && $filterColumn[1] === 'Cancelled' ? 'underline' : '' }}">Cancelled</button>
                        <button wire:click="filter(['Status', 'Returned'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'status' && $filterColumn[1] === 'Returned' ? 'underline' : '' }}">Returned</button>
                        <button wire:click="filter(['Status', 'In Transit'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'status' && $filterColumn[1] === 'In Transit' ? 'underline' : '' }}">In
                            Transit</button>
                        <button wire:click="filter(['Status', 'Ready for Pickup'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'status' && $filterColumn[1] === 'Ready for Pickup' ? 'underline' : '' }}">Ready
                            for Pickup</button>
                        <button wire:click="filter(['Status', 'Completed'])"
                            class="hover:bg-gray-200 h-7 {{ isset($filterColumn) && $filterColumn[0] === 'status' && $filterColumn[1] === 'Completed' ? 'underline' : '' }}">Completed</button>
                    </div>
                </li>
                <li class="w-2/12 h-full text-center text-xxs sm:text-xs">
                    <button type="button" wire:click="sort('total')"
                        class="w-full h-full flex flex-row items-center justify-center hover:bg-gray-200">
                        Total
                        @if ($sortBy === 'grandTotal')
                            @if ($sortOrder === 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    fill="currentColor" class="bi bi-caret-up-fill ml-1" viewBox="0 0 16 16">
                                    <path
                                        d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    fill="currentColor" class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
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

        <div class="w-full h-full sm:px-3 px-0 overflow-y-auto" id="questions-container">
            <table class="w-full">
                <tbody>
                    @if ($transactionList && count($transactionList) != 0)
                        @foreach ($transactionList as $transaction)
                            <tr class="w-full" id="transaction{{ $transaction->id }}">
                                <td class="w-full flex justify-center select-none px-2"
                                    id="transactionRowLi-{{ $transaction->id }}">
                                    <input wire:click="showDetails({{ $transaction->id }})" hidden type="radio"
                                        id="productId{{ $transaction->id }}" name="productList" {{-- onchange="toggleListRow({{ $transaction->id }})" --}}
                                        @if (request()->query('orderId') == $transaction->id) checked @endif>
                                    <label
                                        class="w-full py-2 my-1 border-t-2 border-b-2 border-gray shadow-sm text-sm items-center"
                                        for="productId{{ $transaction->id }}">
                                        <table class="w-full py-1">
                                            <tr class="flex flex-row w-full text-xxs md:text-sm items-center">
                                                <td class="w-4/12 text-center">
                                                    {{ $transaction->created_at->format('m-d-Y h:i A') }}</td>
                                                <td class="w-3/12 text-center">{{ $transaction->preferredService }}
                                                </td>
                                                <td class="w-3/12 text-center">{{ $transaction->status }}</td>
                                                <td class="w-2/12 text-center">
                                                    {{ number_format($transaction->grandTotal, 2) }}</td>
                                            </tr>
                                        </table>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="w-full mt-3 text-gray-400 text-center">
                            No orders
                            {{ isset($filterColumn) && $filterColumn[1] !== 'All'
                                ? 'with ' . str_replace('preferredService', 'mode', $filterColumn[0]) . ' ' . $filterColumn[1]
                                : '' }}
                            found
                        </div>
                    @endif
                </tbody>
            </table>

        </div>
        <div class="flex flex-row w-full justify-center items-center mt-4">
            <div class="w-full max-w-96 flex justify-center font-montserrat">
                {{ $transactionList->links('pagination.default') }}
            </div>
        </div>
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

        tr:hover {
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .text-xxs {
                font-size: 0.5rem;
            }
        }
    </style>
</div>

<script>
    window.onload = function() {
        // Check if orderId query parameter exists
        const orderId = new URLSearchParams(window.location.search).get('orderId');
        if (orderId) {
            // Scroll to the selected input
            const selectedInput = document.getElementById('transaction' + orderId);
            if (selectedInput) {
                selectedInput.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }
    };
</script>
