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
        const days = @json($data->pluck('day_number'));
        const totals = @json($data->pluck('total_subtotal'));

        const dayLabels = days.map(day => `Day ${day}`);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dayLabels,
                datasets: [{
                    label: 'Daily Sales',
                    data: totals,
                    borderWidth: 2,
                    backgroundColor: 'rgba(255, 255, 255, 0.2)',
                    borderColor: 'white',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white',
                        },
                        grid: {
                            color: 'white',
                        }
                    },
                    x: {
                        ticks: {
                            color: 'white',
                        },
                        grid: {
                            color: 'white',
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'white',
                        }
                    }
                }
            }
        });
    </script>
@endscript
