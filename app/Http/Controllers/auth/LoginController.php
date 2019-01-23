<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use validator;
use Auth;
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

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'correo' => 'required|email',
            'password' => 'required|alphaNum|min:6'
        ]);

        $credentials = Array(
            'correo' => $request->get('correo'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($credentials)) {
            echo "F";
            return redirect('/');
        }
        else{
          echo "GG";
          return back()->with('error', 'Datos de login incorrectos!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirectTo('/');
    }

    public function username()
    {
        return 'correo';
    }
}
