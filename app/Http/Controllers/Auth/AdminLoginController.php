<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/admin';
 
    public function __construct()
    {
        // if you want to login one user role at a time, 
        // than pass both guards in the middleware to check
        // else pass only the required one
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    protected function attemptLogin(Request $request)
    {     
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        //$request->session()->invalidate();

        return redirect('/');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}