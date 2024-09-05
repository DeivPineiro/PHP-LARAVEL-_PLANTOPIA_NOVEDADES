@extends('layouts.main')
@section('title', 'Perfil')
@section('content')

<div class="container p-0">
    <h1 class="d-none">Perfil de {{ auth()->user()->name }}</h1>
    <div class="container-fluid p-0">
        <div class="banner-ticket">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 ">
                        <div class="banner-ticket-palabra my-5">
                            <h2 class="banner-titulo">Perfil de {{ auth()->user()->name }}</h2>
                            <div class="container p-4">
                                <div class="container-fluid">
                                    <div class="row  justify-content-center">
                                        <div class="col-12">
                                            <div class="card mx-auto">
                                                <div class="card-body">
                                                    <h2 class="h4 card-title text-center"> Usuario:
                                                        {{ auth()->user()->name }}
                                                    </h2>
                                                    <ul class="list-group">
                                                        <li class="list-group-item text-center"><strong>E-mail:</strong>
                                                            {{ auth()->user()->email }}
                                                        </li>
                                                        <li class="list-group-item text-center"><strong>Cuenta
                                                                creada:</strong> <span class="numero">{{ auth()->user()->created_at }}</span>
                                                        </li>
                                                        @if (auth()->user()->fecha_compra !== null)
                                                        <li class="list-group-item text-center"><strong>Fecha de
                                                                compra:</strong>
                                                            {{ auth()->user()->fecha_compra }}
                                                        </li>
                                                        @endif
                                                        @if (auth()->user()->n_factura !== null)
                                                        <li class="list-group-item text-center"><strong>Nro
                                                                factura:</strong>
                                                            {{ auth()->user()->n_factura }}
                                                        </li>
                                                        <li class="list-group-item text-center"><strong>Cantidad
                                                                entradas:</strong>
                                                            {{ auth()->user()->cantidad_entradas }}
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <a href="{{ url('/editUser') }}" class="btn btn-home mt-4 d-block">Editar</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection