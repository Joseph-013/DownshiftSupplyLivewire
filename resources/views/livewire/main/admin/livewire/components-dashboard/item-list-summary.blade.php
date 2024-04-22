<div class="p-3 rounded-xl text-white shadow-md shadow-gray-400" style="background-color: {{ $colorMain }};">
    <div class="flex flex-row justify-center items-center space-x-3 h-16">
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
            @if (!isset($record)) -mt-1 @endif">
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
                        <th class="w-1/5 text-center">Sold</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <!-- Limit to 10 rows -->
                        <tr class="h-8">
                            <td class="border border-white truncate">{{ $item->products->name }}</td>
                            <td class="border border-white text-center">{{ $item->total }}</td>
                        </tr>
                    @endforeach
                    @if (count($items) < 10)
                        @php
                            $count = 10 - count($items); // Set your desired loop count here
                        @endphp

                        @foreach (range(1, $count) as $index)
                            {{-- Your loop content here --}}
                            <tr class="h-8">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    @endisset
</div>
