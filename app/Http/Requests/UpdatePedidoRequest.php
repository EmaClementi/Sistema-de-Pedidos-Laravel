<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
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
            'cliente_id' => 'required|numeric',
            'fecha' => 'required|date',
            'forma_de_pago' => 'required|max:50',
            'total' => 'required|numeric',
            'estado' => 'required|max:50|in:En Proceso,En Camino,Entregado',
        ];
    }
}
