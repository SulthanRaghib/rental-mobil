<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function create(Request $request)
    {
        $params = array(
            'transaction_details' => array(
                'order_id' => str::uuid(),
                'total_bayar' => $request->gross_amount,
            ),
            'customer_details' => array(
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ),
            'item_details' => array(
                array(
                    'id' => $request->id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'name' => $request->name,
                ),
            ),
            'enabled_payments' => array(
                'credit_card', 'bca_va', 'bni_va', 'bri_va'
            ),
        );

        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeader([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $auth,
        ])->post('https://api.sandbox.midtrans.com/snap/v1/transactions', $params);

        $payment = new Pembayaran;
        $payment->order_id = $response['order_id'];
    }
}
