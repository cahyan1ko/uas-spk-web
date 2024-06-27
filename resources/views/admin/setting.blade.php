@php
$title = 'Admin Setting';
@endphp
@extends('layout.main')
@section('container')
<div class="container mt-4">
    <h3>{{ $title }}</h3><br>
    <form action="">
        <div class="mb-3">
            <label for="-create-kriteria" class="form-label">Kriteria</label>
            <input type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kriteria</button>
    </form>

    <form action="">
        <table class="table mt-5 text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kriteria</th>
                    <th scope="col">Bobot</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Kriteria</td>
                    <td>Bobot</td>
                    <td class="align-middle">
                        <button class="btn btn-primary btn-sm mx-1">Edit</button>
                        <button class="btn btn-primary btn-sm mx-1">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection