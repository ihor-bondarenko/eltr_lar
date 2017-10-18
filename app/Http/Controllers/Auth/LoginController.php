<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Vendors\Api\Commander as CommanderApiLogin;
use Illuminate\Http\Request;
use Validator;
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
    /**
     * Handle an logout attempt.
     *
     * @return Response
     */
    public function logout(){
      Auth::logout();
      return redirect()->route('startpage');
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
    public function commanderApiLogin(CommanderApiLogin $api, Request $request) {
          $request->validate([
            'version_uuid' => 'required|max:255'
          ]);
          $res = $api->login($request->input('version_url'), $request->all());
          if($res['statusCode'] == 200 && $res['token']) {
            $userId = \App\User::where('username', 'administrator')->take(1)->get()->map(function($item) {
              return $item['uuid'];
            });
            if($userId){
              Auth::loginUsingId($userId);
              $request->session()->push('user.commander_token', $res['token']);
            }
          }
          return response()->json($res);
    }
}
