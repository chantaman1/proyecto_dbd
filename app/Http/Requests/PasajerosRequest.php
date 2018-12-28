<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasajerosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nombre' => 'required|string',
          'apellido_paterno' => 'required|string',
          'apellido_materno' => 'required|string',
          'fecha_nacimiento' => 'required|date',
          'telefono' => 'required|string',
          'correo' => 'required|string',
          'nacionalidad' => 'required|string',
          'pasaporte' => 'required|string',
          'asiento_id' => 'required|unsignedInteger'
        ];
    }
}
