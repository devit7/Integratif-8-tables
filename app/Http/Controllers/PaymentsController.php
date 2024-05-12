<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Payments::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customerNumber' => 'required|numeric|exists:customers,customerNumber',
            'checkNumber' => 'required|unique:payments,checkNumber',
            'amount' => 'required|numeric',
        ]);

        $data = Payments::create([
            'customerNumber' => $request->customerNumber,
            'checkNumber' => $request->checkNumber,
            'paymentDate' => now(),
            'amount' => $request->amount,
        
        ]);

        return response()->json([
            'message' => 'Data pembayaran berhasil disimpan',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payment)
    {
        //dd($payment);
        return response()->json(Payments::where('checkNumber', $payment->checkNumber)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payments $payment)
    {
        $request->validate([
            'checkNumber' => 'required|unique:payments,checkNumber,' . $payment->checkNumber . ',checkNumber',
            'amount' => 'required|numeric',
        ]);

        $payment->where('checkNumber', $payment->checkNumber)
        ->update([
            'checkNumber' => $request->checkNumber,
            'paymentDate' => now(),
            'amount' => $request->amount,
        ]);

        return response()->json([
            'message' => 'Data pembayaran berhasil diubah',
            'data' => $payment
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payments $payment)
    {
        $payment->delete();

        return response()->json(['message' => 'Data pembayaran berhasil dihapus'], 200);
    }
}
