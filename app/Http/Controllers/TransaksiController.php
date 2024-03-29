<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\User;
use App\Models\Barang;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::get();
        return view('admin1.transaksi.transaksi',[
            'transaksis' => $transaksis
        ]);
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
        $store['kode_pesanan'] = $request['kode_pesanan'];
        $store['tgl_pesan'] = $request['tgl_pesan'];
        $store['tgl_terima'] = $request['tgl_terima'];
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

            // update jumlah stok
            $barangs = Barang::where('id', $barang_id)->first();
            $kuantitas_barang = $barangs->kuantitas;
            $kuantitas_barang_terbaru = $kuantitas_barang - $jumlah;

            // die(print_r($jumlah));
            Barang::where('id', $barang_id)
            ->update([
                'kuantitas' => $kuantitas_barang_terbaru
            ]);


            Transaksi::create($store);
            Keranjang::destroy($id);
            // print_r($service . '<br>');
            // print_r('User id = '.$store['user_id'] . '<br>');
            // print_r($keranjang_id[0] . '<br>');
            // print_r('jumlah = '.$store['jumlah'] . '<br>');
            // print_r('Barang id = '.$store['barang_id'] . '<br>');
            // print_r('Total = '. $store['total'] . '<br>');
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
        $rules = [
            'status' => 'required',
        ];



        $validatedData = $request->validate($rules);

        if ($validatedData['status'] == "Selesai") {
            $barang_id = $transaksi->barang->id;
            $kuantitas = $transaksi->barang->kuantitas;
            $terjual_sekarang = $transaksi->barang->terjual;
            $terjual_terbaru = $transaksi->jumlah;

            $terjual_total = $terjual_sekarang + $terjual_terbaru;

            Barang::where('id', $barang_id)
            ->update([
                'terjual' => $terjual_total
            ]);

            $validatedData['tgl_terima'] = date('d / m / Y');
        }

        if ($validatedData['status'] == "Batal") {
            $barang_id = $transaksi->barang->id;
            $kuantitas = $transaksi->barang->kuantitas;
            $terjual_terbaru = $transaksi->jumlah;

            $kuantitas_updated = $kuantitas + $terjual_terbaru;

            Barang::where('id', $barang_id)
            ->update([
                'kuantitas' => $kuantitas_updated
            ]);
        }
        Transaksi::where('id', $transaksi->id)
            ->update($validatedData);

        if (auth()->user()->id == 1) {
            return redirect('/transaksi') -> with('success' , 'New Transaksi Hasbeen Updated!');
        }else {
            return redirect('/riwayat_transaksi') -> with('success' , 'New Transaksi Hasbeen Updated!');

        }
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
