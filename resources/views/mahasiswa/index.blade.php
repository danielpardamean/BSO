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
        <th scope="col">Nim</th>
        <th scope="col">Nama</th>
        <th scope="col">Program Studi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswas as $mahasiswa)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->name }}</td>
            <td>{{ $mahasiswa->programStudi->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            {{ $mahasiswas->links() }}
        </div>
    </div>
</div>
@endsection