<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function __construct ()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index ()
    {
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
        $username = $credentials['username'];
        $password = $credentials['password'];
        $guard = $credentials['loginType'] == 'Mahasiswa' ? 'mahasiswa' : 'pegawai';
        $usernameKey = $credentials['loginType'] == 'Mahasiswa' ? 'nim' : 'nip';
        $credentials = [$usernameKey => $username, 'password' => $password];
        
        if (Auth::guard($guard)->attempt($credentials)) {
            return redirect()->route('dashboard');
        }else{
            return back()->with('error', 'Tidak ditemukan username dan password yang cocok.');
        }
    }

    public function logout()
    {
        auth('mahasiswa')->logout();
        auth('pegawai')->logout();
        return redirect()->route('login');
    }
}
