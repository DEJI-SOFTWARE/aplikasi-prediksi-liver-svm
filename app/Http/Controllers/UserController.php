<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{


    public function Create($validatedData)
    {

    }
    public function UpdateProfile(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        $file_image = $request->file('image');

        if (!is_null($file_image)) {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns',
                'image' => 'required|mimes:jpg,png,jpeg'
            ]);

            $path = Storage::putFile('profile', $request->file('image'));
            $validatedData['image'] = $path;
            if ($user->image != 'kosong')
                Storage::delete($user->image);

        } else {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns',
            ]);

        }

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'image' => $validatedData['image']
        ]);
        Alert::success('Berhasil', 'Profile berhasil diperbarui!!');
        return redirect()->route('profile');

    }

    public function UpdatePassword(Request $request)
    {

        $old_password = $request->old_password;
        $new_password = $request->new_password;

        $currentUser = Auth::user();

        if (Hash::check($old_password, $currentUser->password)) {

            $new_password = Hash::make($new_password);
            User::where('id', $currentUser->id)->update(['password' => $new_password]);
            Alert::success('Berhasil', 'Password berhasil diperbarui!!');
            return redirect()->route('profile');
        }

        Alert::error('Gagal', 'Password gagal diperbarui, coba lagi!');
        return redirect()->back();
    }








}

