<div class="">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdeliver.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar';
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
            datasets: [{
                label: '# of votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                beginAtZero: true
            }
        }
    });
</script>
