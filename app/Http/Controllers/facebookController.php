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

  public function handleProviderFacebookCallback(Request $request)
  {
      $auth_user = Socialite::driver('facebook')->user();
      $authUser = User::where('facebook_id', $auth_user->id)->first();
      if ($authUser) {
          $request->session()->put('usuario_correo', $authUser->email);
          $request->session()->put('usuario_nombre', $authUser->nombre);
          Auth::login($authUser, true);
          return redirect('/vuelos');
      }
      else{
        $data = (object)array('nombre' => $auth_user->name, 'facebook_id' => $auth_user->id, 'email' => $auth_user->email);
        $user = app('App\Http\Controllers\UserController')->storeFacebook($data);
        $request->session()->put('usuario_correo', $auth_user->email);
        $request->session()->put('usuario_nombre', $auth_user->name);
        Auth::login($user, true);
        return redirect('/vuelos');
      }
  }
}
