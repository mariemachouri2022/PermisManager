<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermiRequest extends FormRequest
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


                'Num' =>[ 'max:100'],
                'NumId' =>[ 'max:100'],
                'Lieu' => [ 'max:100'],
                'Nom' => [ 'max:100'],
                'Prenom' => [ 'max:100'],
                'DateEdition' => [ 'max:100'],
                'DateDelivrance' => [ 'max:100'],
                'DateReussite' => ['required'],
                'Description'=> [ 'max:100'],

        ];
    }
}
