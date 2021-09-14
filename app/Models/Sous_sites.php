<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_sites extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'sous_site_id',
        'sous_site_name',
    ];
}
