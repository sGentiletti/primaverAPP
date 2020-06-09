<?php
/*
    *Author: Emiliano Vargas
    *Date: 06/06/2020
    *Description: IndioStoreRequest se encarga de validar los request (formularios) en el controlador de Usuario. Se usa para verificar que quien carga los datos de los indios a la BD es un Cacique y no otro usuario (indio) y para verificar los input en busca de errores. 
*/

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->parent_id == NULL) { //Solo si es Cacique puede agregar indios. Sino, 403!
            return true;
        }
        else {
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
        return [
        'name' => 'required|string|max:255|regex:/^([^0-9]*)$/',
        'surname' => 'required|string|max:255|regex:/^([^0-9]*)$/',
        'dni' => 'required|digits:8|regex:/^[0-9]*$/',
        'gender' => 'required|string|max:1',
        'email' => 'required|email|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'between_streets' => 'nullable|string|max:255',
        'phone' => 'numeric|digits:8',
        'cel' => 'required|numeric|digits:8',
        'school' => 'required|string|max:255',
        'grade' => 'required|numeric|regex:/^[0-9]*$/',
        //'birthdate' => 'required|date',
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

            'name.regex' => 'El nombre no puede contener números.',
            'surname.regex' => 'El apellido no puede contener números.',
            'dni.regex' => 'El DNI no puede contener letras ni símbolos.',
            'dni.max' => 'El DNI no puede contener mas de :max números.',
            'grade.regex' => 'No ingreses la división del curso. Solo el año al que asiste.',
            'gender.required' => 'Seleccioná un sexo.'
        ];
    }
}
