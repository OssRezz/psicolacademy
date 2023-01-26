<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEstudianteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'documento' => ['required', 'numeric'],
            'nombres' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'telefono' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'direccion' => ['required', 'string'],
            'departamento' => ['required', 'string'],
            'ciudad' => ['required', 'string'],
            'estado' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([
            'status'   => 404,
            'message'   => 'Errores de validaciones',
            'data'      => $validator->errors()
        ]));
    }
}
