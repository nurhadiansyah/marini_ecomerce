<?php

namespace App\Http\Controllers;

use App\Models\registrasi;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin1.registrasi');
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
        $validatedData=$request->validate([
            'name'=>'required|max:255|min:3|unique:users',
            'No_hp'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'level'=>'required',
            'tgl_lahir'=>'required'
            
            ]);

            $validatedData['password'] = bcrypt($validatedData['password']);

            User::create($validatedData);

            // die(print_r($request));

            return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function show(registrasi $registrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(registrasi $registrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registrasi $registrasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(registrasi $registrasi)
    {
        //
    }
}
