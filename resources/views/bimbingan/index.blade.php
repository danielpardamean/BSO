@extends('layouts._dashboard')

@section('dash-content')
<style>
    .mt-20{
            margin-top: 20px;
    }
    .form-display-inline{
        display: inline-block !important;
    }
</style>
@if(auth('pegawai')->check() AND auth('pegawai')->user()->tipe->name == 'admin')
<a href="{{ route('bimbingan.create') }}">
    <button class="btn btn-primary mt-20">Create</button>
</a>
@endif
<table class="table table-sm mt-20">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">Oleh</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bimbingans as $bimbingan)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $bimbingan->title }}</td>
            <td>{{ $bimbingan->mahasiswa->name }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('bimbingan.show', $bimbingan->id) }}">
                    View
                </a>
                @if(auth('pegawai')->check() AND auth('pegawai')->user()->tipe == 'admin')
                <a class="btn btn-warning btn-sm" href="{{ route('bimbingan.edit', $bimbingan->id) }}">
                    Edit
                </a>
                <form action="{{ route('bimbingan.destroy', $bimbingan->id) }}" method="POST" class="form-display-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            {{ $bimbingans->links() }}
        </div>
    </div>
</div>
@endsection