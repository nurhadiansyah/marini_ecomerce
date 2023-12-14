<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\User;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin1.transaksi.transaksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $store = '';
        $user_id = $request['user_id'];
        $status = $request['status'];
        $user = User::where('id', $user_id)->first();
        $keranjang_id = $request->input('keranjang_id');
        foreach($keranjang_id as $id){
            $keranjangs = Keranjang::where('id', $id)->first();
            $jumlah = $keranjangs->jumlah;
            $total = $keranjangs->total;
            $barang_id = $keranjangs->barang_id;

            $store['jumlah'] = $jumlah;
            $store['total'] = $total;
            $store['status'] = $status;
            $store['user_id'] = $user_id;
            $store['barang_id'] = $barang_id;

            Transaksi::create($store);
            Keranjang::destroy($id);
            // print_r($service . '<br>');
            print_r('User id = '.$store['user_id'] . '<br>');
            // print_r($keranjang_id[0] . '<br>');
            print_r('jumlah = '.$store['jumlah'] . '<br>');
            print_r('Barang id = '.$store['barang_id'] . '<br>');
            print_r('Total = '. $store['total'] . '<br>');
        }

        return redirect("https://wa.me/6285172222280?text=Hai!%20Selamat%20datang%20di%20Toko%20Cahaya%20Wage.%20Terima%20kasih%20telah%20memilih%20produk%20kami.%20Untuk%20memudahkan%20pemesanan%2C%20silahkan%20isi%20formulir%20berikut%20ini%20%3A%0ANama%20Lengkap%20%3A%20{$user->name}%0AEmail%20%3A%20{$user->email}%0AAlamat%20Lengkap%20(disertai%20kode%20POS)%20%3A%0ANo.%20HP%20%3A%20{$user->No_hp}%0AJika%20sudah%2C%20kami%20akan%20menghitung%20jumlah%20total%20harga%20yang%20harus%20dibayar.%C2%A0Terima%C2%A0kasih%5E%5E");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
