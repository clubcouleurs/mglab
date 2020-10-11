<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConception extends FormRequest
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
                'rs_entreprise'     => 'sometimes|required|max:255|string',
                'logo'              => 'sometimes|required|mimes:pdf,jpg,jpeg,png',
                'images[]'          => 'image',
                'slogan'            => 'nullable|max:255|string',
                "activities"        => "sometimes|required|string",
                "positionnement"    => "nullable|string",
                "contacts"          => "nullable|string",
                "texte_additionnel" => "sometimes|required|string",
                "cible_b2c"         => "nullable|string",
                "cible_b2b"         => "nullable|string",
                "Enfants"           => "nullable|string",
                "Adolescents"       => "nullable|string",
                "Adultes"           => "nullable|string",
                "Seniours"          => "nullable|string",
                "Hommes"            => "nullable|string",
                "Femmes"            => "nullable|string",
                "activities_cible"  => "nullable|string",
                'couleur_1'         => 'nullable|max:7',
                'couleur_2'         => 'nullable|max:7',
                'couleur_3'         => 'nullable|max:7',
                'Slab'              => 'nullable|max:4|string',
                'Script'            => 'nullable|max:7|string',
                'Manuscrit'         => 'nullable|max:9|string',
                'Serif'             => 'nullable|max:5|string',
                'Sansserif'         => 'nullable|max:9|string',
                'style'             => 'nullable|string',
                'note'              => 'nullable|string',
                'produitService'    => 'nullable|string',
                'graphiste'         => 'sometimes|required|integer',
                'pdf_conception'    => 'file|mimetypes:application/pdf',

                'document'          => 'sometimes|required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document',

                'typeLogo'          => 'nullable|max:255|string',
                'ageEntreprise'     => 'nullable|max:50|string',
                'objectif'          => 'nullable|string',

        ];
    }

    public function messages()
    {
        return [
            'logo.required'             => 'Un logo est nécessaire',
            'rs_entreprise.required'    => 'Une raison sociale ou un nom du client est nécessaire',
            'activities.required'       => 'Merci de rensigner votre activités',
            'texte_additionnel.required'=> 'Merci de saisir les textes pour votre création',
            'pdf_conception.file'       => 'Ce fichier doit être un fichier pdf'
        ];
    }    
}
