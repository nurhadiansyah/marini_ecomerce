<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datas = Kategori::orderBy('updated_at','DESC')->get();
        // die(print_r($datas));
        $kategoris = DB::table('kategoris')->get();
        return view('admin1.kategori.kategory',[
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin1.kategori.createkategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $validatedData = $request->validate([
            'nama_kat' => 'required',
            'gambar'=> 'image'
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request -> file('gambar') -> store('kategori_img');
        }
        // die(print_r($validatedData));
        // $imageName = time().'.'.$request->gambar->extension();  
     
        // $request->image->move(public_path('kategori_img'), $imageName)

        Kategori::create($validatedData);
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        // die(print_r($request->oldimage));
        // die(print_r($validatedData));
        $rules = [
            'nama_kat' => 'required',            
        ];
        
        $validatedData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request -> file('gambar') -> store('kategori_img');
        }
        
        
        

        Kategori::where('id',$kategori->id)
        ->update($validatedData);
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        // die(print_r($kategori));
        if($kategori->gambar){
            Storage::delete($kategori->gambar);
        }
        Kategori::destroy($kategori->id);

        return redirect('/kategori');
    }
}
