<?php
/*
    *Author: Emiliano Vargas (emivargas1998@gmail.com)
    *Date: 06/06/2020
    *Description: IndioStoreRequest se encarga de validar los request (formularios) en el controlador de Usuario. Se usa para verificar que quien carga los datos de los indios a la BD es un Cacique y no otro usuario (indio) y para verificar los input en busca de errores. 
*/

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->parent_id == NULL) { //Solo si es Cacique puede agregar indios. Sino, 403!
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route('id');

        return [
            'name' => 'required|string|max:255|regex:/^[ a-zA-ZÀ-ÿ\u00f1\u00d1]*$/',
            'surname' => 'required|string|max:255|regex:/^[ a-zA-ZÀ-ÿ\u00f1\u00d1]*$/',
            'gender' => 'required|string|max:1',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'between_streets' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric|digits_between:8,15',
            'cel' => 'required|numeric|digits_between:8,15',
            'school' => 'required|string|max:255',
            'grade' => 'required|numeric|between:2,7|regex:/^[0-9]*$/',
            'dni' => ['digits:8', 'regex:/^[0-9]*$/', Rule::unique('users')->ignore($user)],
            'email' => ['email', 'max:255', Rule::unique('users')->ignore($user)],
            'birthdate' => 'required|date|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'string' => 'Solo se admiten caracteres válidos.',
            'email' => 'Mmh... No parece una dirección de correo válida.',
            'numeric' => '¡Sólo números!...',
            'digits' => 'Debe tener hasta 8 caracteres. ',
            'unique' => 'Ya existe',
            'date' => 'Fecha inválida.',

            'grade.max' => 'Verifica este valor.',
            'email.confirmed' => 'Los correos no coinciden',
            'name.regex' => 'El nombre no puede contener números ni signos.',
            'surname.regex' => 'El apellido no puede contener números ni signos.',
            'dni.regex' => 'El DNI no puede contener letras ni símbolos.',
            'dni.max' => 'El DNI no puede contener mas de :max números.',
            'dni.digits' => 'No parece un DNI válido.',
            'grade.regex' => 'No ingreses la división del curso. Solo el año al que asiste.',
            'gender.required' => 'Seleccioná un sexo.',
            'dni.unique' => 'No podemos continuar porque ya hay alguien registrado con ese DNI.',
            'email.unique' => 'Vaya! Ya hay alguien registrado con ese email.',
            'birthdate.date' => 'Fecha incorrecta.',
            'birthdate.date_format' => 'Formato incorrecto de fecha.'
        ];
    }
}
