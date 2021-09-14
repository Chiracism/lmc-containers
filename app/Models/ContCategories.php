<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_conteneur_id',
        'type_conteneur_name',
    ];
}
