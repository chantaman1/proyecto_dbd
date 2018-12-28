<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservasRequest extends FormRequest
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
          'totalAPagar' => 'required|integer',
          'estado_pago' => 'required|string',
          'usuario_id' => 'required|unsignedInteger'
        ];
    }
}
