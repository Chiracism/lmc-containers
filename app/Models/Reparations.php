<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparations extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_conteneur',
        'date_derniere_reparation',
        'type_conteneur_id',
        'taille_conteneur_id',
        'proprietaire_id',
        // 'proprietaire_name',
        // 'pays_id',
        'pays_name',
        // 'taux_id',
        'taux_name',
        'heure',
        'materiel_id',
        'total',
        'numero_recu',
        'societe_reparation',
        'societe_location',
        'site_id',
        // 'site_name',
        'date_derniere_inspection',
        'societe',
    ];
}
