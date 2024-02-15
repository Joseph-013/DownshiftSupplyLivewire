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
            <div class="w-full mt-4 flex justify-end">
                                <a href="{{ route('edittransactions', ['transactionId' => $selectedTransaction->id]) }}"
                                    class="h-9 px-6 flex flex-row items-center justify-center rounded-lg bg-gray-500 ml-3 border-1 border-black text-black text-sm font-semibold text-spacing">
                                    Update&nbsp;Transaction
                                    <svg class="svg-icon ml-2"
                                        style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M834.3 705.7c0 82.2-66.8 149-149 149H325.9c-82.2 0-149-66.8-149-149V346.4c0-82.2 66.8-149 149-149h129.8v-42.7H325.9c-105.7 0-191.7 86-191.7 191.7v359.3c0 105.7 86 191.7 191.7 191.7h359.3c105.7 0 191.7-86 191.7-191.7V575.9h-42.7v129.8z" />
                                        <path
                                            d="M889.7 163.4c-22.9-22.9-53-34.4-83.1-34.4s-60.1 11.5-83.1 34.4L312 574.9c-16.9 16.9-27.9 38.8-31.2 62.5l-19 132.8c-1.6 11.4 7.3 21.3 18.4 21.3 0.9 0 1.8-0.1 2.7-0.2l132.8-19c23.7-3.4 45.6-14.3 62.5-31.2l411.5-411.5c45.9-45.9 45.9-120.3 0-166.2zM362 585.3L710.3 237 816 342.8 467.8 691.1 362 585.3zM409.7 730l-101.1 14.4L323 643.3c1.4-9.5 4.8-18.7 9.9-26.7L436.3 720c-8 5.2-17.1 8.7-26.6 10z m449.8-430.7l-13.3 13.3-105.7-105.8 13.3-13.3c14.1-14.1 32.9-21.9 52.9-21.9s38.8 7.8 52.9 21.9c29.1 29.2 29.1 76.7-0.1 105.8z" />
                                    </svg>
                                </a>
                            </div>
    @endif
</div>
