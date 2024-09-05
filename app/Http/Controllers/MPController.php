<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class MPController extends Controller
{
    public function tickets()
    {
        return view('tickets');
    }

    public function payTickets(Request $request)
    {
        $quantity = intval($request->input('quantity', 1));
        $items[] = [
            'title' => 'Entrada a LA RURAL 2024',
            'unit_price' => 1000,
            'quantity' => $quantity,
            'currency_id' => 'ARS'
        ];

        MercadoPagoConfig::setAccessToken(env('MP_ACCESS_TOKEN'));

        $client = new PreferenceClient();
        $preference = $client->create([
            'items' => $items,
            'back_urls' => [
                'success' => route('tickets.success'),
                'failure' => route('tickets.failure'),
                'pending' => route('tickets.pending'),
            ],
        ]);

        $user = User::findOrFail(auth()->user()->id);
        DB::transaction(function () use ($user, $quantity) {
            $user->update([
                'cantidad_entradas' => $quantity,
            ]);
        });

        return view('PayTickets', [
            'preference' => $preference,
            'mpPublicKey' => env('MP_PUBLIC_KEY'),
            'quantity' => $quantity
        ]);
    }

    public function success(Request $request)
    {
        $collectionStatus = $request->query('collection_status');
        $paymentId = intval($request->query('payment_id'));
        $paymentType = $request->query(('payment_type'));
        try {
            $user = User::findOrFail(auth()->user()->id);
            DB::transaction(function () use ($user, $paymentId) {
                $user->update([
                    'fecha_compra' => now(),
                    'n_factura' => $paymentId,
                ]);
            });
            return view('success', compact('collectionStatus', 'paymentId', 'paymentType'))
                ->with('status', ['type' => 'success', 'message' => 'Compra guardada con éxito en nuestra base']);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('status', ['type' => 'error', 'message' => 'No se pudo registrar tu compra en la base: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function failure(Request $request)
    {
        $collectionStatus = $request->query('collection_status');
        $paymentId = intval($request->query('payment_id'));
        $paymentType = $request->query(('payment_type'));
        return view('failure', compact('collectionStatus', 'paymentId', 'paymentType'));
    }

    public function pending(Request $request)
    {              
        $collectionStatus = $request->query('collection_status');
        $paymentId = intval($request->query('payment_id'));
        $paymentType = $request->query(('payment_type'));
        return view('pending', compact('collectionStatus', 'paymentId', 'paymentType'));
    }
}
