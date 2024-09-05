@extends('layouts.admin')
@section('title', $user->name)

@section('content')

<link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= url('css/styles.css') ?>">

<div class="container-fluid width">
    <h1 class="text-center pb-5">Detalles del usuario:</h1>
    <div class="container p-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h2 class="h4 card-title text-center"> Usuario: {{ $user->name }} </h2>
                            <ul class="list-group">
                                <li class="list-group-item text-center"><strong>ID:</strong> {{ $user->id }}
                                </li>
                                <li class="list-group-item text-center"><strong>Tipo:</strong>
                                    {{ $user->editor == 0 ? 'Usuario' : 'Administrador' }}
                                </li>
                                <li class="list-group-item text-center"><strong>E-mail:</strong> {{ $user->email }}
                                </li>
                                <li class="list-group-item text-center"><strong>Fecha de creación:</strong> <span class="numero">{{ $user->created_at }}</span></li>
                                <li class="list-group-item text-center"><strong>Fecha de compra:</strong>
                                    {{ $user->fecha_compra ?? 'No realizó compra' }}
                                </li>
                                <li class="list-group-item text-center"><strong>Cantidad de entradas:</strong>
                                    {{ $user->cantidad_entradas ?? 'No realizó compra' }}
                                </li>
                                <li class="list-group-item text-center"><strong>Precio por entrada:</strong>
                                    {{ isset($user->cantidad_entradas) ? '$1000' : 'No realizó compra' }}
                                </li>
                                <li class="list-group-item text-center">
                                    <strong>Total:</strong>
                                    {{ isset($user->cantidad_entradas) ?  ($user->cantidad_entradas * 1000) . "ARS" : 'No realizó compra' }}
                                </li>
                                <li class="list-group-item text-center"><strong>Nro factura:</strong>
                                    {{ $user->n_factura ?? 'No se registra factura cargada' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <a href="{{ url('/admin/usuarios/') }}" class="btn btn-primary mt-4 d-block">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection