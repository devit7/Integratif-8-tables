<?php

namespace App\Http\Controllers;

use App\Models\Offices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Offices::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'officeCode' => 'required|unique:offices|numeric',
            'city' => 'required',
            'phone' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'country' => 'required',
            'postalCode' => 'required',
            'territory' => 'required',
        ]);

        DB::table('offices')->insert([
            'officeCode' => $request->officeCode,
            'city' => $request->city,
            'phone' => $request->phone,
            'addressLine1' => $request->addressLine1,
            'addressLine2' => $request->addressLine2,
            'country' => $request->country,
            'postalCode' => $request->postalCode,
            'territory' => $request->territory,
        ]);

        return response()->json(['message' => 'Data kantor berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function show(Offices $office)
    {

        return response()->json($office);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offices $office)
    {
        // Validasi input
        $request->validate([
            'city' => 'required',
            'phone' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'country' => 'required',
            'postalCode' => 'required',
            'territory' => 'required',
        ]);

        // Cari kantor berdasarkan officesCode
        DB::table('offices')
        ->where('officeCode', $office->officeCode)
        ->update([
            'city' => $request->city,
            'phone' => $request->phone,
            'addressLine1' => $request->addressLine1,
            'addressLine2' => $request->addressLine2,
            'country' => $request->country,
            'postalCode' => $request->postalCode,
            'territory' => $request->territory,
        ]);

        // Beri respons JSON
        return response()->json(['message' => 'Data kantor berhasil diperbarui'], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offices $office)
    {
        //check jika di tabel lain ada foreign key yang mengacu ke officeCode
        $cek = DB::table('employees')
        ->where('officeCode', $office->officeCode)
        ->count();
        if($cek > 0){
            return response()->json(['message' => 'Data offices tidak bisa dihapus karena berelasi di table lain'], 400);
        }

        // Hapus kantor berdasarkan officesCode
        DB::table('offices')
        ->where('officeCode', $office->officeCode)
        ->delete();

        // Beri respons JSON
        return response()->json(['message' => 'Data kantor berhasil dihapus'], 200);
    }
}
