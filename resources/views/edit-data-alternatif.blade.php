@php
$title = 'Edit Alternatif';
@endphp
@extends('layout.main')
@section('container')

<form method="POST" action="{{ route('update.data.alternatif', ['id' => $nilai->id]) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Alternatif</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $nilai->alternatif->nama }}">
    </div>
    <div class="mb-3">
        <label for="c1" class="form-label">Harga</label>
        <input type="text" class="form-control" id="c1" name="c1" value="{{ intval($nilai->c1) }}">
    </div>
    <div class="mb-3">
        <label for="c2" class="form-label">Material</label>
        <input type="text" class="form-control" id="c2" name="c2" value="{{ intval($nilai->c2) }}">
    </div>
    <div class="mb-3">
        <label for="c3" class="form-label">Kenyamanan Bermain</label>
        <input type="text" class="form-control" id="c3" name="c3" value="{{ intval($nilai->c3) }}">
    </div>
    <div class="mb-3">
        <label for="c4" class="form-label">Berat</label>
        <input type="text" class="form-control" id="c4" name="c4" value="{{ $nilai->c4 }}">
    </div>
    <button type="submit" class="btn" style="background-color: #390099; color: white;">Simpan Perubahan</button>
    <a href="{{ url('/entry-value') }}" class="btn btn-secondary">Batal</a>
</form>

@endsection