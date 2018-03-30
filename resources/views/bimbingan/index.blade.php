@extends('layouts._dashboard')

@section('dash-content')
<style>
    .mt-20{
            margin-top: 20px;
    }
</style>
<a href="{{ route('bimbingan.create') }}">
    <button class="btn btn-primary mt-20">Create</button>
</a>
<table class="table table-sm mt-20">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">Oleh</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bimbingans as $bimbingan)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $bimbingan->title }}</td>
            <td>{{ $bimbingan->mahasiswa->name }}</td>
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