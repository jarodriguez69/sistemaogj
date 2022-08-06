<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEje extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;//si el usuario no tiene permisos
        return true; //si el usuario tiene permisos

        // if($this->user_id == auth()->user()->id)
        // {
        //     return true;
        // }
        // else{
        //     return false;
        // }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => "Nombre",
        ];
    }

    public function messages()
    {
        return [
            // 'description.required' =>
            'description' => 'Debe ingresar una Descripcion del curso'
        ];
    }
}
