<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
 

use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    use HasFactory;

    protected $table = 'minuman';

    protected $fillable = [
        'nama',
        'jenis',
        'rasa',
        'rating',
    ];

    public function rekomendasi()
    {
        return $this->hasMany(Recomendation::class);
    }
}
