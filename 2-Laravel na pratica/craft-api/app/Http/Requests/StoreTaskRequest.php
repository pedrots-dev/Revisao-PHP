<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:120'],
            'description' => ['nullable', 'string', 'max:2000'],
            'done' => ['sometimes', 'boolean'],
            'finish' => ['nullable', 'date']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título precisa ter pelo menos 3 caracteres.',
            'title.max' => 'O título pode ter no máximo 120 caracteres.',

            'description.string' => 'A descrição precisa ser um texto.',
            'description.max' => 'A descrição pode ter no máximo 2000 caracteres.',

            'done.boolean' => 'O campo done precisa ser true/false.',

            'finish.date' => 'O campo due_at precisa ser uma data válida.',
        ];
    }
}
