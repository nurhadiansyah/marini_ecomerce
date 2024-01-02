<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = DB :: table('kategoris')->select('id', 'nama_kat')
                ->orderBy('nama_kat', 'asc')->get();

        // $barangs = DB::table('barangs')->get();
        $barangs = Barang::all();
        // $kategori = Barang::find()->phone;
        return view('admin1.barang.barang',[
            'data'=> $data,
            'barangs'=>$barangs
        ]);
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
        // die(print_r($request));
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'kuantitas'=> 'required',
            'harga'=> 'required',
            'kategori_id'=>'Required'

        ]);
        // die(print_r($validatedData));

        if($request->file('gambar')){
            $validatedData['gambar'] = $request -> file('gambar') -> store('Barang_img');
        }


        Barang::create($validatedData);
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'nama_barang' => 'required',
            'kuantitas'=> 'required',
            'harga'=> 'required',
            'kategori_id'=>'Required'

        ];

        $validatedData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request -> file('gambar') -> store('Barang_img');
        }
        // die(print_r($validatedData));
        // $kuantitas=$kuantitas + $jumlah1;


        Barang::where('id',$barang->id)
        ->update($validatedData);
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        if($barang->gambar){
            Storage::delete($barang->gambar);
        }
        Barang::destroy($barang->id);

        return redirect('/barang');
    }
}
