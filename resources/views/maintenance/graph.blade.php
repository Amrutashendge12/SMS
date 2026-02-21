@extends('layouts.app')

@section('content')
<div class="container">

<h3 class="mb-4">Maintenance Monthly Collection</h3>

<canvas id="maintenanceChart" height="100"></canvas>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const dataFromLaravel = @json($monthlyData);

    const labels = dataFromLaravel.map(item => "Month " + item.month);
    const amounts = dataFromLaravel.map(item => item.total);

    new Chart(document.getElementById('maintenanceChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Maintenance Collection',
                data: amounts,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
