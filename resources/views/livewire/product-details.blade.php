
    @if($selectedProduct)
        {{-- Display selected product details --}}
        <div class="columns-2">
            <div class="p-2">
                <img src="{{ asset($selectedProduct->image) }}">
            </div>
            <div class="p-2 flex flex-col h-full justify-center">
                <div class="text-sm h-min">
                    Item ID: {{ $selectedProduct->id }}
                </div>
                <div class="text-sm h-min">
                    Name: {{ $selectedProduct->name }}
                </div>
                <div class="text-sm h-min">
                    Price: ₱ {{ number_format($selectedProduct->price, 2) }}
                </div>
                <div class="text-sm h-min">
                    Remaining: {{ $selectedProduct->stockquantity }} left
                </div>
            </div>
        </div>
    @else
        {{-- Display a default message or an empty state --}}
        <div class="columns-2">
            <div class="p-2">
                <img src="{{ asset('assets/BC Racing M1 Series.png') }}">
            </div>
            <div class="p-2 flex flex-col h-full justify-center">
                <div class="text-sm h-min">
                    Item ID: 
                </div>
                <div class="text-sm h-min">
                    Name: 
                </div>
                <div class="text-sm h-min">
                    Price: 
                </div>
                <div class="text-sm h-min">
                    Remaining: 
                </div>
            </div>
        </div>
    @endif
