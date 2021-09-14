<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvements extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_conteneur',
        'site',
        'sous_site',
        'date_mouvement',
        'ex_navire',
        'date_arrivee',
        'port',
        'client',
        'etat_conteneur',
        'type_conteneur',
        'size',
        'nombre_conteneur',
        'observation',
    ];
}
