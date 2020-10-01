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
                'logo'              => 'file',
                'images[]'          => 'file',
                'slogan'            => 'nullable|max:255|string',
                "activities"        => "sometimes|required|string",
                "positionnement"    => "nullable|string",
                "contacts"          => "nullable|string",
                "texte_additionnel" => "string",
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
                'graphiste'         => 'sometimes|required|integer',
                'pdf_conception'    => 'file'


        ];
    }

    public function messages()
    {
        return [
            'rs_entreprise.required' => 'A title is required',
            'activities.required' => 'A message is required',
            'pdf_conception.file'    => 'ce fichier doit $etre un fle'
        ];
    }    
}
