<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiels extends Model
{
    use HasFactory;
    protected $fillable = [
        'materiel_id',
        'materiel_name',
        'montant',
    ];
}
