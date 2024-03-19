<div>
    <div class="w-full h-96 overflow-y-auto mb-5" id="orders-container">
        <ul class=" w-full flex flex-col items-center">
            @foreach ($transactions as $transaction)
                @if ($transaction->purchaseType === 'Online')
                    <div class="block lg:hidden">
                        @if ($selectedTransactionId && $transaction->id == $selectedTransactionId)
                            <livewire:online-transaction-details transaction="{{ $transaction->id }}"
                                wire:key="{{ $transaction->id }}" />
                        @endif
                    </div>
                    <li wire:click="selectTransaction({{ $transaction->id }})"
                        class="w-full flex justify-center select-none px-2" wire:key="{{ $transaction->id }}">
                        {{-- Product Details --}}
                        <input class="widenWhenSelected" hidden type="radio" id="transactionId{{ $transaction->id }}"
                            name="productList">
                        <label
                            class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                            for="transactionId{{ $transaction->id }}">
                            <ul class="flex flex-row w-full">
                                <li class="w-2/12 text-center text-xs">{{ $transaction->id }}</li>
                                <li class="w-2/12 text-left text-xs">
                                    {{ \Carbon\Carbon::parse($transaction->created_at)->format('m-d-Y') }}</li>
                                <li class="w-3/12 text-left text-xs">{{ $transaction->firstName }}
                                    {{ $transaction->lastName }}</li>
                                <li class="w-2/12 text-center text-xs flex justify-center items-center">
                                    @switch($transaction->status)
                                        @case('Processing')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                                            </svg>
                                        @break

                                        @case('On Hold')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-pause-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path
                                                    d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0z" />
                                            </svg>
                                        @break

                                        @case('Cancelled')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                            </svg>
                                        @break

                                        @case('Returned')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                        @break

                                        @case('In Transit')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                                            </svg>
                                        @break

                                        @case('Ready for Pickup')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                            </svg>
                                        @break

                                        @case('Complete')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path
                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                            </svg>
                                        @break
                                    @endswitch
                                </li>
                                <li class="w-3/12 text-center text-xs">{{ number_format($transaction->grandTotal, 2) }}
                                </li>
                            </ul>
                        </label>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="flex flex-row items-center mt-4 w-full justify-center">

        <div class="w-4/5 text-center">
            <div class="flex justify-between items-center w-full h-full px-3">
                <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $transactions->url(1) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-skip-backward" viewBox="0 0 16 16">
                        <path
                            d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m7 1.133L1.696 8 7.5 11.367zm7.5 0L9.196 8 15 11.367z" />
                    </svg>
                </a>
                <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $transactions->previousPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-skip-start" viewBox="0 0 16 16">
                        <path
                            d="M4 4a.5.5 0 0 1 1 0v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L5 8.752V12a.5.5 0 0 1-1 0zm7.5.633L5.696 8l5.804 3.367z" />
                    </svg>
                </a>
                <div
                    class="text-sm bg-slate-300 py-2 px-3 w-12 rounded-full flex justify-center cursor-default select-none">
                    {{ $transactions->currentPage() . '/' . $transactions->lastPage() }}
                </div>
                <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $transactions->nextPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-skip-end" viewBox="0 0 16 16">
                        <path
                            d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0zM5 4.633 10.804 8 5 11.367z" />
                    </svg>
                </a>
                <a class="hover:bg-slate-300 py-1 px-2 rounded-full"
                    href="{{ $transactions->url($transactions->lastPage()) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-skip-forward" viewBox="0 0 16 16">
                        <path
                            d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.752l-6.267 3.636c-.52.302-1.233-.043-1.233-.696v-2.94l-6.267 3.636C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696L7.5 7.248v-2.94c0-.653.713-.998 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5M1 4.633v6.734L6.804 8zm7.5 0v6.734L14.304 8z" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- OVERLAY -->
        <!-- <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">

            <div class="absolute inset-0 bg-black opacity-50"></div>


            <div class="bg-gray-100 p-6 rounded-lg relative z-10 border">
                create product component here
            </div>
        </div> -->
        <!-- END OF OVERLAY -->

    </div>
</div>
