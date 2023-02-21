<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function loginForm(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // todo: Use Auth to support password_hash and remember_token
        $user = User::whereEmail($credentials['email'])->first();

        if ($user->is_enabled && $user->password_plain === $credentials['password']) {
            $request->session()->regenerate();
            $request->session()->put('email', $credentials['email']);

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
