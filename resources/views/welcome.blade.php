@extends('layouts.main')
@section('title', 'Home')
@section('content')

<div class="container p-0 ">
    <h1 class="visually-hidden">PLANTOPIA</h1>
    <div class="container-fluid p-0">
        <div class="banner">
            <div class="container-fluid ">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-4 p-0">
                        <div class="banner-palabra my-5">
                            <h2 class="banner-titulo">¡PLANTOPIA en La Rural!</h2>
                            <p class="banner-parrafo">Con gran entusiasmo, se anuncia la llegada de PLANTOPIA, una
                                aplicación revolucionaria que fusiona la tecnología con la agricultura, transformando
                                tanto las cosechas a gran escala como las de pequeños productores. Se abre paso a una
                                nueva era en la agricultura, donde la innovación y la eficiencia se unen para potenciar
                                los cultivos.</p>
                            <p class="banner-parrafo">¡No te podés perder la oportunidad de sumarte al mundo de PLANTOPIA en la feria ExpoRural! Adquirí tu entrada ahora y unite a nosotros para descubrir de primera mano nuestras innovadoras soluciones agrícolas. Experimentá la aplicación en vivo, conocé a nuestro equipo y, como agradecimiento especial, llevate increíbles regalos de PLANTOPIA.</p>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    @auth
                                    <a class="btn btn-home fs-4 d-flex align-items-center justify-content-center" href="{{ url('/tickets') }}">¡Adquirí tu entrada!</a>
                                    @else
                                    <a class="btn btn-home fs-4 d-flex align-items-center justify-content-center" href="{{  url('/logIn') }}">¡Adquirí tu entrada!</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 ">
                        <img src="{{ asset('storage/imgs/wireframe.png') }}" class="img-fluid p-4" alt="presentacion app en mobiles">
                    </div>
                </div>
            </div>
        </div>
        <div class="items">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-3">
                        <div>
                            <img src="{{ asset('storage/imgs/icono_invertir.png') }}" class="img-fluid img-iconos" alt="icono de monedas">
                            <h2 class="titulo-icono">Invertir</h2>
                            <p class="parrafo-icono">Participá en la fase beta de PLANTOPIA, donde la innovación en la
                                agricultura toma forma, es una oportunidad para contribuir al futuro de la agricultura
                                mediante la exploración de nuevas tecnologías que buscan alcanzar resultados superiores.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div>
                            <img src="{{ asset('storage/imgs/icono_conectividad.png') }}" class="img-fluid img-iconos" alt="icono de mundo">
                            <h2 class="titulo-icono">Conexión</h2>
                            <p class="parrafo-icono">Acceder desde cualquier ubicación para realizar un seguimiento
                                detallado de los cultivos con PLANTOPIA es posible. La aplicación proporciona la
                                capacidad de supervisar y gestionar los campos en tiempo real, independientemente de la
                                ubicación.</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3" style="padding-bottom: 7rem;">
                        <div>
                            <img src="{{ asset('storage/imgs/icono_team.png') }}" class="img-fluid img-iconos" alt="icono de tres personas">
                            <h2 class="titulo-icono">Nosotros</h2>
                            <p class="parrafo-icono">Somos un equipo conformado por tres estudiantes que comparten una
                                convicción profunda en el potencial de la tecnología para simplificar la vida de las
                                personas. Con PLANTOPIA, hemos fusionado nuestra pasión por la innovación con el firme
                                propósito de elevar los estándares en el ámbito agrícola.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection