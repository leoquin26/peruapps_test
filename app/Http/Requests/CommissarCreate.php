<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommissarCreate extends FormRequest
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
            'first_name.required' => 'El campo nombre es requerido',
            'last_name.required' => 'El campo apellido es requerido',
            'document_type.required' => 'El campo tipo de documento es requerido ',
            'document.required' => 'El campo nro de documento es requerido',
            'type_commissar.required' => 'El campo tipo de comisionado es requerido'
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
            'first_name' => 'required',
            'last_name' => 'required',
            'document_type' => 'required',
            'document' => 'required',
            'type_commissar' => 'required'
        ];
    }
}
