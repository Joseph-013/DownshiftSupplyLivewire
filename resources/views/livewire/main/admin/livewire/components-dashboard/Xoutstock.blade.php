<div class="p-3 rounded-xl text-white shadow-md shadow-gray-400" style="background-color: rgb(132, 124, 197);">
    <div class="flex flex-row justify-center items-center space-x-3">
        <span class="text-5xl -mr-2 block">!</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-seam-fill"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
        </svg>
        <section class="">
            <h3 class="text-base">Out of Stock Products</h3>
            <h1 class="text-2xl font-bold">
                {{ !isset($outStockProducts) ? '0' : count($outStockProducts) }}
            </h1>
        </section>
    </div>
    @isset($outStockProducts)
        <div class="mt-2 rounded-lg overflow-hidden border border-white">
            <table class="w-full m-0 text-sm border border-white border-collapse table-fixed table-dashboard">
                <thead>
                    <tr class="tracking-wide font-normal bg-white" style="color: rgb(132, 124, 197);">
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
                    @foreach ($outStockProducts as $product)
                        @if ($count < 10)
                            <!-- Limit to 10 rows -->
                            <tr class="h-8">
                                <td class="border border-white truncate">{{ $product->name }}</td>
                                <td class="border border-white text-center">{{ $product->stockquantity }}</td>
                            </tr>
                            @php $count++; @endphp <!-- Increment count after each row -->
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
        @if (count($outStockProducts) > 10)
            <div class="text-xs text-center">and {{ count($outStockProducts) - 10 }} more...</div>
        @endif
    @endisset
</div>
