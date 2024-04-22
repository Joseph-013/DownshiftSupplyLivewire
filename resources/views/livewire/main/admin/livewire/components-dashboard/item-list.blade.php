<div class="p-3 rounded-xl text-white shadow-md shadow-gray-400" style="background-color: {{ $colorMain }};">
    <div class="flex flex-row justify-center items-center space-x-3">
        {!! $icon !!}
        <section class="flex flex-col">
            <div class="flex flex-col">
                <h3 class="text-base">{!! $title !!}</h3>
                <h6 class="text-xs -mt-1">
                    @isset($subTitle)
                        {!! $subTitle !!}
                    @endisset
                    &nbsp;
                </h6>
            </div>
            <h1 class="text-2xl font-bold
            @if (!isset($record)) -mt-4 @endif
            ">
                {{ !isset($items) ? '0' : count($items) }}
            </h1>
        </section>
    </div>
    @isset($items)
        <div class="mt-2 flex flex-col">
            <div class="rounded-lg overflow-hidden border border-white">
                <table class="w-full m-0 text-sm border border-white border-collapse table-fixed table-dashboard">
                    <thead>
                        <tr class="tracking-wide font-normal bg-white" style="color: {{ $colorMain }};">
                            <th class="w-4/5">Item Name</th>
                            <th class="w-1/5 text-center">Stocks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="h-8">
                                <td class="border border-white truncate">{{ $item->name }}</td>
                                <td class="border border-white text-center">{{ $item->stockquantity }}</td>
                            </tr>
                        @endforeach
                        @if (count($items) < 10)
                            @php $count = 10 - count($items); @endphp
                            @foreach (range(1, $count) as $index)
                                <tr class="h-8">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="text-xs text-center my-2 px-3">{{ $items->links('pagination.default') }}</div>
        </div>
    @endisset
</div>
