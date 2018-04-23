@extends('layouts._dashboard')

@section('dash-content')
<style>
    .profile-img{
        width: 300px;
        height: 300px;
    }
</style>

<div class="container h-100 d-flex justify-content-center">
    <div class="jumbotron my-auto">
        <div class="text-center">
            <img src="{{ Storage::url($user->profile_picture) }}" class="rounded profile-img">
        </div>
        <div class="text-center">
            <h4>{{ $user->name }}</h4>
        </div>
        <div class="text-center">
            <h6>{{ $user->nip }}</h6>
        </div>
        <div class="text-center">
            <a href="">
                <button class="btn btn-primary btn-sm">
                    Ganti Foto Profil
                </button>
            </a>
            <a href="{{ route('profile.password') }}">
                <button class="btn btn-warning btn-sm">
                    Ganti Password
                </button>
            </a>
        </div>
    </div>
</div>
@endsection