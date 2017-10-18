<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Vendors\Api\Commander as CommanderApiLogin;
use Illuminate\Http\Request;
use Validator;
class ApiLoginController extends Controller
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function commanderApiLogin(CommanderApiLogin $api, Request $request) {
          $request->validate([
            'version_url' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
          ]);
          /*$validator = Validator::make($request->all(), [
            'version_url' => 'required|unique:posts|max:255',
            'username' => 'required|unique:posts|max:255',
            'password' => 'required|unique:posts|max:255',
          ]);
          if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
          }
          $res = $api->loginCommander();
          $userId = null;
          if($res){
            $userId = \App\User::where('username', 'rs-ihor')->take(1)->get()->map(function($item) {
              return $item['uuid'];
            });
            if($userId){
              Auth::loginUsingId($userId);
                return redirect('/');
            }else{
              return response()->json([
                  'error' => $user
              ]);
            }
          }*/

        return response()->json([
            'error' => 'error response from API'
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    }
}
