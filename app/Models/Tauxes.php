<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tauxes extends Model
{
    use HasFactory;
    protected $fillable = [
        'taux_id',
        'taux_name',
    ];
}
