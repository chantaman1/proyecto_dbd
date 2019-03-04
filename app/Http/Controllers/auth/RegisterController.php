<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\bienvenidaMail;
use App\Mail\verificarMail;
use Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use Faker\Factory as Faker;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:63'],
            'apellido_paterno' => ['required', 'string', 'max:40'],
            'apellido_materno' => ['required', 'string', 'max:40'],
            'fecha_nacimiento' => ['required', 'date'],
            'direccion' => ['required', 'string', 'max:100'],
            'telefono' => ['required', 'string', 'max:30'],
            'nacionalidad' => ['required', 'string', 'max:63'],
            'pasaporte' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'max:127'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function start(Request $request){
        $request->session()->put('nuevo_usuario_correo', $request->get('email'));
        $request->session()->put('nuevo_usuario_pw', $request->get('password'));
        $user = User::where('email', $request->get('email'))->first();
        if($user != NULL){
          return view('Auth/login')->with('regErr', 'Email ya registrado.');
        }
        else{
          return view('Auth/register');
        }

    }

    protected function createUser(Request $request)
    {
        $faker = Faker::create();
        $request->session()->put('usuario_nombre', $request->get('nombre'));
        $request->session()->put('usuario_apellido_paterno', $request->get('apellido_paterno'));

        $token = $faker->sha256;
        $request->session()->put('usuario_mail_token', $token);

        Mail::to($request->session()->get('nuevo_usuario_correo'))->send(new bienvenidaMail($request));
        Mail::to($request->session()->get('nuevo_usuario_correo'))->send(new verificarMail($request));

        $user = new User;
        $user->fill([
            'nombre' => $request->get('nombre'),
            'apellido_paterno' => $request->get('apellido_paterno'),
            'apellido_materno' => $request->get('apellido_materno'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'nacionalidad' => $request->get('nacionalidad'),
            'pasaporte' => $request->get('pasaporte'),
            'email' => $request->session()->get('nuevo_usuario_correo'),
            'password' => Hash::make($request->session()->get('nuevo_usuario_pw')),
            'email_token' => $token,
            'verified' => false,
        ]);
        $user->save();
        return redirect('/login')->with('regErr', 'Cuenta registrada satisfactoriamente.');
    }
}
