<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable = [
        'alt_id',
        'c1',
        'c2', 
        'c3',
        'c4',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alt_id', 'id');
    }
}