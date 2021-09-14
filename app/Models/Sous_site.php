<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_site extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'sous_site_name',
    ];
   
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
