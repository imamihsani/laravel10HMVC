<?php

// namespace App\Http\Controllers\Auth;
namespace Modules\Auth\Http\Controllers\Auth;
use Illuminate\Http\Request;  // Pastikan ini diimport

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/profile/profile'; //ini gw tambahin /profile 5 9 2025
    protected function redirectTo(){ //ini kode baru after login lanngsung nentuin ke path mana (7 10 2025)
        return (auth()->user()->role === 'Admin'|| auth()->user()->role === 'Superadmin') ? '/admin/admin/view' : '/profile/profile'; //kalau yg login role nya Admin arahin lagsung ke admin/admin/view, tapi kalau bukan maka arahin aja ke profile
    }

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

    public function showLoginForm()
    {
        return view('auth::auth.login');
    }

    public function logout(Request $request){
        $this->guard()->logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect()->route('login'); // Menggunakan route name
    }
}
