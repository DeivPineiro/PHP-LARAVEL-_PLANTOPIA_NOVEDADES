<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title> @yield('title') | Plantopia</title>
</head>

<body class="container m-0 p-0">
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-plantopia">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= url('/') ?>"><img src="{{ asset('storage/imgs/logo.png') }}" alt="logo de Plantopia" class="img-fluid logo-nav"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-baseline">
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="<?= url('/') ?>">Inicio</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('noticias') ? 'active' : '' }}" href="<?= url('/noticias') ?>">Noticias</a>
                        </li>
                        @auth
                        @if (Auth::user()->editor == 1)
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="<?= url('/admin/dashboard') ?>">Administrador</a>
                        </li>
                        @endif
                        @endauth
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link nombre-sesion" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <p class="nombre-sesion">{{ auth()->user()->name }}</p>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a href="<?= url('/user') ?>" class="dropdown-nav">Mi perfil</a>
                                <form action="<?= url('/logOut') ?>" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('logIn') ? 'active' : '' }}" href="<?= url('/logIn') ?>">
                                Ingresar
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @if (\Session::has('status'))
            @if (\Session::get('status')['type'] == 'success')
            <div class="alert alert-success">{!! \Session::get('status')['message'] !!}</div>
            @else
            <div class="alert alert-warning">{!! \Session::get('status')['message'] !!}</div>
            @endif
            @endif
            @yield('content')
        </main>
    </div>

    <footer class="shadow" style="background-color: rgb(241, 241, 241)">
        <div class="container pt-2">
            <img src="{{ asset('storage/imgs/mockicon.png') }}" alt="Logo plantopia" class="img-fluid" style="max-width: 60px; height: auto;">
            <p class="mt-3"><strong>PLANTOPIA 2023 &copy; Todos los derechos reservados</strong></p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>