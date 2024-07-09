@php
$title = 'Entry Value';
@endphp
@extends('layout.main')
@section('container')
<div class="container mt-4">
    <h3>{{ $title }}</h3><br>
    <form method="POST" action="{{ route('tambah.data') }}">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Merk</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga">
        </div>
        <div class="mb-3">
            <label for="material" class="form-label">Material</label>
            <select class="form-select form-control" id="material" name="material">
                <option value="">Pilih Material</option>
                <option value="1">1 (Brazilian Rosewood)</option>
                <option value="2">2 (Honduran Mahogany)</option>
                <option value="3">3 (Maple)</option>
                <option value="4">4 (Indian Rosewood)</option>
                <option value="5">5 (Alder)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="kenyamanan_bermain" class="form-label">Kenyamanan Bermain</label>
            <select class="form-select form-control" id="kenyamanan_bermain" name="kenyamanan_bermain">
                <option value="">Pilih Tingkat Kenyamanan</option>
                <option value="1">1 (Neck Tidak Nyaman, Senar Tinggi)</option>
                <option value="2">2 (Neck Bagus, Senar Tinggi)</option>
                <option value="3">3 (Body Ringan, Neck Bagus, Senar Tinggi)</option>
                <option value="4">4 (Body Berat, Neck Bagus, Senar Rendah)</option>
                <option value="5">5 (Neck Bagus, Senar Rendah)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="berat" class="form-label">Berat</label>
            <select class="form-select form-control" id="berat" name="berat">
                <option value="">Pilih Berat</option>
                <option value="1.0">1.0 (Sangat Ringan)</option>
                <option value="1.5">1.5 (Ringan)</option>
                <option value="2.0">2.0 (Cukup Berat)</option>
                <option value="2.5">2.5 (Berat)</option>
                <option value="3.0">3.0 (Sangat Berat)</option>
                <option value="3.5">3.5 (Ekstra Berat)</option>
            </select>
        </div>
        <button type="submit" class="btn" id="tambahButton" style="background-color: #390099; color: white;">Tambah</button>
    </form>

    <div class="mb-1 mt-4">
        <form id="truncate-form" action="{{ route('hapus-tabel') }}" method="POST">
            @csrf
            <button type="button" class="btn btn-danger" onclick="confirmTruncate()">Reset Semua Data</button>
        </form>
    </div>  

    <form method="POST" action="{{ route('hitung.wp') }}" class="table-value">
        @csrf
        <table class="table mt-5">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col" class="text-left">Merk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Material</th>
                    <th scope="col">Kenyamanan Bermain</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($nilais as $nilai)
                <tr>
                    <th scope="row" class="text-center">{{ $no++ }}</th>
                    <td>{{ $nilai->alternatif->nama }}</td>
                    <td class="text-center">{{ intval($nilai->c1) }}</td>
                    <td class="text-center">{{ intval($nilai->c2) }}</td>
                    <td class="text-center">{{ intval($nilai->c3) }}</td>
                    <td class="text-center">{{ $nilai->c4 }}</td>
                    <td class="text-center">
                        <a href="{{ route('edit.data.alternatif', ['id' => $nilai->id]) }}" class="btn btn-sm" style="background-color: #390099; color: white;">Edit</a>
                        <form id="delete-form-{{ $nilai->id }}" action="{{ route('hapus.data.alternatif', ['id' => $nilai->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="button" class="btn btn-sm" style="background-color: #FF0054; color: white;" onclick="document.getElementById('delete-form-{{ $nilai->id }}').submit();">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn" style="background-color: #390099; color: white;">Hitung</button>
    </form>
    

</div>

    <script>
        function confirmTruncate() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Semua data akan dihapus dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus semua data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('truncate-form').submit();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const tambahButton = document.getElementById('tambahButton');
            const nilaiTable = document.getElementById('nilaiTable').getElementsByTagName('tbody')[0];

            function checkRowCount() {
                const rowCount = nilaiTable.rows.length;
                if (rowCount >= 4) {
                    tambahButton.disabled = true;
                } else {
                    tambahButton.disabled = false;
                }
            }
            checkRowCount();
            document.getElementById('tambahForm').addEventListener('submit', function(event) {
                setTimeout(checkRowCount, 500);
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                showConfirmButton: true,
                timer: 3000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: '{{ session('error') }}',
                showConfirmButton: true,
                timer: 3000
            });
        </script>
    @endif
@endsection