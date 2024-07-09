<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::create([
            'nama' => 'Harga',
            'label' => 'Cost',
            'bobot' => '5',
            'flag' => 'C1',
        ]);

        Kriteria::create([
            'nama' => 'Material',
            'label' => 'Benefit',
            'bobot' => '3',
            'flag' => 'C2',
        ]);

        Kriteria::create([
            'nama' => 'Kenyamanan Bermain',
            'label' => 'Benefit',
            'bobot' => '5',
            'flag' => 'C3',
        ]);

        Kriteria::create([
            'nama' => 'Berat',
            'label' => 'Cost',
            'bobot' => '3',
            'flag' => 'C4',
        ]);

    }
}
