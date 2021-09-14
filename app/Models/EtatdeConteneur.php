<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatdeConteneur extends Model
{
    use HasFactory;

    protected $fillable = [
        'etat_conteneur_id',
        'etat_conteneur_name',
    ];
}
