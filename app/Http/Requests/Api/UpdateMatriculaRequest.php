<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateMatriculaRequest extends FormRequest
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
            'estudiante_id' => ['required', 'numeric', 'max:255'],
            'semestre' => ['required', 'numeric', 'max:20'],
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
