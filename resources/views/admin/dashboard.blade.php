@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">

    <div class="container-fluid width">
        <h1 class="text-center pb-5">Dashboard</h1>

        <h2 class="h4 my-4">Usuarios registrados en el tiempo</h2>
        <div class="container admin">        
            <canvas id="usuariosTiempo" width="400" height="200"></canvas>
        </div>      
        <h2 class="h4 my-4">Cantidad de entradas compradas por usuarios</h2>
        <div class="container admin">
            <p class="text-center text-success mb-3">Total de Entradas Vendidas: {{ $totalEntradas }}</p>
        </div>
        <div class="container admin">          
            <canvas id="usuariosEntradas" width="300" height="100"></canvas>
        </div>
    </div>  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctxUsuariosTiempo = document.getElementById('usuariosTiempo').getContext('2d');
        var usuariosTiempo = new Chart(ctxUsuariosTiempo, {
            type: 'line',
            data: {
                labels: @json($usuarios->keys()),
                datasets: [{
                    label: 'Usuarios Registrados',
                    data: @json($usuarios->values()),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var usuariosPorCantidadEntradas = @json($usuariosPorCantidadEntradas);
        var cantidadesEntradas = usuariosPorCantidadEntradas.map(item => item.total);
        var etiquetasEntradas = usuariosPorCantidadEntradas.map(item => item.cantidad_entradas);

        var ctxUsuariosEntradas = document.getElementById('usuariosEntradas').getContext('2d');
        var usuariosEntradas = new Chart(ctxUsuariosEntradas, {
            type: 'bar',
            data: {
                labels: etiquetasEntradas,
                datasets: [{
                    label: 'Cantidad de Entradas por Usuario',
                    data: cantidadesEntradas,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>

@endsection
