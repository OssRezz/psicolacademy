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
            'documento' => ['required', 'string', 'max:255'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'departamento' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:255'],
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
