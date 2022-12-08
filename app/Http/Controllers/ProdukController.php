<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::paginate(10);
        return response()->json([
            'data' => $produk
        ]);
    }


    public function store(Request $request)
    {
        $produk = Produk::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga
        ]);
        return response()->json([
            'data'=> $produk
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return response()->json([
            'data' => $produk
        ]);
    }

    
    public function update(Request $request, Produk $produk)
    {
        $produk->kode_produk = $request->kode_produk;
        $produk-> nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->save();

        return response()->json([
            'data' => $produk
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return response()->json([
        'messege' => 'produk delete'
        ], 204);
    }
}
