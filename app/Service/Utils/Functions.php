<?php

namespace App\Service\Utils;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Functions
{

    public static function CheckPhotoProfile()
    {

        $user = Auth::user();
        if ($user->image == 'kosong')
            return url('/img/default-profile.png');
        return $photoProfile = asset('storage/' . $user->image);

    }

    public static function CheckResultValue($value): string
    {
        $result = "";
        if(!is_null($value)) $value == -1 ? $result = 'Positif' : $result = 'Negatif';
        return $result;
    }

    public static function ReturnColorValue($value): string
    {
        $result = '';
        if(!is_null($value))  $value == -1 ? $result = 'danger' : $result = 'info';
        return $result;
    }

    public static function CheckUpdateProfileData($file_image, $request)
    {
        $user = Auth::user();
        if (!is_null($file_image)) {

            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns',
                'image' => 'required|mimes:jpg,png,jpeg'
            ]);

            $path = Storage::putFile('profile', $request->file('image'));
            if ($user->image != 'kosong')
                Storage::delete($user->image);
            $validatedData['image'] = $path;

            return $validatedData;

        }
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
        ]);

        return $validatedData;
    }

}