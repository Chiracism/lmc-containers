<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReparationStoreRequest extends FormRequest
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
            'numero_conteneur', 
            'date_derniere_reparation',
            'type_conteneur_id',
            'taille_conteneur_id',
            'proprietaire_id',
            'pays_name',
            'taux_name',
            'heure',
            'materiel_id',
            'total',
            'numero_recu',
            'societe_reparation',
            'societe_location',
            'site_id',
            'date_derniere_inspection',
            'societe',
        ];
    }
}
