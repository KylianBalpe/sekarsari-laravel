<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            "active" => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if ($user && $user->is_active == 1 && Auth::attempt($credentials)) {
            $request->session()->regenerate();

            toastr()->success('Welcome Back!', ['closeButton' => true]);
            return redirect()->intended('/admin');
        }

        if ($user && $user->is_active !== 1) {
            toastr()->error('Akun tidak aktif!', 'Login gagal!', ['closeButton' => true]);
            return back();
        }

        toastr()->error('Username atau password salah!', 'Login gagal!', ['closeButton' => true]);
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
