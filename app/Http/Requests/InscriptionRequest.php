<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionRequest extends FormRequest
{
    /**
    * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
    * Récupère les règles de validation qui s'appliquent à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    // verifier si ce n'est pas un doublon de fonction
    public function rules(): array
    {
        return [
            'nom' => 'bail|required|between:5,30|alpha',
            'prenom' => 'bail|required|between:5,30|alpha',
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:8|confirmed'
            ,
            //
        ];
    }
}
