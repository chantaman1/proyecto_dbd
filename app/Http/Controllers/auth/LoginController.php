<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use validator;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
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
      return view('Auth/login', ['loginErrorMsg' => '', 'regErr' => '']);
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
                $rol = DB::select('select rols.tipo from users, rol_user, rols where users.id = rol_user.id_user and rols.id = rol_user.id_rol and users.email = ?', [$request->get('email')]);
                $request->session()->put('usuario_correo', $email);
                $request->session()->put('usuario_nombre', $userData->nombre);
                $request->session()->put('usuario_apellido_paterno', $userData->apellido_paterno);
                $request->session()->put('usuario_rol', $rol[0]->tipo);
                return redirect('/vuelos');
            }
            else{
              view('Auth/login', ['loginErrorMsg' => 'ERROR: Usuario/Contrasena incorrecta.', 'regErr' => '']);
            }
          }
          else{
            return view('Auth/login', ['loginErrorMsg' => 'ERROR: Cuenta no verificada, revise su correo.', 'regErr' => '']);
          }
        }
        else{
          $request->session()->put('loginErrorMsg', 'ERROR: Usuario/Contrasena incorrecta.');
          return view('Auth/login', ['loginErrorMsg' => 'ERROR: Usuario/Contrasena incorrecta.', 'regErr' => '']);
        }
    }

    public function getLogout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }

}
