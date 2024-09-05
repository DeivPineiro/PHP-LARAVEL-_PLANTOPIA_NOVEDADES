@extends('layouts.admin')
@section('title', $new->titulo)

@section('content')

<link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= url('css/styles.css') ?>">

<div class="container-fluid width">
    <h1 class="text-center pb-5">Detalles de la noticia:</h1>
    <h2 class="text-center pb-4">{{ $new->titulo }}</h2>
    <div class="container p-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <p>Editor: {{ $new->editor }}</p>
                    <p>Topico: {{ $new->topico->nombre }}</p>
                    <p>Etiquetas:
                        @if (!$new->tags->isEmpty())
                        @foreach ($new->tags as $tag)
                        <span class="badge bg-primary">{{ $tag->nombre }}</span>
                        @endforeach
                        @else
                    <p>No hay etiquetas que mostrar</p>
                    @endif
                    </p>
                    <p>Fecha de publicación: <span class="numero">{{ $new->fecha_creacion }}</span> </p>
                    <p>Publicado: @if ($new->publicado == 1)
                        Si
                        @else
                        No
                        @endif
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    @if ($new->img)
                    <img src="{{ url('storage/' . $new->img) }}" alt="{{ $new->descripcion_img }}" class="img-fluid">
                    @else
                    <p>Esta noticia no tiene imagen cargada</p>
                    @endif
                </div>
                <div class="col-12 col-md-8">
                    <h3>{{ $new->subtitulo }}</h3>
                    <p>{{ $new->parrafo }}</p>
                </div>
                <div class="col-12 col-md-4"> 
                    <a href="{{ url('/admin/noticias/') }}" class="btn btn-primary mt-4 d-block">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection