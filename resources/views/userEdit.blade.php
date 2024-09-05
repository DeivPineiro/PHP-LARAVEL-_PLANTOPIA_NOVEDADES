@extends('layouts.main')
@section('title', 'Editar Usuario')
@section('content')

    <div class="container p-0">
        <h1 class="d-none">Editar Usuario</h1>
        <div class="container-fluid p-0">
            <div class="banner-ticket">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="banner-ticket-palabra my-5">
                                <h2 class="banner-titulo">Editar Usuario</h2>
                                <div class="card mx-auto">
                                    <div class="card-body">
                                        <form action="{{ url('/editUser') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nombre:</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ auth()->user()->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Correo Electrónico:</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ auth()->user()->email }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-noticias mt-4 d-block width3">Guardar
                                                Cambios</button>
                                        </form>
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
