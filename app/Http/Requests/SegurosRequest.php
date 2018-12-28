<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SegurosRequest extends FormRequest
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
          'precio' => 'required|integer',
          'descripcion' => 'required|text',
          'aseguradora_id' => 'required|unsignedInteger'
        ];
    }
}
