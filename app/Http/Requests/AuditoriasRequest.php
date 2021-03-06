<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuditoriasRequest extends FormRequest
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
          'tipo_transaccion' => 'required|string',
          'usuario_id' => 'required|unsignedInteger',
          'transaccion_id' => 'required|unsignedInteger'
        ];
    }
}
