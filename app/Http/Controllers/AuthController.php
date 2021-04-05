<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller
{
    protected $userTable;

    public function __construct(DB $DB)
    {
        $this->userTable = $DB::table('users');
    }

    public function pageLogin()
    {
        return view('auth.login');
    }

    public function pageRegister()
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], ($request->remember_me) ? true : false)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withInput()->withErrors([
            'password' => 'Mật khẩu không chính xác!',
            'forgotPassword' => 'Nếu bạn quên mật khẩu hãy bấm "Quên mật khẩu"',
        ]);
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('page.success')->with([
            'status' => '200',
            'title' => 'Đăng ký thành công!',
            'content' => 'Tự động đến trang đăng nhập sau 5 giây',
            'button' => 'Tới trang đăng nhập',
            'href' => route('auth.login'),
        ]);
    }

    public function loginWithGoogle()
    {

    }

    public function logout(): RedirectResponse
    {
        /*Auth::logout();
        return redirect()->route('auth.login');*/
    }
}
