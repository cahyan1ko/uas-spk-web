<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all(); // Mengambil semua data dari tabel kriteria
        return view('admin/setting', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'bobot' => 'required|numeric',
            'flag' => 'required|string|max:255',
        ]);

        // Simpan data ke dalam database
        Kriteria::create([
            'nama' => $request->nama,
            'label' => $request->label,
            'bobot' => $request->bobot,
            'flag' => $request->flag,
        ]);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id); // Cari kriteria berdasarkan ID
        return view('admin.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'bobot' => 'required|numeric',
            'flag' => 'required|string|max:255',
        ]);

        // Temukan data kriteria berdasarkan ID dan update
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->nama = $request->nama;
        $kriteria->label = $request->label;
        $kriteria->bobot = $request->bobot;
        $kriteria->flag = $request->flag;
        $kriteria->save();

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria berhasil dihapus');
    }
}
