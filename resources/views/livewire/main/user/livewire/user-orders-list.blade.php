<div class="w-full lg:w-3/5 h-full px-3 text-right flex">
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex-row ml-9">
            <ul class="flex flex-row w-full">
                <li class="w-2/12 text-center text-sm">ID</li>
                <li class="w-2/12 text-center text-sm">Date</li>
                <li class="w-2/12 text-center text-sm">Mode</li>
                <li class="w-2/12 text-center text-sm">Status</li>
                <li class="w-2/12 text-center text-sm">Total&nbsp;(₱)</li>
            </ul>
        </div>
        <hr class="my-1">

        {{-- Order List  --}}
        <div class="w-full h-full px-3 overflow-y-auto" id="questions-container">
            <ul class=" w-full flex flex-col items-center">


                @if ($transactionList)
                    @foreach ($transactionList as $transaction)
                        {{-- <livewire:main.user.livewire.user-orders-detail-compact orderId="{{ $transaction->id }}"
                            wire:key="{{ $transaction->id }}" /> --}}
                        <li wire:key="{{ $transaction->id }}" class="w-full flex justify-center select-none px-2">
                            {{-- <button @click="open = ! open" class="w-full h-full"> --}}

                            @if ($transaction->id == $selectedOrder && $windowWidth < 1024)
                                <div class="w-full">
                                    {{ $transaction->id }}
                                    {{ $transaction->paymentOption }}
                                    {{ $transaction->shippingAddress }}
                                    {{ $transaction->purchaseDate->format('Y-m-d') }}
                                    {{ $transaction->preferredService }}
                                    {{ $transaction->shippingAddress }}
                                    {{ $transaction->courierUsed }}
                                    {{ $transaction->trackingNumber }}
                                    @foreach ($orderList as $order)
                                        {{ $order->products->name }}
                                        {{ number_format($order->products->price, 2) }}
                                        {{ $order->quantity }}
                                        {{ $order->quantity * $order->products->price }}
                                    @endforeach
                                    {{-- style here --}}
                                </div>
                            @endif

                            <input class="widenWhenSelected" hidden type="radio" id="productId{{ $transaction->id }}"
                                name="productList">
                            <label wire:click="showDetails({{ $transaction->id }})"
                                class="w-11/12 py-2 my-1 rounded-full btransaction-2 btransaction-gray shadow-sm text-sm items-center"
                                {{-- for="productId{{ $transaction->id }}" :class="{ 'flex': open, 'hidden': !open }"> --}} for="productId{{ $transaction->id }}">
                                <ul class="flex flex-row w-full">
                                    <li class="w-2/12 text-center text-sm">{{ $transaction->id }}</li>
                                    <li class="w-2/12 text-center text-sm">
                                        {{ $transaction->purchaseDate->format('Y-m-d') }}
                                    </li>
                                    <li class="w-3/12 text-center text-sm">
                                        {{ $transaction->preferredService }}
                                    <li class="w-2/12 text-center text-sm">{{ $transaction->status }}</li>
                                    <li class="w-2/12 text-center text-sm">
                                        {{ number_format($transaction->grandTotal, 2) }}
                                    </li>
                                </ul>
                            </label>
                            {{-- </button> --}}

                        </li>
                    @endforeach
                @endif


            </ul>
        </div>
    </div>
</div>

@script
    <script>
        let resizeTimer;

        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                const newWidth = window.innerWidth;
                console.log("LIST: Window width changed to: " + newWidth);

                $wire.dispatch('windowWidthChange', {
                    width: newWidth
                });

            }, 2000);
        });

        $wire.on('initialRender', () => {
            const newWidth = window.innerWidth;
            console.log("LIST: Window width changed to: " + newWidth);

            $wire.dispatch('windowWidthChange', {
                width: newWidth
            });
        });
    </script>
@endscript
