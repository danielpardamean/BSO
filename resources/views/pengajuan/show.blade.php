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
    .dosen-avatar{
        margin: 10px;
        width: 40px;
        height: 40px;
    }
</style>
@if(!auth('mahasiswa')->check() AND (auth('pegawai')->user()->nip == $pengajuan->nip))
<a class="btn btn-sm btn-primary margin-top" href="{{ route('koreksi.create', $pengajuan->id) }}">
    Buat Koreksi
</a>
@endif
<div class="card margin-top">
   <div class="card-header">
        <h5>
            Pengajuan : {{ $pengajuan->title }}
        </h5>
   </div>
   @foreach($pengajuan->koreksi as $koreksi)
   <div class="row">
    <div class="col-8">
        <div class="card-body">
            <blockquote class="blockquote text-left card-title">
                <p class="mb-0">{{ $koreksi->information }}</p>
                <footer class="blockquote-footer">{{ $koreksi->created_at->diffForHumans() }}</footer>
            </blockquote>
            <img src="{{ Storage::url($koreksi->dosen->profile_picture) }}" data-toggle="tooltip" data-placement="bottom" title ="{{ $koreksi->dosen->name }} ({{ $koreksi->dosen->nip }})" class="img-thumbnail rounded-circle dosen-avatar">
            <p class="card-text">Document : {{ $koreksi->document }}</p>
        </div>
   </div>
   <div class="col-4 padding-col">
        <div class="container h-100">
            <div class="row h-100 align-items-end justify-content-end">
                <a href="{{ route('koreksi.download', explode('/', $koreksi->document)[2]) }}" class="btn btn-sm btn-primary btn-margin-5">Download</a>
                <form action="{{ route('koreksi.destroy', $koreksi->id) }}" method="POST" class="form-display-inline">
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