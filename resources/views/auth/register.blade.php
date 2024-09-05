@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="container-fluid sesion">
        <div class="container form-sesion">
            <h1 class="titulo-sesion">Registrate</h1>
            <p class="fs-4">Ingresá tus datos</p>
            <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Nombre usuario --}}
                <div class="d-flex div-sesion ">
                    <i class="p-4 fas fa-user fa-2x i-sesion"></i>
                    <label for="nombre" class="form-label label-sesion visually-hidden">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Nombre"
                        class="form-control input-sesion @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        @error('name') aria-describedby="error-name" aria-invalid="true" @enderror>
                </div>
                {{-- Email usuario --}}
                <div class="d-flex div-sesion ">
                    <i class="p-4 fas fa-envelope fa-2x i-sesion"></i>
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
                @if ($errors->has('password'))
                    <p class="text-danger" id="error-password">{{ $errors->first('password') }}</p>
                @endif
                <button type="submit" class="btn btn-home fs-4">Registrar</button>
            </form>
        </div>
    </div>
@endsection
