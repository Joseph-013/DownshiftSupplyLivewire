<div>
    @isset($itemTemplateToggleRes)
        <div
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 block lg:hidden justify-center items-center z-50">
            @if ($itemTemplateToggleRes != false)
                <livewire:onsite-create :transaction="$itemTemplateToggleRes" mode="{{ 'read' }}" />
            @endif
        </div>
    @endisset
    <div class="w-full flex-row">
        <ul class="flex flex-row items-center w-full h-6">
            <li class="w-3/12 h-full text-center sm:text-xs text-xxs">
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
            <li class="w-3/12 h-full text-center sm:text-xs text-xxs">
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
                <button type="button" wire:click="sort('customer')"
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
            <li class="w-3/12 h-full text-center sm:text-xs text-xxs ">
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
        <!-- {{-- <ul class="flex flex-row w-full">
            <li class="w-3/12 text-center text-sm">ID</li>
            <li class="w-3/12 text-center text-sm">Date</li>
            <li class="w-3/12 text-center text-sm">Customer</li>
            <li class="w-3/12 text-center text-sm">Total</li>
        </ul> --}} -->
    </div>
    <hr class="my-1">
    <div class="w-full h-96 overflow-y-auto mb-5" id="transactions-container">
        <ul class=" w-full flex flex-col items-center">
            @foreach ($transactions as $transaction)
                @if ($transaction->purchaseType === 'Onsite')
                    {{-- Single Unit of Product --}}

                    <li wire:key="{{ $transaction->id }}" class="w-full flex justify-center select-none">
                        {{-- Product Details --}}

                        <input wire:click="selectTransaction({{ $transaction->id }})" hidden
                            type="radio" id="transactionId{{ $transaction->id }}" name="productList">
                        <label
                            class="w-full py-2 my-1  border-t-2 border-b-2 border-gray shadow-sm text-sm flex items-center"
                            for="transactionId{{ $transaction->id }}">
                            <ul class="flex flex-row w-full">
                                <li class="w-3/12 text-center sm:text-sm text-xxs">{{ $transaction->id }}</li>
                                <li class="w-3/12 text-center sm:text-sm text-xxs">
                                    {{ \Carbon\Carbon::parse($transaction->created_at)->format('m-d-Y') }}
                                </li>
                                <li class="w-3/12 text-center sm:text-sm text-xxs">{{ $transaction->firstName }}
                                    {{ $transaction->lastName }}
                                </li>
                                <li class="w-3/12 text-center sm:text-sm text-xxs">₱
                                    {{ number_format($transaction->grandTotal, 2) }}
                                </li>
                            </ul>
                        </label>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="flex flex-row items-center mt-4">
        <div class="w-1/2 text-center px-3">
            {{ $transactions->links('pagination.default') }}
        </div>

        <div class="w-1/2 flex justify-center">
            <button wire:click="itemTemplate(null)"
                class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing mb-2">
                Create Transaction
                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path
                        d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                    <path
                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                </svg>
            </button>
        </div>

        <!-- OVERLAY -->
        <!-- <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">

            <div class="absolute inset-0 bg-black opacity-50"></div>


            <div class="bg-gray-100 p-6 rounded-lg relative z-10 border">
                new transaction component here
            </div>
        </div> -->
        <!-- END OF OVERLAY -->

        <!-- OLD PAGINATION AND NEW TRANSACTION BUTTON -->
        <!-- <div class="w-full text-center">Pagination</div>
        <div class="w-full mt-5 flex justify-center">
            <button onclick="window.location='{{ route('admin.createtransactions') }}'" class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                New Transaction
                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                </svg>
            </button>
        </div> -->
        <!-- END OF OLD PAGINATION AND NEW TRANSACTION BUTTON -->

        @isset($itemTemplateToggle)
            <livewire:onsite-create :transaction="$itemTemplateToggle" mode="{{ 'write' }}" />
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

        li:hover{
            cursor: pointer;
        }

        @media (max-width: 600px){
            .text-xxs
            {
            font-size: 0.5rem;
            }
        }
    </style>
</div>
