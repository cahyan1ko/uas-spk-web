@php
$title = 'Home';
@endphp

@extends('layout.main')
@section('container')

<div class="container mt-4">
    <h3>Selamat datang, {{ Auth::user()->name }}! </h3><br>
</div>

@endsection