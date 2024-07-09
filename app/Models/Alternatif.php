<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatif';

    protected $fillable = [
        'nama',
    ];

    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'alt_id', 'id');
    }
}