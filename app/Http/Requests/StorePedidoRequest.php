<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'forma_de_pago' => 'required|max:50',
            'platos' => 'required|array',
            'platos.*' => 'exists:platos,id',
            'cantidades' => 'required|array',
            'cantidades.*' => 'integer|min:1',
        ];
    }
    public function messages(){
        return [
            'cliente_id.required' => 'El id del cliente es requerido',
        ];
        
    }
}
