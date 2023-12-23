<?php

namespace App\Service\Utils;

use Illuminate\Support\Facades\Auth;

class Functions {

    public static function CheckPhotoProfile () {

        $user = Auth::user();
        if($user->image == 'kosong') return url('/img/default-profile.png');
        return $photoProfile = asset('storage/'.$user->image);
        
    }

}