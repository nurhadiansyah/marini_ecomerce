<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = DB::table('users')->get();
        return view('admin1.user.user',[
            'users' => $users
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // die(print_r($user));

        // $users = DB::table('users')->get();
        return view('tampilantoko.profil.profil',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('tampilantoko.profil.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'No_hp' => 'required',
            'tgl_lahir' => 'required',
            'password' => 'required',
        ]);

        if(isset($request->passwordBaru)){

            if ($request->passwordBaru == $request->konfirPasswordBaru){
                $validatedData['password'] = Hash::make($request->passwordBaru);
            } else {
                return back()->withErrors([
                    'passwordBaru' => ['Konfirmasi Password Tidak Sesuai'],
                    'konfirmasi_passwordBaru' => ['Konfirmasi Password Tidak Sesuai'],
                ]);
            }
        }

        User::where('email', $user->email)->update($validatedData);

        return redirect('/user/'.$user->email) -> with('success' , 'New User Hasbeen Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
