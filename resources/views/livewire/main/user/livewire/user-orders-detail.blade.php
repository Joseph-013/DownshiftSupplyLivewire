<div class="hidden lg:block w-2/5 h-full px-3">
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
                        {{ $transactionData ? $transactionData->created_at->format('m-d-Y') : '--' }}
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

            <hr class="my-1">

            <div class="px-3">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="w-4/12 text-center text-xs font-semibold">Item</th>
                            <th class="w-3/12 text-center text-xs font-semibold">Unit Price (₱)</th>
                            <th class="w-2/12 text-center text-xs font-semibold">Quantity</th>
                            <th class="w-3/12 text-center text-xs font-semibold">Subtotal (₱)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orderList)
                            @foreach ($orderList as $order)
                                <tr>
                                    <td class="w-4/12 text-center text-xs flex items-center justify-center">
                                        <img src="{{ $order->products->image }}"
                                            class="w-12 h-12 ml-[-2.5rem] object-cover">
                                        {{ $order->products->name }}
                                    </td>
                                    <td class="w-3/12 text-center text-xs items-center justify-center">
                                        {{ number_format($order->products->price, 2) }}
                                    </td>
                                    <td class="w-2/12 text-center text-xs items-center justify-center">
                                        {{ $order->quantity }}
                                    </td>
                                    <td class="w-3/12 text-center text-xs items-center justify-center">
                                        {{ $order->quantity * $order->products->price }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td colspan="3" class="text-right text-xs">
                                <span class="font-semibold mr-5">Shipping Fee:&nbsp;</span>
                                {{ $transactionData ? $transactionData->shippingFee : '--' }}
                            </td>
                            <td class="text-center text-xs">
                                ₱&nbsp;{{ $transactionData ? $transactionData->shippingFee : '--' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
        <hr class="my-1">
        <div class="w-full text-right text-xs ml-[-5rem] my-2">
            <span class="font-semibold mr-5">Total: </span>
            ₱&nbsp;{{ $transactionData ? $transactionData->grandTotal : '--' }}
        </div>
    </div>

</div>
