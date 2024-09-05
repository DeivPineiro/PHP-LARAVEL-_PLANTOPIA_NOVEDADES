@extends('layouts.main')
@section('title', 'Noticias')
@section('content')

    <div class="container-fluid width" style="margin-bottom: 50px;">
        <h1 class="text-center pb-5">Novedades</h1>
        <div class="row">
            @foreach ($noticias as $n)
                <?php if ($n->publicado == 1) { ?>
                <div class="container noticias">
                    <div class="row flex-row-reverse caja-noticias">
                        <div class="col-12 col-lg-8">
                            <h2 class="titulo-noticia">{{ $n->titulo }} <strong>{{ $n->topico->nombre }}</strong></h2>
                            <p> @if (!$n->tags->isEmpty())
                                @foreach ($n->tags as $tag)
                                    <span class="badge bg-primary">{{ $tag->nombre }}</span>
                                @endforeach
                            @else
                                <p>No hay etiquetas que mostrar</p>
                            @endif</p>
                            <h3 class="sub-noticia">{{ $n->subtitulo }}</h3>
                            <p>{{ $n->parrafo }}</p>
                        </div>
                        <div class="col-12 col-lg-4">
                            @if ($n->img)
                                <img src="{{ url('storage/' . $n->img) }}" alt="{{ $n->descripcion_img }}"
                                    class="img-fluid img-noticias">
                            @else
                                <p>Uups! Esta noticia no tiene imagen cargada</p>
                            @endif
                        </div>
                    </div>                   
                </div>
                <?php } ?>
            @endforeach
        </div>
        <span style="min-height: 60px">.</span>
    @endsection
</div>
