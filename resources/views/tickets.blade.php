@extends('layouts.main')
@section('title', 'Tickets')
@section('content')

    <div class="container p-0">
        <h1 class="d-none">Te invitamos a ver la revolución verde.</h1>
        <div class="banner-ticket">
            <div class="container ">
                <div class="banner-ticket-palabra text-center">
                    <h2 class="banner-titulo">¡Gracias por confiar en nosotros!</h2>
                    <p class="banner-parrafo">Ya que vas a descargar la app de PLANTOPIA vení a formar parte de la revolución
                        agrícola.
                        Estaremos presentes en la feria de LA RURAL, donde podés conocer de cerca las innovaciones
                        que estamos llevando a cabo para transformar la agricultura.</p>
                    <p class="banner-parrafo">Adquirí tus entradas ahora por tan solo <span class="numero">$1000</span> ARS.
                        No te pierdas esta oportunidad de ser parte del
                        cambio.</p>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div>
                                <h2 class="titulo-icono colorW">Detalles de la Entrada</h2>
                                <form method="GET" action="{{ route('payTickets') }}">
                                    @csrf
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Precio</th>
                                                <th>Fecha</th>
                                                <th>Lugar</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>$1000 ARS</td>
                                                <td>18 al 28 de Julio</td>
                                                <td>La Rural, predio Ferial de Bs As</td>
                                                <td>
                                                    <select name="quantity" class="form-select">
                                                        @for ($i = 1; $i <= 10; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center mt-4 width3">
                                        <button type="submit" class="btn btn-home">Pagar Entradas</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
