@extends('layout.main')
@section('container')

<div class="w-50 center border rounded px-3 py3 mx-auto my-4">
    <h2 class="text-center">JV Music Compare | {{ $title }}</h2>
    <form action="/sesi/create" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="{{ Session::get('name') }}" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn btn-primary">Daftar & Masuk</button>
        </div>
        <div class="mb-3 d-grid">
            <a href="/" class="btn btn-primary">Sudah memiliki akun? Login</a>
        </div>
    </form>
</div>

@endsection