<?php

namespace sgve\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroAlumnoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nom_alumno' => 'required',
            'no_cuenta' => 'required',
            'nom_padre' => 'required',
            'tel_padre' => 'required',
            'no_imss' => 'required',
            'plantel_id' => 'required',
            'carrera_id' => 'required',
        ];
    }
}
