<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::All();
        return $usuarios;
    }

    public function getUserByEmail($email){
        $usuario = User::where('correo', $email)->first();
        if($usuario != NULL){
            return $usuario;
        }
        else{
            return "No se encontro ningun usuario con ese correo.";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $existUser = User::where('email', $request->get('email'))->first();
        if($existUser == NULL){
            $usuario = new User;
            $usuario->fill([
              'nombre' => $request->get('nombre'),
              'apellido_paterno' => $request->get('apellido_paterno'),
              'apellido_materno' => $request->get('apellido_materno'),
              'facebook_id' => $request->get('facebook_id'),
              'password' => $request->get('password'),
              'email' => $request->get('email'),
              'fecha_nacimiento' => $request->get('fecha_nacimiento'),
              'direccion' => $request->get('direccion'),
              'telefono' => $request->get('telefono'),
              'nacionalidad' => $request->get('nacionalidad'),
              'pasaporte' => $request->get('pasaporte')
            ]);
            $usuario->save();
            return $usuario;
        }
        else{
            return "Usuario ya existe.";
        }
    }

    public function storeFacebook($data)
    {
        $usuario = new User;
        $usuario->fill([
          'nombre' => $data->nombre,
          'apellido_paterno' => '',
          'apellido_materno' => 'not avalaible',
          'facebook_id' => $data->facebook_id,
          'password' => 'not avalaible',
          'email' => $data->email,
          'fecha_nacimiento' => 'not avalaible',
          'direccion' => 'not avalaible',
          'telefono' => 'not avalaible',
          'nacionalidad' => 'not avalaible',
          'pasaporte' => 'not avalaible'
        ]);
        $usuario->save();
        return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        if($usuario != NULL){
          return $usuario;
        }
        else{
          return "El usuario no existe.";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        if($usuario != NULL){
          $usuario->fill($request->all());
          $usuario->password = bcrypt(request('password'));
          $usuario->save();
          return $usuario;
        }
        else{
          return "No puede modificar un usuario no existente.";
        }
    }

    public function updatePasswordByEmail(Request $request, $email){
        $usuario = Usuario::where('correo', $email)->first();
        if($usuario != NULL){
          $usuario->fill($request->all());
          $usuario->password = bcrypt(request('password'));
          $usuario->save();
          return $usuario;
        }
        else{
          return "No puede modificar un usuario no existente.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $usuario = User::find($id);
      if($usuario != NULL){
        $usuario->delete();
        return "Usuario eliminado.";
      }
      else{
        return "Usuario no existente.";
      }
    }
}
