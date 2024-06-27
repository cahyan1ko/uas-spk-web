<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman otentikasi Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        $redirectUrl = Socialite::driver('google')
            ->redirect()
            ->getTargetUrl();
        
        // Menambahkan parameter prompt=select_account ke URL redirect
        $redirectUrl .= '&prompt=select_account';
        
        return redirect($redirectUrl);
    }
    public function googleCallBack()
    {
        $user = Socialite::driver('google')->user();
        $user = \App\Models\User::where('email', '=', $user->email)->first();

        if ($user) {
            Auth::login($user);
            return view('home');
        }else{
            abort(404);
        }
    }
}
