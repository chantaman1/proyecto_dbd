<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VuelosRequest extends FormRequest
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
          'tipo' => 'required|string',
          'ciudad_origen' => 'required|string',
          'pais_origen' => 'required|string',
          'codigo' => 'required|string',
          'ciudad_destino' => 'required|string',
          'pais_destino' => 'required|string',
          'fecha' => 'required|date',
          'hora' => 'required|time',
          'aerolinea_id' => 'required|unsignedInteger'
        ];
    }
}
