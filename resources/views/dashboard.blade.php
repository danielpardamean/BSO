@extends('layouts._dashboard')

@section('dash-content')
    <div class="container">
        <div class="row">
            <div class="col">
            @php
                $user = auth('mahasiswa')->check() ? auth('mahasiswa')->user()  : auth('pegawai')->user();
            @endphp
                <h3>Selamat Datang {{ $user->name }}</h3>
            </div>
        </div>
    </div>
@endsection