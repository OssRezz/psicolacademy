<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateAsignaturasRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:255'],
            'area_id' => ['required', 'numeric', 'max:255'],
            'descripcion' => ['required', 'string'],
            'creditos' => ['required', 'numeric', 'max:20'],
            'tipo_asignatura' => ['required', 'numeric', 'max:255'],
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
