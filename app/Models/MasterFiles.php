<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterFiles extends Model
{
    use HasFactory;
    protected $fillable = [
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
