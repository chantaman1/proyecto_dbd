<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::All();
        return $usuarios;
    }

    public function getUserByEmail($email){
        $usuario = Usuario::where('correo', $email)->first();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existUser = Usuario::where('correo', request('correo'));
        if($existUser == NULL){
            $usuario = new Usuario;
            $usuario->fill($request->all());
            $usuario->save();
            return $usuario;
        }
        else{
            return "Usuario ya existe.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
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
        $usuario = Usuario::find($id);
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
      $usuario = Usuario::find($id);
      if($usuario != NULL){
        $usuario->delete();
        return "Usuario eliminado.";
      }
      else{
        return "Usuario no existente.";
      }
    }
}
