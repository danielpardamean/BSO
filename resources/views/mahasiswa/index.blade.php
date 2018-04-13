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
<a href="{{ route('mahasiswa.create') }}">
    <button class="btn btn-primary mt-20">Create</button>
</a>
<table class="table table-sm mt-20">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nim</th>
        <th scope="col">Nama</th>
        <th scope="col">Program Studi</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswas as $mahasiswa)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->name }}</td>
            <td>{{ $mahasiswa->programStudi->name }}</td>
            <td>
                <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}">
                    <button class="btn btn-warning btn-sm">Edit</button>
                </a>
                <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" method="POST" class="form-display-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
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