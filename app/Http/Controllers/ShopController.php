<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        
        $barangs = DB::table('barangs')->orderByRaw("CAST(terjual as UNSIGNED) DESC")->get();
        $kategoris = DB::table('kategoris')->get();

        if(request('search')) {
            // $barangs->where('nama_barang','like','%'. request('search'). '%');
            $barangs = DB::table('barangs')->orderByRaw("CAST(terjual as UNSIGNED) DESC")->where('nama_barang','like','%'. request('search'). '%')->get();
        }

        
        return view('tampilantoko.shop.shop',compact('barangs','kategoris'));
    }

    public function shopkategori(Request $request)
    {
        $id = $request->id;
        // $barangs = DB::table('barangs')->where('kuantitas', '>' , 0)->orderBy('terjual')->where('kategori_id', $id)->get();
        $barangs = DB::table('barangs')->where('kategori_id', $id)->orderByRaw("CAST(terjual as UNSIGNED) DESC")->get();
        $kategoris = DB::table('kategoris')->get();

        // die(print_r($id));

        return view('tampilantoko.shop.shop',[
            'barangs' => $barangs,
            'kategoris' => $kategoris,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $Shop)
    {


        return view('tampilantoko.shop.shopsingle', [
            'shop' => $Shop,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
