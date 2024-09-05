@extends('layouts.admin')

@section('title', 'Crear noticia')

@section('content')

    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/styles.css') ?>">

    <div class="container-fluid width">
        <h1 class="text-center pb-5">Crear Nueva Noticia</h1>
        @if ($errors->any())
            <p class="text-danger m-4">Error en la carga, revise datos ingresados.</p>
        @endif
        <div class="container p-4">
            <div class="container-fluid">
                <form action="{{ url('/admin/noticias/crear') }}" method="POST" enctype="multipart/form-data"
                    class="form-noticias">
                    <div class="row justify-content-center">
                        @csrf {{-- Token de seguridad para evitar peticiones de otro sitio --}}
                        <div class="col-12">
                            {{-- titulo --}}
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" id="titulo" name="titulo"
                                class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}"
                                @error('titulo') aria-describedby="error-titulo" aria-invalid="true" @enderror
                                pattern=".{2,}" title="Se debe escribir un mínimo de 2 caracteres para el título.">
                            @if ($errors->has('titulo'))
                                <p class="text-danger" id="error-titulo">{{ $errors->first('titulo') }}</p>
                            @endif

                        </div>
                        <div class="col-12">
                            {{-- subtitulo --}}
                            <label for="subtitulo" class="form-label">subtitulo</label>
                            <input type="text" id="subtitulo" name="subtitulo"
                                class="form-control @error('subtitulo') is-invalid @enderror" value="{{ old('subtitulo') }}"
                                @error('subtitulo') aria-describedby="error-subtitulo" aria-invalid="true" @enderror>
                            @if ($errors->has('subtitulo'))
                                <p class="text-danger" id="error-subtitulo">{{ $errors->first('subtitulo') }}</p>
                            @endif
                        </div>
                        <div class="col-12">
                            {{-- parrafo --}}
                            <label for="parrafo" class="form-label">Párrafo</label>
                            <textarea name="parrafo" id="parrafo" class="form-control @error('parrafo') is-invalid @enderror"
                                @error('parrafo') aria-describedby="error-parrafo" aria-invalid="true" @enderror>{{ old('parrafo') }}</textarea>
                            @if ($errors->has('parrafo'))
                                <p class="text-danger" id="error-parrafo">{{ $errors->first('parrafo') }}</p>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            {{-- img --}}
                            <label for="img" class="form-label">Imagen</label>
                            <input type="file" id="img" name="img" class="form-control">
                            @if ($errors->has('img'))
                                <p class="text-danger" id="error-img">{{ $errors->first('img') }}</p>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            {{-- descripcion Img --}}
                            <label for="descripcion_img" class="form-label">Descripción de la imagen</label>
                            <input type="text" id="descripcion_img" name="descripcion_img"
                                class="form-control @error('descripcion_img') is-invalid @enderror"
                                value="{{ old('descripcion_img') }}"
                                @error('descripcion_img') aria-describedby="error-descripcion_img" aria-invalid="true" @enderror>
                            @if ($errors->has('descripcion_img'))
                                <p class="text-danger" id="error-descripcion_img">{{ $errors->first('descripcion_img') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-12">
                            {{-- editor --}}
                            <label for="editor" class="form-label">Editor</label>
                            <input type="text" id="editor" name="editor"
                                class="form-control @error('editor') is-invalid @enderror" value="{{ auth()->user()->name }}"
                                @error('editor') aria-describedby="error-editor" aria-invalid="true" @enderror>
                            @if ($errors->has('editor'))
                                <p class="text-danger" id="error-editor">{{ $errors->first('editor') }}</p>
                            @endif
                        </div>
                        <div class="col-12 col-md-4">
                            {{-- Topico --}}
                            <label for="topico_id" class="form-label">Tópico</label>
                            <select name="topico_id" id="topico_id" class="form-select">
                                @foreach ($topico as $t)
                                    <option value="{{ $t->topico_id }}" @if (old('topico_id') == $t->topico_id) selected @endif>
                                        {{ $t->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            {{-- fecha_creacion --}}
                            <label for="fecha_creacion" class="form-label">Fecha de creación</label>
                            <input type="date" id="fecha_creacion" name="fecha_creacion"
                                class="form-control @error('fecha_creacion') is-invalid @enderror"
                                value="{{ old('fecha_creacion') }}">
                            @if ($errors->has('fecha_creacion'))
                                <p class="text-danger" id="error-fecha_creacion">{{ $errors->first('fecha_creacion') }}</p>
                            @endif
                        </div>
                        <div class="col-12 col-md-4">
                            {{-- Publicado --}}
                            <label for="publicado" class="form-label">Publicado</label>
                            <select id="publicado" name="publicado" class="form-select" value="{{ old('publicado') }}">
                                <option value="1">Publicar</option>
                                <option value="0">No Publicar</option>
                            </select>
                            @if ($errors->has('publicado'))
                                <p class="text-danger" id="error-publicado">{{ $errors->first('publicado') }}</p>
                            @endif
                        </div>
                        <fieldset class="m-4">
                            <legend>Etiquetas</legend>
                            @foreach ($tags as $tag)
                                <label class="p-3">
                                    <input type="checkbox" name="tags[]" class=" form-check-input"
                                        value="{{ $tag->tag_id }}" @checked(in_array($tag->tag_id, old('tags', [])))>
                                    <span class="form-check-label p-2">{{ $tag->nombre }}</span>
                                </label>
                            @endforeach
                        </fieldset>
                        <div class="col-12 col-md-4">
                            <button type="submit" class="btn btn-noticias">Crear noticia</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </div>
@endsection
