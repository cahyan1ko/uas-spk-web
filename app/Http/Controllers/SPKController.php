<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Nilai;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SPKController extends Controller
{
    public function wp(Request $request)
    {
        try {
            Hasil::truncate();

            $nilais = Nilai::all();

            if ($nilais->count() > 0) {
                foreach ($nilais as $nilai) {
                    $c1 = (double) $nilai->c1;
                    $c2 = (double) $nilai->c2;
                    $c3 = (double) $nilai->c3;
                    $c4 = (double) $nilai->c4;

                    $nc1 = $this->norm("c1");
                    $nc2 = $this->norm("c2");
                    $nc3 = $this->norm("c3");
                    $nc4 = $this->norm("c4");

                    $pv1 = $this->label("c1") === "Cost" ? pow($c1, -$nc1) : pow($c1, $nc1);
                    $pv2 = $this->label("c2") === "Cost" ? pow($c2, -$nc2) : pow($c2, $nc2);
                    $pv3 = $this->label("c3") === "Cost" ? pow($c3, -$nc3) : pow($c3, $nc3);
                    $pv4 = $this->label("c4") === "Cost" ? pow($c4, -$nc4) : pow($c4, $nc4);

                    $hasil = $pv1 * $pv2 * $pv3 * $pv4;

                    $this->savePref($nilai->alt_id, $hasil);
                }

                return redirect('/result-wp')->with('success', 'Perhitungan WP berhasil dilakukan');
            } else {
                return redirect()->back()->with('error', 'Tidak ada data nilai yang ditemukan');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat perhitungan WP: ' . $e->getMessage());
        }
    }

    private function norm($kriteria)
    {
        try {
            $jumlah = Kriteria::sum('bobot');

            $bobot = Kriteria::where('flag', $kriteria)->value('bobot');

            $norm = $bobot / $jumlah;

            return $norm;
        } catch (\Exception $e) {
            throw new \Exception('Gagal melakukan normalisasi bobot: ' . $e->getMessage());
        }
    }

    private function label($kolom)
    {
        try {
            $label = Kriteria::where('flag', $kolom)->value('label');

            return $label;
        } catch (\Exception $e) {
            throw new \Exception('Gagal mendapatkan label kriteria: ' . $e->getMessage());
        }
    }

    private function savePref($alt_id, $hasil)
    {
        try {
            $pref = new Hasil();
            $pref->alt_id = $alt_id;
            $pref->preferensi = $hasil;
            $pref->save();
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan preferensi: ' . $e->getMessage());
        }
    }

    public function showHasilWP()
    {
        try {
            $hasil = Hasil::all();

            if ($hasil->isEmpty()) {
                return redirect()->back()->with('error', 'Belum ada hasil perhitungan yang tersedia.');
            }

            $sum = $hasil->sum('preferensi');

            if ($sum == 0) {
                return redirect()->back()->with('error', 'Tidak dapat melakukan normalisasi karena total preferensi adalah nol.');
            }
            $hasil->transform(function ($item, $key) use ($sum) {
                $v = $item->preferensi / $sum;
                $item->v_value = $v;

                return $item;
            });
            return view('result-wp', compact('hasil'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menampilkan hasil WP: ' . $e->getMessage());
        }
    }
}
