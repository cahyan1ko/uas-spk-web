@php
$title = 'Admin Setting';
@endphp

@extends('layout.main')

@section('container')
<div class="container mt-4">
    <h3>{{ $title }}</h3><br>

    <!-- Form untuk menambah kriteria -->
    <form method="POST" action="{{ route('kriteria.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kriteria</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Label Kriteria</label>
            <select class="form-control selectpicker" id="label" name="label" required>
                <option value="">Pilih Label</option>
                <option value="Cost">Cost</option>
                <option value="Benefit">Benefit</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="bobot" class="form-label">Bobot Kriteria</label>
            <select class="form-control selectpicker" id="bobot" name="bobot" required>
                <option value="">Pilih Bobot</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="flag" class="form-label">Flag</label>
            <select class="form-control selectpicker" id="flag" name="flag" required>
                <option value="">Pilih Flag</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
                <option value="C3">C3</option>
                <option value="C4">C4</option>
            </select>
        </div>
        <button type="submit" class="btn" style="background-color: #390099; color: white;">Tambah Kriteria</button>
    </form>


    <hr>

    <div class="table-responsive mt-5">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="text-align: left;">Nama Kriteria</th>
                    <th scope="col">Label</th>
                    <th scope="col">Bobot</th>
                    <th scope="col">Flag</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($kriteria as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td style="text-align: left;">{{ $item->nama }}</td>
                    <td>{{ $item->label }}</td>
                    <td>{{ $item->bobot }}</td>
                    <td>{{ $item->flag }}</td>
                    <td class="align-middle">
                        <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-sm mx-1" style="background-color: #390099; color: white;">Edit</a>
                        <form id="delete-form-{{ $item->id }}" action="{{ route('kriteria.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm mx-1" onclick="deleteKriteria({{ $item->id }})" style="background-color: #FF0054; color: white;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
