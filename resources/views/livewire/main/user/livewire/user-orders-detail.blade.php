<div class="w-full h-full px-3">
    {{-- Left Main Container --}}
    <div class="border-black border-1 w-full rounded-lg p-1">
        <div class="w-full h-96 overflow-y-auto flex-row" id="questions-container">
            <ul class="flex flex-row w-full mb-3">
                <li class="w-2/4 text-left text-sm px-3">
                    <div class="my-1 mt-2">
                        <span class="font-medium">ID:&nbsp;</span>{{ $transactionData ? $transactionData->id : '--' }}
                    </div>
                    <div class="my-1">
                        <span class="font-medium">Status:
                            &nbsp;</span><br>{{ $transactionData ? $transactionData->status : '--' }}
                    </div>
                    <div class="my-1">
                        <span class="font-medium">Payment
                            Option:&nbsp;</span><br>{{ $transactionData ? $transactionData->paymentOption : '--' }}
                    </div>
                    <div class="my-1">
                        <span class="font-medium">Shipping
                            Address:&nbsp;</span><br>{{ $transactionData ? $transactionData->shippingAddress : '--' }}
                    </div>
                    <div class="my-1">
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
                <li class="w-2/4 text-left text-sm px-3">
                    <img class="rounded-md object-cover"
                        src="{{ isset($transactionData) ? (filter_var($transactionData->proofOfPayment, FILTER_VALIDATE_URL) ? $transactionData->proofOfPayment : asset('storage/assets/' . $transactionData->proofOfPayment)) : 'https://via.placeholder.com/350x500.png/000000?text=...' }}"
                        class="h-auto w-full object-cover" alt="Proof of Payment" style="max-height: 1000px">
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
                            <th class="w-4/12 text-center sm:text-xs text-xxs font-semibold">Item</th>
                            <th class="w-3/12 text-center sm:text-xs text-xxs font-semibold">Unit Price (₱)</th>
                            <th class="w-2/12 text-center sm:text-xs text-xxs font-semibold">Quantity</th>
                            <th class="w-3/12 text-center sm:text-xs text-xxs font-semibold">Subtotal (₱)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orderList)
                            @foreach ($orderList as $order)
                                <tr>
                                    <td class="w-full sm:text-xs text-xxs flex items-center justify-left">
                                        <div class="flex items-center"> <!-- Wrap image and name in a flex container -->
                                            @if ($order->products->product_images && $order->products->product_images->isNotEmpty())
                                                <img src="{{ filter_var($order->products->product_images->first()->image, FILTER_VALIDATE_URL) ? $order->products->product_images->first()->image : asset('storage/assets/' . $order->products->product_images->first()->image) }}"
                                                    class="w-12 h-12 object-cover rounded"
                                                    alt="{{ $order->products->name }}">
                                            @endif
                                            <span
                                                class="ml-2">{{ strlen($order->products->name) > 11 ? substr($order->products->name, 0, 11) . '...' : $order->products->name }}</span>
                                        </div>
                                    </td>



                                    <td class="w-3/12 text-center sm:text-xs text-xxs items-center justify-center">
                                        {{ number_format($order->products->price, 2) }}
                                    </td>
                                    <td class="w-2/12 text-center sm:text-xs text-xxs items-center justify-center">
                                        {{ $order->quantity }}
                                    </td>
                                    <td class="w-3/12 text-center sm:text-xs text-xxs items-center justify-center">
                                        {{ $order->quantity * $order->products->price }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-right sm:text-xs text-xxs">
                                    <span class="font-semibold mr-5">Shipping Fee:&nbsp;</span>
                                    {{ $transactionData ? $transactionData->shippingFee : '--' }}
                                </td>
                                <td class="text-center sm:text-xs text-xxs">
                                    ₱&nbsp;{{ $transactionData ? $transactionData->shippingFee : '--' }}
                                </td>
                            </tr>
                        @endif

                    </tbody>
                    
                </table>
            </div>
        </div>
        <hr class="my-1">
        <div class="w-full text-xs my-2 flex">
            <div class="w-full pl-5">
                @if (isset($transactionData) && $transactionData->status == 'In Transit')
                    <button wire:click="confirmOrderReceived"
                        class="py-2 px-3 bg-orange-500 text-white text-base rounded-lg hover:bg-orange-600">
                        Order Received
                    </button>
                @endif
            </div>
            <div class="w-full pr-5 flex items-center justify-end"> <span class="font-semibold mr-5">Total:
                </span>
                ₱&nbsp;{{ $transactionData ? number_format($transactionData->grandTotal, 2) : '--' }}
            </div>
        </div>
    </div>
    
</div>
