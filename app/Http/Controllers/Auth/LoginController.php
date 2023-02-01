<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

// model
use App\Models\User;

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

      private function registerOrLogin($data)
      {
            $user = User::where('email', '=', $data->email)->first();
            if (! $user) {
                  $user              = new User();
                  $user->name        = $data->name;
                  $user->email       = $data->email;
                  $user->provider_id = $data->id;
                  $user->avatar      = $data->avatar;
                  $user->save();
            }

            Auth::login($user);

            return redirect()->route('home')->with('success', 'Login');
      }

      public function redirectToGoogle()
      {
            return Socialite::driver('google')->redirect();
      }

      public function handleGoogleCallback()
      {
            $user = Socialite::driver('google')->user();

            return $this->registerOrLogin($user);
      }

      public function redirectToFacebook()
      {
            return Socialite::driver('facebook')->redirect();
      }

      public function handleFacebookCallback()
      {
            $user = Socialite::driver('facebook')->user();
      }

      public function redirectToGithub()
      {
            return Socialite::driver('github')->redirect();
      }

      public function handleGithubCallback()
      {
            $user = Socialite::driver('github')->user();
      }
}
