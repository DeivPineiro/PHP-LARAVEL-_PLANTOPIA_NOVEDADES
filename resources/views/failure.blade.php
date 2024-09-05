@extends('layouts.main')
@section('title', 'Compra erronea')
@section('content')

    <div class="container p-0">
        <div class="container-fluid p-0">
            <div class="banner">
                <div class="container fluid ">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="banner-palabra my-5">
                                <h1 class="text-center text-danger">¡Error en la compra!</h1>
                                <h2>Detalles de la compra:</h2>
                                <div class="card mx-auto">
                                    <div class="card-body">
                                        <ul>
                                            <li><strong>Estado:</strong> {{ $collectionStatus }}</li>
                                            <li><strong>Nro factura:</strong> {{ $paymentId }}</li>
                                            <li><strong>Tipo de pago:</strong> {{ $paymentType }}</li>
                                            <li><strong>Cantidad de entradas:</strong>
                                                {{ auth()->user()->cantidad_entradas }}</li>
                                        </ul>
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