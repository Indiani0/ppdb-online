<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => 'Email atau Password anda salah, silahkan periksa kembali!'];

        if (!\App\Models\User::where($this->username(), $request->{$this->username()})->exists()) {
            $errors = [$this->username() => 'Data Tidak ditemukan! Silahkan daftar terlebih dahulu'];
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * Handle a successful authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated($request, $user)
    {
        if ($user->role_id === 1 || $user->role_id === 2) {
            return redirect()->route('home');
        } else if ($user->role_id === 3) {
            return redirect()->route('beranda');
        } else {
            return redirect()->abort(404);
        }
    }
}
