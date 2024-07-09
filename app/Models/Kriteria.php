<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'label',
        'bobot',
        'flag',
    ];

    // Tambahkan relasi atau method lain sesuai kebutuhan
}