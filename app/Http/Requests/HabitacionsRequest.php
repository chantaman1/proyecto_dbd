<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitacionsRequest extends FormRequest
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
          'numero' => 'required|integer',
          'capacidad' => 'required|integer',
          'disponibilidad' => 'required|boolean',
          'tipo_cama' => 'required|string',
          'categoria' => 'required|string',
          'precio' => 'required|integer',
          'activo' => 'required|boolean',
          'hotel_id' => 'required|unsignedInteger'
        ];
    }
}
