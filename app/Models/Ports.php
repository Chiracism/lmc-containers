<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ports extends Model
{
    use HasFactory;
    protected $fillable = [
        'port_id',
        'port_name',
    ];
}
