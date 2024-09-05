@extends('layouts.main')

@section('titulo', 'Eliminar la noticia: ' . $new->titulo)

@section('content')

    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/styles.css') ?>">
    <div class="container-fluid width">
        <h1 class="text-center pb-5">¡Cuidado! Estas por eliminar la siguiente noticia:</h1>
        <h2 class="text-center pb-4">{{ $new->titulo }}</h2>
        <div class="container p-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        {{-- php artisan storage:link  1:20:00 clase 7 --}}
                        @if ($new->img)
                            <img src="{{ url('storage/' . $new->img) }}" alt="{{ $new->descripcion_img }}"
                                class="img-fluid">
                        @else
                            <p>Esta noticia no tiene imagen cargada</p>
                        @endif
                        {{-- image.intervention.io --}}
                    </div>
                    <div class="col-12 col-md-8">
                        <h3>{{ $new->subtitulo }}</h3>
                        <p>{{ $new->parrafo }}</p>
                        <hr>
                        <p>Editor: {{ $new->editor }}</p>
                        <p>Fecha de publicación: <span class="numero">{{ $new->fecha_creacion }}</span> </p>
                        <p>Publicado: @if ($new->publicado == 1)
                                Si
                            @else
                                No
                            @endif
                        </p>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <form action="{{ url('/admin/noticias/' . $new->noticia_id . '/eliminar') }}" method="POST"
                            class="form-delete">
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
