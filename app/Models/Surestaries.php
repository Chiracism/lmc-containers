<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surestaries extends Model
{
    use HasFactory;
    protected $fillable = [
        'surestarie_date',
        'numero_conteneur',
        'ex_navire',
        'date_arrivee',
        'client_name',
        'port_name',
        'size_name',
        'nombre',
        'restitution_date',
        'caution_versee',
        'nls',
        'ls_date',
        'choix_type',
        'detention',
        'surestarie_duree',
        'surestaries_duree',
        'frais',
        'facturer',
        'rembourser',
        'total',
    ];
}
