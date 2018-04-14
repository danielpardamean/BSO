@extends('layouts._dashboard')
@section('dash-content')
<style>
    .btn-margin-5{
        margin: 8px;
        margin-left: 0px;
    }
    .margin-top{
        margin-top: 15px;
    }
</style>
<a class="btn btn-sm btn-primary margin-top" href="{{ route('pengajuan.create', $bimbingan->id) }}">
    Buat Pengajuan
</a>
<div class="card margin-top">
   <div class="card-header">
        <h5>
            {{ $bimbingan->title }}
            <small class="text-muted">Oleh {{ $bimbingan->mahasiswa->name }} - {{ $bimbingan->mahasiswa->nim }}</small>
        </h5>
   </div>
   @foreach($bimbingan->pengajuan as $pengajuan)
   <div class="row">
    <div class="col-8">
        <div class="card-body">
            <blockquote class="blockquote text-left card-title">
                <p class="mb-0">{{ $pengajuan->title }}</p>
                <footer class="blockquote-footer">Dibuat {{ $pengajuan->created_at->diffForHumans() }}</footer>
            </blockquote>
            <p class="card-text">Document : {{ $pengajuan->document }}</p>
        </div>
   </div>
   <div class="col-4 padding-col">
        <div class="container h-100">
            <div class="row h-100 align-items-end justify-content-end">
                <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="btn btn-sm btn-primary btn-margin-5">View</a>
                <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST" class="form-display-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm btn-danger btn-margin-5">Hapus</button>
                </form>
            </div>
        </div>
   </div>
   </div>
   @endforeach
</div>
@endsection