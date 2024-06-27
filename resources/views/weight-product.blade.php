@php
$title = 'Weight Product';
@endphp
@extends('layout.main')
@section('container')
<div class="container mt-4">
    <h3>{{ $title }}</h3><br>
    <div class="border p-4 mb-4">
        <h4>Deskripsi</h4>
        <p>
            Weight Product adalah salah satu metode dalam Sistem Pendukung Keputusan (SPK) yang digunakan untuk membantu dalam pengambilan keputusan yang kompleks. Metode ini menggunakan konsep pembobotan untuk mengevaluasi dan membandingkan berbagai alternatif berdasarkan beberapa kriteria. Setiap kriteria diberikan bobot sesuai dengan tingkat kepentingannya, dan hasilnya dihitung untuk menentukan alternatif terbaik.
        </p>
        <p><strong>
                Keunggulan metode Weight Product meliputi:
            </strong></p>
        <ul>
            <li>Mempertimbangkan berbagai kriteria secara bersamaan</li>
            <li>Mudah diterapkan dan dipahami</li>
            <li>Fleksibel dalam menentukan bobot kriteria</li>
            <li>Dapat digunakan dalam berbagai bidang aplikasi</li>
        </ul>
    </div>
    <div class="border p-4">
        <h4>Cara Penggunaan</h4>
        <ol>
            <li>Identifikasi kriteria yang relevan untuk keputusan yang akan diambil.</li>
            <li>Berikan bobot untuk setiap kriteria berdasarkan tingkat kepentingannya. Pastikan total bobot keseluruhan adalah 1 atau 100%.</li>
            <li>Evaluasi setiap alternatif berdasarkan setiap kriteria dan tentukan nilai untuk masing-masing.</li>
            <li>Kalikan nilai setiap kriteria dengan bobotnya untuk masing-masing alternatif.</li>
            <li>Jumlahkan hasil perkalian tersebut untuk mendapatkan skor total setiap alternatif.</li>
            <li>Alternatif dengan skor total tertinggi dianggap sebagai pilihan terbaik.</li>
        </ol>
        <p><strong>
                Contoh penggunaan:
            </strong></p>
        <p>
            Misalkan Anda ingin membeli sebuah Guitar dan mempertimbangkan kriteria seperti harga, material, kenyamanan bermain dan berat. Anda bisa memberikan bobot 0.3 untuk harga, 0.3 untuk material, 0.2 untuk kenyamanan bermain dan 0.2 untuk berat. Setelah mengevaluasi beberapa alternatif, Anda mengalikan nilai setiap kriteria dengan bobotnya dan menjumlahkan hasilnya untuk mendapatkan skor akhir.
        </p>
    </div>
</div>
@endsection