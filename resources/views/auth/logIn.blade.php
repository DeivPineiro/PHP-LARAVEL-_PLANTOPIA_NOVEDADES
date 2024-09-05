@extends('layouts.main')

@section('title', 'LogIn')

@section('content')
    <div class="container-fluid sesion">
        <div class="container form-sesion">
            <h1 class="titulo-sesion">Iniciar sesión</h1>
            <p class="fs-4">Ingresá tus credenciales</p>
            <form action="{{ url('/logIn') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Email usuario --}}
                <div class="d-flex div-sesion ">
                    <i class="p-4 fas fa-user fa-2x i-sesion"></i>
                    <label for="email" class="form-label label-sesion visually-hidden">E-mail</label>
                    <input type="text" id="email" name="email" placeholder="Email"
                        class="form-control input-sesion @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        @error('email') aria-describedby="error-email" aria-invalid="true" @enderror>
                </div>
                @if ($errors->has('email'))
                    <p class="text-danger" id="error-email">{{ $errors->first('email') }}</p>
                @endif
                {{-- password --}}
                <div class="d-flex div-sesion ">
                    <i class="p-4 fas fa-lock fa-2x i-sesion"></i>
                    <label for="password" class="form-label label-sesion visually-hidden">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="form-control input-sesion @error('password') is-invalid @enderror"
                        @error('password') aria-describedby="error-password" aria-invalid="true" @enderror>
                </div>
                <a href="<?= url('/register') ?>" style="text-decoration: none;">
                    <p class="text-center colorW font-weight-bold pt-4">¿No tenes cuenta? Registrate aca.</p>
                </a>
                @if ($errors->has('password'))
                    <p class="text-danger" id="error-password">{{ $errors->first('password') }}</p>
                @endif
                <button type="submit" class="btn btn-home fs-4">Ingresar</button>
            </form>
        </div>
    </div>
@endsection
