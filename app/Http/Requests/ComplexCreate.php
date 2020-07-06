<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplexCreate extends FormRequest
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
            'name.required' => 'El nombre es requerido',
            'complex_type.required' => 'El tipo  es requerido',
            'boss.required' => 'El jefe es requerido',
            'location.required' => 'La locacion es requerida',
            'sports.required' => 'El deporte o los deportes son requeridos',
            'area.required' => 'El area es requerida',
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
            'name' => 'required',
            'complex_type' => 'required',
            'boss' => 'required',
            'location' => 'required',
            'sports' => 'required',
            'area' => 'required',
            'head_quarter_id' => 'required'
        ];
    }

}
