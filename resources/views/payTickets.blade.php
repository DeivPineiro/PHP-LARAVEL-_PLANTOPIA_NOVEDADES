@extends('layouts.main')
@section('title', 'payTickets')
@section('content')

    <div class="container p-0">
        <h1 class="d-none">Te invitamos a ver la revolución verde.</h1>
        <div class="container-fluid p-0">
            <div class="banner-ticket">
                <div class="container fluid ">
                    <div class="row align-items-center">
                        <div class="col-12 ">
                            <div class="banner-palabra my-5">
                                <h2 class="banner-titulo">Ya falta poco para presenciar la revolución verde</h2>

                                <div class="row align-items-center justify-content-center">
                                    <div class="items">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-9">
                                                    <div>
                                                        <h2 class="titulo-icono colorW">Detalles de la Entrada</h2>
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
                                                                    <td>{{ 1000 * $quantity }} ARS</td>
                                                                    <td>18 al 28 de Julio</td>
                                                                    <td>La Rural, predio Ferial de Bs As</td>
                                                                    <td>
                                                                        {{ $quantity }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                        <div id="checkout"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('<?= $mpPublicKey ?>');
        mp.bricks().create('wallet', 'checkout', {
            initialization: {
                preferenceId: '<?= $preference->id ?>',
            }
        });
    </script>
@endsection
