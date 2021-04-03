<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    protected $userTable;

    public function __construct(DB $DB)
    {
        $this->userTable = $DB::table('users');
    }

    public function pageLogin()
    {
        return view('login');
    }

    public function pageRegister()
    {

    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'password' => 'Mật khẩu không chính xác!',
            'forgotPassword' => 'Nếu bạn quên mật khẩu hãy bấm "Quên mật khẩu"',
        ]);
    }

    public function register()
    {

    }

    public function loginWithGoogle()
    {

    }

    public function logout()
    {

    }
}
