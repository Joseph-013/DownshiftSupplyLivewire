<div class="p-3 rounded-xl text-white shadow-md shadow-gray-400" style="background-color: {{ $colorMain }};">
    <div class="flex flex-row justify-center items-center space-x-3">
        {!! $icon !!}
        <section class="">
            <h3 class="text-base">{{ $title }}</h3>
            <h1 class="text-2xl font-bold">
                {{ !isset($items) ? '0' : count($items) }}
            </h1>
        </section>
    </div>
    @isset($items)
        <div class="mt-2 rounded-lg overflow-hidden border border-white">
            <table class="w-full m-0 text-sm border border-white border-collapse table-fixed table-dashboard">
                <thead>
                    <tr class="tracking-wide font-normal bg-white" style="color: {{ $colorMain }};">
                        <th class="w-4/5">Item Name</th>
                        <th class="w-1/5 text-center">Stocks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="h-8">
                        <td class="border border-white truncate">Lorem Ipsum</td>
                        <td class="border border-white text-center">5</td>
                    </tr>
                    @php $count = 0; @endphp <!-- Initialize count variable -->
                    @foreach ($items as $item)
                        @if ($count < 10)
                            <!-- Limit to 10 rows -->
                            <tr class="h-8">
                                <td class="border border-white truncate">{{ $item->name }}</td>
                                <td class="border border-white text-center">{{ $item->stockquantity }}</td>
                            </tr>
                            @php $count++; @endphp <!-- Increment count after each row -->
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
        @if (count($items) > 10)
            <div class="text-xs text-center">and {{ count($items) - 10 }} more...</div>
        @endif
    @endisset
</div>
