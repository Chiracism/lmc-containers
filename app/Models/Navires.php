<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navires extends Model
{
    use HasFactory;
    protected $fillable = [
        'navire_id',
        'navire_name',
    ];
}
