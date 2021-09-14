<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'client_name',
        'client_impot',
        'client_idnat',
        'address',
        'phone',
        'email',
        'activity',
    ];

}
