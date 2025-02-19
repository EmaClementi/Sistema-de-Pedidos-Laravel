<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'nombre' => ['required','regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/', 'max:50'],
            'apellido' => ['required','regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/', 'max:50'],
            'direccion' => ['required','regex:/[A-Za-z0-9\s,.-]+/', 'max:100'],
            'telefono' => ['required','regex:/^\+?[0-9\s\-\(\)]{7,20}$/'],
        ];
    }
}
