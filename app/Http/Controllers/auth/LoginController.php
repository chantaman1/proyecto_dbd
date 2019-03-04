<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use validator;
use Auth;
use App\User;
use App\Http\Controllers\UserController;
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
    public $message;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
        $this->message = '';
    }

    public function index(Request $request){
      return view('Auth/login')->with('regErr', '');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6'
        ]);
        $email = $request->get('email');
        $password = $request->get('password');
        $credenciales = array('email' => $email, 'password' => $password);
        $userData = User::where('email', $email)->first();
        if($userData != NULL){
          if($userData->verified){
            if (Auth::attempt($credenciales)) {
                $request->session()->put('usuario_correo', $email);
                $request->session()->put('usuario_nombre', $userData->nombre);
                $request->session()->put('usuario_apellido_paterno', $userData->apellido_paterno);
                return redirect('/');
            }
            else{
              $request->session()->put('loginErrorMsg', 'ERROR: Usuario/Contrasena incorrecta.');
              return redirect('/login');
            }
          }
          else{
            $request->session()->put('loginErrorMsg', 'ERROR: Cuenta no verificada.');
            return redirect('/login');
          }
        }
        else{
          $request->session()->put('loginErrorMsg', 'ERROR: Usuario/Contrasena incorrecta.');
          return redirect('/login');
        }
    }

    public function getLogout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }

}
