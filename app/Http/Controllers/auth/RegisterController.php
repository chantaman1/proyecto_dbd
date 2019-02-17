<?php
namespace App\Http\Controllers\Auth;
use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\bienvenidaMail;
use App\Mail\verificarMail;
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
     * @return \App\Usuario
     */
    protected function create(array $data)
    {
        $faker = Faker::create();

        $this->session()->put('usuario_nombre', $data['nombre']);
        $this->session()->put('usuario_apellido_paterno', $data['apellido_paterno']);
        $this->session()->put('usuario_correo', $data['correo']);

        $token = $faker->sha256;
        $this->session()->put('usuario_mail_token', $token);

        Mail::to($data['correo'])->send(new bienvenidaMail());
        Mail::to($data['correo'])->send(new verificarMail());

        return Usuario::store([
            'nombre' => $data['nombre'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'nacionalidad' => $data['nacionalidad'],
            'pasaporte' => $data['pasaporte'],
            'correo' => $data['correo'],
            'password' => $data['password'],
            'mail_token' => $token,
        ]);
    }
}
