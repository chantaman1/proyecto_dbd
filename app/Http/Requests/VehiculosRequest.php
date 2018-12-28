<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculosRequest extends FormRequest
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
          'patente' => 'required|string',
          'marca' => 'required|string',
          'modelo' => 'required|string',
          'año' => 'required|integer',
          'precio' => 'required|integer',
          'cantidad_asientos' => 'required|integer',
          'tipo_transmision' => 'required|string',
          'descripcion' => 'required|string'.
          'compania_alquiler_id' => 'required|unsignedInteger'
        ];
    }
}
