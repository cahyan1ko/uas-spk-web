@php
$title = 'Profile';
@endphp
@extends('layout.main')
@section('container')

<div class="container profile-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header profile-header">
                    <h2>Profil Pengguna</h2>
                </div>
                <div class="card-body text-center">
                    <h4>{{ $user->name }}</h4>
                    <p>Email: {{ $user->email }}</p>
                    <p>Level: {{ $user->level === 'admin' ? 'Admin' : 'User' }}</p>
                    <a href="/edit-profile" class="btn" style="background-color: #390099; color: white;">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection