<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\UserLoginHistory;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function authenticated(Request $request, $user)
    {
        // Save User's Details while login
        $record                     = new UserLoginHistory;
        $record->user_ip            = $request->getClientIp();
        $record->user_id            = $user->id;
        $record->browser_details    = $request->header('User-Agent');
        $record->save();
    }

}
