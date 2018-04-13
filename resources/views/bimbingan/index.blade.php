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
<a href="{{ route('bimbingan.create') }}">
    <button class="btn btn-primary mt-20">Create</button>
</a>
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
                <a href="{{ route('bimbingan.show', $bimbingan->id) }}">
                    <button class="btn btn-sm">View</button>
                </a>
                <a href="{{ route('bimbingan.edit', $bimbingan->id) }}">
                    <button class="btn btn-warning btn-sm">Edit</button>
                </a>
                <form action="{{ route('bimbingan.destroy', $bimbingan->id) }}" method="POST" class="form-display-inline">
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
            {{ $bimbingans->links() }}
        </div>
    </div>
</div>
@endsection