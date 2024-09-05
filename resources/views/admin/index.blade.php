@extends('layouts.admin')
@section('title', 'Administrar Noticias')
@section('content')

<link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= url('css/styles.css') ?>">

<div class="container-fluid width my-3">
    <h1 class="text-center pb-3">Administrador</h1>
    <div class="admin-noticias">
        <div class="row align-items-center">
            <div class="col-12 col-md-8">
                <h2 class="admin">Noticias Cargadas</h2>
            </div>
            <div class="col-6 col-md-4">
                <a class="btn btn-primary  fs-4 " href="{{ url('/admin/noticias/crear') }}"><i class="fas fa-plus"></i>
                    Nueva noticia </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Subtitulo</th>
                        <th class="campos-grandes">Párrafo</th>
                        <th>Imagen</th>
                        <th>Tópico</th>
                        <th>Etiquetas</th>
                        <th>Creación</th>
                        <th>Editor</th>
                        <th>Publicado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noticias as $n)
                    <tr>
                        <td>{{ $n->noticia_id }}</td>
                        <td>{{ $n->titulo }}</td>
                        <td>{{ $n->subtitulo }}</td>
                        <td  class="campos-grandes">{{ Str::limit($n->parrafo, 100, '...') }}</td>
                        <td>
                            <div>
                                @if ($n->img)
                                <img src="{{ url('storage/' . $n->img) }}" alt="{{ $n->descripcion_img }}" class="img-admin-noticias">
                                @else
                                <p>Esta noticia no tiene imagen cargada</p>
                                @endif
                            </div>
                        </td>
                        <td>{{ $n->topico->nombre }}</td>
                        <td>
                            @if (!$n->tags->isEmpty())
                            @foreach ($n->tags as $tag)
                            <span class="badge bg-primary">{{ $tag->nombre }}</span>
                            @endforeach
                            @else
                            <p>No hay etiquetas que mostrar</p>
                            @endif
                        </td>
                        <td>{{ $n->fecha_creacion }}</td>
                        <td>{{ $n->editor }}</td>
                        <td>
                            @if ($n->publicado == 1)
                            Publicado
                            @else
                            No Publicado
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/admin/noticias/' . $n->noticia_id) }}" class="btn btn-primary m-1  d-block"><i class="fas fa-eye p-2 fs-4"></i></a>
                            <a href="{{ url('/admin/noticias/' . $n->noticia_id . '/editar') }}" class="btn btn-warning m-1 d-block"><i class="fas fa-pencil-alt p-2  fs-4 "></i></a>
                            <a href="{{ url('/admin/noticias/' . $n->noticia_id . '/eliminar') }}" class="btn btn-danger m-1 d-block"><i class="fas fa-trash-alt p-2  fs-4"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- paginador --}}
            {{ $noticias->links() }}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</div>
@endsection