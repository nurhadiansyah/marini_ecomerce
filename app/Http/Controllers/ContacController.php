<?php

namespace App\Http\Controllers;

use App\Models\Contac;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ContacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::where('user_id', auth()->user()->id)->orderby('updated_at', 'DESC')->get();
        return view('tampilantoko.contac.contac',[
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
     * @param  \App\Models\Contac  $contac
     * @return \Illuminate\Http\Response
     */
    public function show(Contac $contac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contac  $contac
     * @return \Illuminate\Http\Response
     */
    public function edit(Contac $contac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contac  $contac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contac $contac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contac  $contac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contac $contac)
    {
        //
    }
}
