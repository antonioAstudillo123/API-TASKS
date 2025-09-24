<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'company_id' => ['required', 'exists:companies,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id'],

        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la tarea es obligatorio.',
            'name.string' => 'El nombre de la tarea debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',

            'user_id.required' => 'Debe especificarse el usuario asignado.',
            'user_id.exists' => 'El usuario seleccionado no existe.',

            'company_id.required' => 'Debe especificarse la compañía.',
            'company_id.exists' => 'La compañía seleccionada no existe.',

            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe tener un formato válido.',
        ];
    }
}
