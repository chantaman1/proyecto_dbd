<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaquetesRequest extends FormRequest
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
          'pais_destino' => 'required|string',
          'ciudad_destino' => 'required|string',
          'precio' => 'required|integer',
          'descuento' => 'required|float',
          'cupos' => 'required|integer',
          'disponibilidad' => 'required|boolean',
          'posee_vehiculo' => 'required|boolean',
          'posee_hotel' => 'required|boolean',
          'posee_seguro' => 'required|boolean'
        ];
    }
}
