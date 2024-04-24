<div class="p-3 rounded-xl text-white shadow-md shadow-gray-400"
    style="background-color: {{ $colorMain }}; height: 506.8px;">
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
        </section>
    </div>
    @isset($data)
        <div class="flex flex-col">
            <div class="h-full w-full">
                <canvas id="myChart"></canvas>
            </div>
            <div class="flex justify-center items-center space-x-3 mt-1">
                {{-- <button class="size-7 rounded-md bg-red-50 flex justify-center items-center"
                    id="next">{{ '<' }}</button>
                <button class="size-7 rounded-md bg-red-50 flex justify-center items-center"
                    id="prev">{{ '>' }}</button> --}}
            </div>
        </div>
    @endisset
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const ctx = document.getElementById('myChart');
        const days = @json($data->pluck('day_number')); // Array of day numbers
        const totals = @json($data->pluck('total_subtotal'));

        // Map the day numbers to "Day x" format for labels
        const dayLabels = days.map(day => `Day ${day}`);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dayLabels, // Use "Day x" as labels
                datasets: [{
                    label: 'Daily Sales',
                    data: totals, // Use total_subtotal as data points
                    borderWidth: 1,
                    backgroundColor: 'rgba(255, 255, 255, 0.2)', // White background color with opacity
                    borderColor: 'black', // Example border color (unchanged)
                    // borderColor: 'rgba(54, 162, 235, 1)', // Example border color (unchanged)
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white', // Font color for Y-axis labels
                        },
                        grid: {
                            color: 'white', // Grid line color for Y-axis
                        }
                    },
                    x: {
                        ticks: {
                            color: 'white', // Font color for X-axis labels
                        },
                        grid: {
                            color: 'white', // Grid line color for X-axis
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'white', // Font color for legend labels
                        }
                    }
                }
            }
        });
    </script>
@endscript
