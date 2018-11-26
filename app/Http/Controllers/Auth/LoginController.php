<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth as AuthUser;
use Log;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // login form
    public function getLogin()
    {
        return view('login');
    }

    // verify login credentials
    public function postLogin(Request $request)
    {
        try {
            $message = trans('messages.invalid_login_credentials');
            $rememberMe = false;
            $user = User::where('email', $request->email)->first();
            if (!empty($user)) {
                //Matching password using hash
                $hasPas = \Hash::make($request->password);
                $isPasswordMatched = \Hash::check($request->password, $user->password);
                if ($isPasswordMatched) {
                    AuthUser::loginUsingId($user->id, $rememberMe);
                    return redirect('/home');
                }
            }
        } catch (\Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . "  " . $e->getMessage() . "on line" . $e->getLine());
        }
        return redirect('/login')->with('error_msg', $message);
    }
}
