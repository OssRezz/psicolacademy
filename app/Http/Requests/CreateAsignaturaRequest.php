<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAsignaturaRequest extends FormRequest
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
}
