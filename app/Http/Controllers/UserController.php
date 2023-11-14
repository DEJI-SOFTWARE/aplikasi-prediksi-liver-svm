<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function Create($validatedData){

    }
    public function Update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns'
        ]);


        User::where('id', $id)->update($validatedData);
        return redirect()->route('profile')->with('success','Profile berhasil di perbarui!!');

    }

    public function Delete($id){

    }







}

