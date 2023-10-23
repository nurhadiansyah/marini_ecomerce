<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class TambahjumlahbarangController extends Controller
{
    public function update(Request $request)
    {
        // die(print_r($request));
        // Validasi data yang diterima dari permintaan
        $validatedData = $request->validate([
            'kuantitas' => 'required'
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        
        
        // Temukan data berdasarkan ID
        $data = Barang::find($request->id);

        $updated = $data->kuantitas + $request->kuantitas;
        $validatedData['kuantitas'] = $updated;

        // die(print_r($validatedData['kuantitas']));

        Barang::where('id',$request->id)
        ->update($validatedData);
        return redirect('/barang');

        
    }
}
