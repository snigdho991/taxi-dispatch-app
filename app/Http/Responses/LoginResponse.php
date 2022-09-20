<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        
        $home = Auth::user()->role == "Administrator" ? config('fortify.home') : config('fortify.user');
        
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect($home);
    }

}