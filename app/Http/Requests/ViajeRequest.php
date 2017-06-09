<?php

namespace sgve\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViajeRequest extends FormRequest
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
            'nom_viaje' => 'required',
            'motivos' => 'required',
            'impacto' => 'required',
            'fec_ini' => 'required|date|after:today',
            'fec_fin' => 'required|date|after:today',
            'user_id' => 'required',
            'carrera_id' => 'required',
            'ciclo_id' => 'required',
        ];
    }
}
