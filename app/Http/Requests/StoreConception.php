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
                'logo'              => 'sometimes|required|max:5000|mimetypes:application/pdf,image/png,image/jpeg,image/tiff,image/svg+xml,image/gif',
                //'images.*'          => 'image|mimetypes:image/png,image/jpeg|max:5000',
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
                'pdf_conception'    => 'sometimes|required|mimetypes:application/pdf',

                'upgrade'           => 'sometimes|required|max:1|string',

                'document'          => 'sometimes|required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-powerpoint,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/pdf,image/png,image/jpeg',


                'typeLogo'          => 'nullable|max:255|string',
                'ageEntreprise'     => 'nullable|max:50|string',
                'objectif'          => 'nullable|string',
                'printer'            => 'nullable|max:255|string',


        ];
    }

    public function messages()
    {
        return [
            'logo.required'             => 'Un logo est nécessaire',
            'logo.mimetypes'             => 'Le logo doit être en format : JPG, PNG ,JEPG , GIF, PDF ou SVG !',

            'rs_entreprise.required'    => 'Une raison sociale ou un nom du client est nécessaire',
            'activities.required'       => 'Merci de rensigner vos activités pour mieux comprendre votre besoin',
            'pdf_conception.file'       => 'Ce fichier doit être un fichier pdf',
            'pdf_conception.mimes'      => 'Ce fichier doit être un fichier pdf',
            'images.*.mimetypes'        => 'Les fichiers doivent être des images du format : JPG ou PNG',
            'images.*.image'            => 'Les fichiers doivent être des images du format : JPG ou PNG',
            'images.*.required'         => 'Une image du produit est réquise',
            'images.*.max'              => 'Les images ne doivent pas dépasser 5 Mo',
            'positionnement.string'     => 'Du texte est attendu sur ce champs',
            'contacts.string'           => 'Du texte est attendu sur ce champs',
            'texte_additionnel.required'=> 'Merci de saisir les textes pour votre création',
            'cible_b2c.string'                 => 'Du texte est attendu sur ce champs',
            'cible_b2b.string'                 => 'Du texte est attendu sur ce champs',

            'Enfants.string'                   => 'Du texte est attendu sur ce champs',
            'Adolescents.string'               => 'Du texte est attendu sur ce champs',
            'Adultes.string'                   => 'Du texte est attendu sur ce champs',
            'Seniours.string'                  => 'Du texte est attendu sur ce champs',
            'Hommes.string'                    => 'Du texte est attendu sur ce champs',
            'Femmes.string'                    => 'Du texte est attendu sur ce champs',
            'activities_cible.string'          => 'Du texte est attendu sur ce champs',
            'couleur_1.string'                 => 'Du texte est attendu sur ce champs',
            'couleur_2.string'                 => 'Du texte est attendu sur ce champs',
            'couleur_3.string'                 => 'Du texte est attendu sur ce champs',
            'Slab.string'                      => 'Du texte est attendu sur ce champs',
            'Script.string'                    => 'Du texte est attendu sur ce champs',
            'Manuscrit.string'                 => 'Du texte est attendu sur ce champs',
            'Serif.string'                     => 'Du texte est attendu sur ce champs',
            'Sansserif.string'                 => 'Du texte est attendu sur ce champs',
            'style.string'                     => 'Du texte est attendu sur ce champs',
            'note.string'                      => 'Du texte est attendu sur ce champs',
            'produitService.string'            => 'Du texte est attendu sur ce champs',
            'graphiste.integer'                => 'Un ID est requis',
            'graphiste.required'               => 'Un ID est requis',
            'pdf_conception.mimetypes'         => 'Le fichier finale doit être en format PDF',
            'pdf_conception.required'          => 'Le fichier finale est requis',
            'ageEntreprise.string'             => 'Du texte est attendu sur ce champs',
            'objectif.string'                  => 'Du texte est attendu sur ce champs',
            'document.mimes'                   => 'Le fichier finale doit être en format pdf, jpg, png, Microsoft Word, Microsoft Powerpoint, Microsoft Excel',
            'document.file'                    => 'Un document est requis',
            'document.mimetypes'               => 'Un document doit être au format : Word, Excel, PDF ou une image',
            'document.required'                => 'Le fichier finale est requis',

            'printer.string'                   => 'Du texte est attendu sur ce champs',


        ];
    }    
}
