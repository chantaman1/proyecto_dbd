<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class facebookController extends Controller
{

  public function redirectToFacebookProvider()
  {
      return Socialite::driver('facebook')->redirect();
  }

  public function handleProviderFacebookCallback()
  {
      $auth_user = Socialite::driver('facebook')->user();
      $authUser = User::where('facebook_id', $auth_user->id)->first();
      if ($authUser) {
          Auth::login($authUser, true);
          return redirect('/');
      }
      else{
        $data = (object)array('nombre' => $auth_user->name, 'facebook_id' => $auth_user->id, 'email' => $auth_user->email);
        $user = app('App\Http\Controllers\UserController')->storeFacebook($data);
        Auth::login($user, true);
        return redirect('/');
      }
  }
}
