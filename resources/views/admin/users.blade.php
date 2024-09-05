@extends('layouts.admin')
@section('title', 'Administrar usuarios')
@section('content')

    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/styles.css') ?>">
    <div class="container-fluid width  my-3">
        <h1 class="text-center pb-3">Administrador</h1>
        <div class="admin-noticias">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <h2 class="admin">Usuarios cargados</h2>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table  table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Num Factura</th>
                            <th>Cantidad entradas</th>
                            <th>Ver Más</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->editor == 0 ? 'Usuario' : 'Administrador' }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->n_factura == null ? 'No realizó compra' : $u->n_factura }}</td>
                                <td>{{ $u->n_factura == null ? 'No realizó compra' : $u->cantidad_entradas }}</td>
                                <td>
                                    <a href="{{ url('/admin/usuarios/' . $u->id) }}" class="btn btn-primary m-1  d-block">
                                        <i class="fas fa-eye p-2 fs-4"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </div>
@endsection
