<div class="w-2/5 h-full px-3">
    {{-- <form class="w-full h-full"> --}}
    {{-- Left Main Container --}}
    <div class="border-black border-1 w-full rounded-lg p-1">
        <div class="w-full h-96 overflow-y-auto flex-row" id="questions-container">
            <ul class="flex flex-row w-full mb-3">
                <li class="w-2/4 text-left text-sm px-3">
                    <div class="my-1 mt-2">
                        <span class="font-medium">ID:&nbsp;</span>{{ $transactionData ? $transactionData->id : '--' }}
                    </div>
                    <div class="my-1">
                        <span class="font-medium">Payment
                            Option:&nbsp;</span><br>{{ $transactionData ? $transactionData->paymentOption : '--' }}
                    </div>
                    <div class="my-1">
                        <span class="font-medium">Shipping
                            Address:&nbsp;</span><br>{{ $transactionData ? $transactionData->shippingAddress : '--' }}
                    </div>
                </li>
                <li class="w-2/4 text-left text-sm px-3">
                    <div class="my-1 mt-2">
                        <span class="font-medium">Date:&nbsp;</span>
                        {{ $transactionData ? $transactionData->purchaseDate->format('Y-m-d') : '--' }}
                    </div>
                    <div class="my-1">
                        <span class="font-medium">Preferred
                            Service:&nbsp;</span><br>{{ $transactionData ? $transactionData->preferredService : '--' }}
                    </div>
                    <div class="my-1">
                        <span class="font-medium">Courier
                            Service:&nbsp;</span><br>{{ $transactionData ? $transactionData->courierUsed : '--' }}
                    </div>
                    <div class="my-1">
                        <span class="font-medium">Tracking
                            Number:&nbsp;</span><br>{{ $transactionData ? $transactionData->trackingNumber : '--' }}
                    </div>
                </li>
            </ul>

            <div class="w-full text-left text-sm px-3 font-semibold">
                Particulars:
            </div>

            <div class="px-3">
                <ul class="w-full flex flex-col items-center">
                    {{-- List Header --}}
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row px-5">
                            <ul class="flex flex-row w-full mt-3">
                                <li class="w-4/12 text-center text-xs font-semibold">Item</li>
                                <li class="w-3/12 text-center text-xs font-semibold">Unit Price&nbsp;(₱)</li>
                                <li class="w-2/12 text-center text-xs font-semibold">Quantity</li>
                                <li class="w-3/12 text-center text-xs font-semibold">Subtotal&nbsp;(₱)</li>
                            </ul>
                        </div>
                        <hr class="my-1">


                        {{-- Single unit of Product --}}

                        @if ($orderList)
                            @foreach ($orderList as $order)
                                <div class="w-full flex-row px-5 my-2">
                                    <ul class="flex flex-row w-full">
                                        <li class="w-4/12 text-center text-xs flex items-center justify-center ">
                                            <img src="{{ $order->products->image }}"
                                                class="w-12 h-12 ml-[-2.5rem] object-cover">
                                            {{ $order->products->name }}
                                        </li>
                                        <li class="w-3/12 text-center text-xs items-center justify-center">
                                            {{ number_format($order->products->price, 2) }}</li>
                                        <li class="w-2/12 text-center text-xs items-center justify-center">
                                            {{ $order->quantity }}
                                        </li>
                                        <li class="w-3/12 text-center text-xs items-center justify-center">
                                            {{ $order->quantity * $order->products->price }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        @endif


                        <div class="w-full flex-row px-5 my-2">
                            <ul class="flex flex-row w-full">
                                <li class="w-full text-right text-xs mr-5">
                                    <span class="font-semibold mr-5">Shipping
                                        Fee:&nbsp;{{ $transactionData ? $transactionData->shippingFee : '--' }}</span>
                                    ₱&nbsp;{{ $transactionData ? $transactionData->shippingFee : '--' }}
                                </li>
                            </ul>
                        </div>

                    </div>
                </ul>
            </div>

        </div>
        <hr class="my-1">
        <div class="w-full text-right text-xs ml-[-5rem] my-2">
            <span class="font-semibold mr-5">Total: </span>
            ₱&nbsp;{{ $transactionData ? $transactionData->grandTotal : '--' }}
        </div>
    </div>
    {{-- </form> --}}

</div>
