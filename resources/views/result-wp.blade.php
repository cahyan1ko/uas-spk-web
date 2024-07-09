@php
$title = 'Result WP';
@endphp
@extends('layout.main')
@section('container')
<div class="container mt-4">
    <h3>Hasil Perhitungan WP</h3>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive mt-4">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col" class="text-left">Nama Alternatif</th>
                    <th scope="col">Preferensi</th>
                    <th scope="col">Nilai V</th>
                    <th scope="col">Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($hasil as $item)
                <tr style="background-color: {{ $item->v_value == $hasil->max('v_value') ? '#FFBD00' : 'white' }}">
                    <th scope="row" class="text-center">{{ $no++ }}</th>
                    <td>{{ $item->alternatif->nama }}</td>
                    <td>{{ $item->preferensi }}</td>
                    <td>{{ $item->v_value }}</td>
                    <td>{{ $item->created_at->format('d M Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection