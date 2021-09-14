<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'site_name',
    ];
    public function sous_site()
    {
        return $this->hasMany(Sous_sites::class);
    }
}
