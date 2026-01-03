<?php

namespace App\Http\Requests\Teste;

use Illuminate\Foundation\Http\FormRequest;

class EchoRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'age' => ['required', 'integer', 'min:13', 'max:120'],
            'email' => ['required', 'email'],
        ];
    }
    public function messages():array {
        return [
            'name.required' => 'O campo name é obrigatório.',
            'name.min' => 'O name precisa ter pelo menos 3 caracteres.',
            'age.required' => 'O campo age é obrigatório.',
            'age.integer' => 'O age precisa ser um número inteiro.',
            'email.email' => 'O email precisa ser válido.',
        ];
    }
}
