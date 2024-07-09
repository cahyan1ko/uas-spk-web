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
        $redirectUrl .= '&prompt=select_account';
        
        return redirect($redirectUrl);
    }
    public function googleCallBack()
    {
        try {
            if (request()->has('error')) {
                return redirect()->route('index')->withErrors(['error' => 'Login dengan Google dibatalkan.']);
            }

            $user = Socialite::driver('google')->user();
            $user = \App\Models\User::where('email', '=', $user->email)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('home');
            } else {
                abort(404);
            }
        } catch (\Exception $e) {
            return redirect()->route('index')->withErrors(['error' => 'Terjadi kesalahan saat login dengan Google.']);
        }
    }
}