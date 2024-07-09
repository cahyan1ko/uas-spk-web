@php
$title = 'Edit Kriteria';
@endphp

@extends('layout.main')

@section('container')
<div class="container mt-4">
    <h3>Edit Kriteria</h3><br>

    <form method="POST" action="{{ route('kriteria.update', $kriteria->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kriteria</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kriteria->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Label Kriteria</label>
            <select class="form-control selectpicker" id="label" name="label" required>
                <option value="Cost" {{ $kriteria->label == 'Cost' ? 'selected' : '' }}>Cost</option>
                <option value="Benefit" {{ $kriteria->label == 'Benefit' ? 'selected' : '' }}>Benefit</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="bobot" class="form-label">Bobot Kriteria</label>
            <select class="form-control selectpicker" id="bobot" name="bobot" required>
                <option value="1" {{ $kriteria->bobot == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ $kriteria->bobot == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ $kriteria->bobot == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ $kriteria->bobot == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ $kriteria->bobot == '5' ? 'selected' : '' }}>5</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="flag" class="form-label">Flag</label>
            <select class="form-control selectpicker" id="flag" name="flag" required>
                <option value="C1" {{ $kriteria->flag == 'C1' ? 'selected' : '' }}>C1</option>
                <option value="C2" {{ $kriteria->flag == 'C2' ? 'selected' : '' }}>C2</option>
                <option value="C3" {{ $kriteria->flag == 'C3' ? 'selected' : '' }}>C3</option>
                <option value="C4" {{ $kriteria->flag == 'C4' ? 'selected' : '' }}>C4</option>
            </select>
        </div>
        <button type="submit" class="btn" style="background-color: #390099; color: white;">Simpan Perubahan</button>
    </form>

</div>
@endsection