<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function Create($validatedData)
    {

    }
    public function UpdateProfile(Request $request, $id)
    {

        $file_image = $request->file('image');
        if (!$file_image) {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns'
            ]);
        }


        $user = User::where('id', $id)->first();

        if ($user->image != 'kosong') {
            Storage::delete($user->image);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        $path = Storage::putFile('profile', $request->file('image'));
        $validatedData['image'] = $path;

        User::where('id', $id)->update($validatedData);
        return redirect()->route('profile')->with('success', 'Profile berhasil di perbarui!!');

    }

    public function UpdatePassword(Request $request){

        $old_password = $request->old_password;
        $new_password = $request->new_password;

        $current_password = Auth::user()->password;

        if(Hash::check($old_password, $current_password)){
            return var_dump("berhasil");
        }

        return 'password lama anda salah';
    }

    public function Delete($id)
    {

    }







}

