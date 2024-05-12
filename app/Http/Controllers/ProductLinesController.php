<?php

namespace App\Http\Controllers;

use App\Models\Productlines;
use Illuminate\Http\Request;

class ProductLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Productlines::all());
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
            'productLine' => 'required|unique:productlines,productLine',
            'textDescription' => 'required',
            'htmlDescription' => 'required',
            'image' => 'required',
        ]);

        $data = Productlines::create([
            'productLine' => $request->productLine,
            'textDescription' => $request->textDescription,
            'htmlDescription' => $request->htmlDescription,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'Data product line berhasil disimpan',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productlines  $productlines
     * @return \Illuminate\Http\Response
     */
    public function show(Productlines $productline)
    {
        return response()->json($productline);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productlines  $productlines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productlines $productline)
    {
        //dd($productline);
        $request->validate([
            'productLine' => 'required|unique:productlines,productLine,' . $productline->productLine . ',productLine',
            'textDescription' => 'required',
            'htmlDescription' => 'required',
            'image' => 'required',
        ]);

        $data = $productline->update([
            'productLine' => $request->productLine,
            'textDescription' => $request->textDescription,
            'htmlDescription' => $request->htmlDescription,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'Data product line berhasil diubah',
            'data' => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productlines  $productlines
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productlines $productline)
    {
        $productline->delete();
        return response()->json([
            'message' => 'Data product line berhasil dihapus'
        ], 200);
    }
}
