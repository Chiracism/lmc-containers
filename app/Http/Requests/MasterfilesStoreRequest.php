<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterfilesStoreRequest extends FormRequest
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
            'pays_id',
            'type_conteneur_id',
            'taille_conteneur_id',
            'materiel_id',
            'proprietaire_id',
            'etat_conteneur_id',
            'constructeur',
            'date_fabrication',
            'date_entrer_service',
            'date_derniere_inspection',
            'valeur_assuree',
            'devise_id',
            'societe_inspection',
            'dernier_constat',
            'site_id',
            'sous_site_id',
            'date_mouvement',
            'observation',
            'client',
            'date_operation',
            'montant',
            'numero_recu',
        ];
    }
}
