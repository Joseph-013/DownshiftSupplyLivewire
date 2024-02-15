<div class="h-96 ">
    @if($selectedTransaction)
    <div class="w-full h-96 overflow-y-auto" id="transactions-container">
        <div class=" flex flex-1 w-full">
            <div class="w-2/4 h-full text-left text-sm my-1"><span class="font-semibold">Transaction
                ID:</span> {{ $selectedTransaction->id }}</div>
            </div>
            <div class="flex flex-1 w-full">
                <div class="w-2/4 h-full text-left text-sm my-1"><span
                    class="font-semibold">Name:</span> {{ $selectedTransaction->firstName }} {{ $selectedTransaction->lastName }}</div>
                <div class="w-2/4 h-full text-left text-sm my-1"><span class="font-semibold">Contact
                    #:</span> {{ $selectedTransaction->contact }}</div>
                </div>
                <ul class="w-full flex flex-col items-center">
                    {{-- Single Unit of Product --}}
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row px-5">
                            <ul class="flex flex-row w-full mt-3">
                                <li class="w-2/12 text-center text-xs font-semibold"></li>
                                <li class="w-2/12 text-center text-xs font-semibold">Item</li>
                                <li class="w-3/12 text-center text-xs font-semibold">Unit Price</li>
                                <li class="w-2/12 text-center text-xs font-semibold">Quantity</li>
                                <li class="w-3/12 text-center text-xs font-semibold">Subtotal</li>
                            </ul>
                        </div>
                        <hr class="my-1">
                        <!-- Single Unit of Product -->
                        @php
                            $grandTotal = 0;
                        @endphp
                        @foreach($selectedTransaction->details as $detail)
                            @if($detail->products)
                            @php
                                $subtotal = $detail->products->price * $detail->quantity;
                                $grandTotal += $subtotal;
                            @endphp
                            <div class="w-full flex-row px-5 my-2">
                                <ul class="flex flex-row w-full">
                                    <li
                                        class="w-2/12 text-center text-xs flex items-center justify-center ">
                                        <img src="{{ asset('storage/assets/' . $detail->products->image) }}"
                                                        class="w-12 h-12 ml-[-2.5rem]">
                                    </li>
                                    <li
                                        class="w-2/12 text-center text-xs items-center justify-center ">
                                        {{ $detail->products->name }}
                                    </li>
                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                        {{ $detail->products->price }}</li>
                                    <li class="w-2/12 text-center text-xs items-center justify-center">
                                        {{ $detail->quantity }}</li>
                                    <li class="w-3/12 text-center text-xs items-center justify-center">₱
                                        {{ $subtotal }}</li>
                                </ul>
                            </div>
                            @endif
                        @endforeach
                    </div>

                </ul>
            </div>
            <hr class="mt-5 mb-2">
            <div class="w-full text-xs text-right pr-5 mx-[-3rem]"><span class="font-semibold">Total:
                </span>₱ {{ $grandTotal }} 
        </div>
    @endif
</div>
