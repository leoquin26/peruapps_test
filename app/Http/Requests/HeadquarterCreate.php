<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeadquarterCreate extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => 'El nombre de la sede es requerido.',
            'direction.required'  => 'La direccion es requerido.',
            'budget.required'    =>  'El presupuesto es requerido.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "direction" => "required",
            "budget" => "required"
        ];
    }
}
