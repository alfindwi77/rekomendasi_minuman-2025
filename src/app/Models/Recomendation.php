<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendation extends Model
{
    use HasFactory;

    protected $table = 'recomendations';

    protected $fillable = [
        'user_id',
        'minuman_id',
        'skor_relevansi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function minuman()
    {
        return $this->belongsTo(Minuman::class);
    }
}
