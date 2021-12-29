<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'rut'              => 'required|unique:users|max:9',
            'nombres'          => 'required',
            'apellidos'        => 'required',
            'email'            => 'required|email|unique:users',
            'fecha_nacimiento' => 'required',
            'genero'           => 'required',
            'direccion'        => 'required',
            'region_id'        => 'required',
            'departamento_id'  => 'required',
            'cargo_id'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'rut.required'             => 'El campo rut es obligatorio.',
            'rut.max:9'                => 'El campo rut debe tener un maxino de 9 digitos.',
            'rut.unique'               => 'El campo rut ya existe en nuestros registros.',
            'nombres.required'         => 'El campo nombres es obligatorio.',
            'apellidos.required'       => 'El campo apellidos es obligatorio.',
            'email.required'           => 'El campo email es obligatorio.',
            'email.email'              => 'El campo Email no tiene un formato correcto.',
            'email.unique'             => 'El campo Email ya existe en nuestros registros.',
            'direccion.required'       => 'El campo dirección es obligatorio.',
            'region_id.required'       => 'El campo región es obligatorio.',
            'departamento_id.required' => 'El campo departamento es obligatorio.',
            'cargo_id.required'        => 'El campo cargo es obligatorio.',
        ];

    }
}
