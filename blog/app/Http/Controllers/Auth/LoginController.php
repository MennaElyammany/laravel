<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    { 
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return Redirect::to('login/github');
        }
       
        
        $authUser = $this->findOrCreateUser($user,$driver);
        
        Auth::login($authUser, true);

     return redirect()->route('posts.index');

}
private function findOrCreateUser($user,$driver)
    {
     
        if ($authUser = User::where('email', $user->email)->first()) {
            return $authUser;
        }
    if($driver=='github')
        return User::create([
            'name' => $user->nikname,
            'email' => $user->email,
            'provider_id ' => $user->id,
            
        ]);
        if($driver=='google')
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'provider_id ' => $user->id,
            
        ]);

    }}
    
  
    