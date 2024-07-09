<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class DataController extends Controller
{
    public function truncateTables()
    {
        try {
            // Disable foreign key checks
            DB::unprepared('SET FOREIGN_KEY_CHECKS=0;');

            // Truncate tables
            DB::table('nilai')->truncate();
            DB::table('alternatif')->truncate();
            DB::table('hasil')->truncate();

            // Enable foreign key checks
            DB::unprepared('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('entry.value')->with('success', 'Semua data berhasil di-reset.');
        } catch (QueryException $e) {
            // Rollback hanya jika ada kesalahan yang tidak terkait dengan truncate
            if (strpos($e->getMessage(), 'TRUNCATE command denied to user') === false) {
                DB::rollBack();
            }

            return redirect()->route('entry.value')->with('error', 'Gagal melakukan reset data: ' . $e->getMessage());
        }
    }





    public function showEntryValue()
    {
        // Ambil semua nilai dari database
        $nilais = Nilai::all();

        // Kirim data ke tampilan
        return view('entry-value', compact('nilais'));
    }

    public function saveDataToMerekTable(Request $request)
    {
        $nama = $request->input('nama');

        try {
            DB::beginTransaction();

            $alternatif = new Alternatif();
            $alternatif->nama = $nama;
            $alternatif->save();

            $alt_id = $alternatif->id;

            DB::commit();
            
            return $alt_id;
        } catch (\Exception $e) {
            DB::rollback();
            return -1; // Atau respons error yang sesuai
        }
    }

    public function saveDataToNilaiTable(Request $request)
    {
        $alt_id = $request->input('alt_id');
        $harga = $request->input('harga');
        $material = $request->input('material');
        $kenyamananBermain = $request->input('kenyamanan_bermain');
        $berat = $request->input('berat');

        try {
            DB::beginTransaction();

            $nilai = new Nilai();
            $nilai->alt_id = $alt_id;
            $nilai->c1 = $harga;
            $nilai->c2 = $material;
            $nilai->c3 = $kenyamananBermain;
            $nilai->c4 = $berat;
            $nilai->save();

            // Commit transaksi jika berhasil
            DB::commit();

            return redirect()->route('entry.value')->with('success', 'Data nilai berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('entry.value')->with('error', 'Gagal menyimpan Nilai');
        }
    }

    public function store(Request $request)
    {
        try {
            $alt_id = $this->saveDataToMerekTable($request);
    
            if ($alt_id != -1) {
                $request->merge(['alt_id' => $alt_id]);
                $success = $this->saveDataToNilaiTable($request);
    
                if ($success) {
                    $nilais = Nilai::with('alternatif')->get();
                    return redirect()->route('entry.value')->with('success', 'Data nilai berhasil disimpan');
                } else {
                    return redirect()->route('entry.value')->with('error', 'Gagal menyimpan data nilai');
                }
            } else {
                return redirect()->route('entry.value')->with('error', 'Gagal menyimpan data merek');
            }
        } catch (\Exception $e) {
            return redirect()->route('entry.value')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('edit-data-alternatif', compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'c1' => 'required|numeric',
            'c2' => 'required|numeric',
            'c3' => 'required|numeric',
            'c4' => 'required|numeric',
        ]);

        $nilai->c1 = $request->input('c1');
        $nilai->c2 = $request->input('c2');
        $nilai->c3 = $request->input('c3');
        $nilai->c4 = $request->input('c4');
        $nilai->save();

        $alternatif = $nilai->alternatif;
        $alternatif->nama = $request->input('nama');
        $alternatif->save();

        return redirect()->route('entry.value')->with('success', 'Data alternatif berhasil diperbarui');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $nilai = Nilai::findOrFail($id);
            $alt_id = $nilai->alt_id;

            // Hapus nilai terlebih dahulu
            $nilai->delete();

            $countNilai = Nilai::where('alt_id', $alt_id)->count();

            if ($countNilai === 0) {
                $alternatif = Alternatif::findOrFail($alt_id);
                $alternatif->delete();
            }

            DB::commit();

            return redirect()->route('entry.value')->with('success', 'Data alternatif berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('entry.value')->with('error', 'Gagal menghapus data alternatif: ' . $e->getMessage());
        }
    }

}