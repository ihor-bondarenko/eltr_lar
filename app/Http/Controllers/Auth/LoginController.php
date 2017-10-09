<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp;
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

    public function logout(){
      Auth::logout();
      return redirect()->route('startpage');
    }

    public function getLogin() {
      $client = new GuzzleHttp\Client();
        $res = $client->request('POST', 'https://einsatzv1.rucomm.com/api/auth/login', [
          'username' => 'rs-ihor',
          'password' => '#xCommandery'
        ]);
        $user = null;
        if($res->getBody()->getContents()){
          $users = \App\User::where('username', 'rs-ihor')->take(1)->get()->map(function($item) {
        return $item['uuid'];
      });//;
          /*foreach ($users as $user) {//
              $user = $user->uuid;
          }*/
          if($user){
            //Auth::loginUsingId($user);
              //return redirect('/');
          }else{
            return response()->json([
                'error' => $users
            ]);
          }
          /*if (Auth::attempt(['username' => 'rs-ihor'])) {
            return redirect('/');
          }else{

          }*/
        }
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
            return redirect()->intended('dashboard');
        }
    }
}
