<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsientosRequest extends FormRequest
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
          'codigo' => 'required|string',
          'tipo' => 'required|string',
          'disponibilidad' => 'required|boolean',
          'precio' => 'required|integer',
          'pais' => 'required|string',
          'activo' => 'required|boolean',
          'vuelo_id' => 'required|unsignedInteger'
        ];
    }
}
