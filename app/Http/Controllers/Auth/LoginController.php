<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AgentServices;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        switch($request->input('tipo')) {
            case 'admin':
                if (Auth::attempt($credentials) && Auth::user()->isAdmin) {
                    $request->session()->regenerate();
                    return redirect()->intended('admin');
                }
                break;
            case 'agent':
                if (Auth::attempt($credentials) && Auth::user()->isAgent) {
                    $request->session()->regenerate();
                    return redirect()->intended('agent');
                }
                break;
            case 'client':
                if (Auth::attempt($credentials) && Auth::user()->isClient) {
                    $request->session()->regenerate();
                    return redirect()->intended('client');
                }
                break;
        }

        return redirect()->intended('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }
}
