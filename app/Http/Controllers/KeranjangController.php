<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $keranjangs = DB::table('keranjangs')->get();

        $id = auth()->user()->id;
        $keranjangs = Keranjang::where('user_id', $id)->get();

        $jumlah = Transaksi::count();
        if ($jumlah == 0) {
            $urut = 10000001;
            $kode_pesanan = 'CW' . $urut;
            // dd($no_registrasi);
        } else {
            $ambil = Transaksi::all()->last();
            $urut = (int) substr($ambil->kode_pesanan, -8) + 1;
            $kode_pesanan = 'CW' . $urut;
            // dd($no_registrasi);

        }

        // $keranjangs = Keranjang::find($id);

        // die(print_r($keranjangs));

        return view('tampilantoko.keranjang.keranjang',[
            'keranjangs'=>$keranjangs,
            'kode_pesanan'=>$kode_pesanan, ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->jumlah;
        // die(print_r($data));
        $validatedData = $request->validate([
            'harga' => 'required',
            'barang_id'=> 'required',
            'user_id'=> 'required',
            'jumlah'=>'Required'

        ]);
        $total= $request->harga * $request->jumlah;
        $validatedData['total']=$total;

        Keranjang::create($validatedData);
        return redirect('/keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(keranjang $keranjang)
    {
        //
    }
}
