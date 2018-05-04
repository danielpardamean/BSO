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
@if(auth('mahasiswa')->check())
<a class="btn btn-sm btn-primary margin-top" href="{{ route('pengajuan.create', $bimbingan->id) }}">
    Buat Pengajuan
</a>
@endif
<div class="card margin-top">
   <div class="card-header">
        <h5>
            Judul Bimbingan : {{ $bimbingan->title }}
        </h5>
   </div>
   <style>
        .dosen-avatar{
            margin: 10px;
            width: 40px;
            height: 40px;
        }
   </style>
   <div class="row">
        <div class="col">
                <img src="{{ Storage::url($bimbingan->mahasiswa->profile_picture) }}" data-toggle="tooltip" data-placement="bottom" title ="{{ $bimbingan->mahasiswa->name }} ({{ $bimbingan->mahasiswa->nim }})" class="img-thumbnail rounded-circle dosen-avatar">
        </div>
        <div class="col d-flex justify-content-end">
            @foreach ($bimbingan->mahasiswa->pembimbing as $pembimbing)
                <img src="{{ Storage::url($pembimbing->profile_picture) }}" data-toggle="tooltip" data-placement="bottom" title ="{{ $pembimbing->name }} ({{ $pembimbing->nip }})" class="img-thumbnail rounded-circle dosen-avatar">
            @endforeach
        </div>
   </div>
   @foreach($bimbingan->pengajuan as $pengajuan)
   <div class="row">
    <div class="col-8">
        <div class="card-body">
            <blockquote class="blockquote text-left card-title">
                <p class="mb-0">{{ $pengajuan->title }}</p>
                @if(auth('pegawai')->check() AND auth('pegawai')->user()->nip == $pengajuan->nip)
                <footer class="blockquote-footer">Untuk Anda</footer>
                @else
                <footer class="blockquote-footer">Untuk {{ $pengajuan->dosen->name }} ({{ $pengajuan->dosen->nip }})</footer>
                @endif
                <footer class="blockquote-footer">{{ $pengajuan->created_at->diffForHumans() }}</footer>
            </blockquote>
            <p class="card-text">Document : {{ $pengajuan->document }}</p>
        </div>
   </div>
   <div class="col-4 padding-col">
        <div class="container h-100">
            <div class="row h-100 align-items-end justify-content-end">
                <a href="{{ route('pengajuan.download', explode('/', $pengajuan->document)[2]) }}" class="btn btn-sm btn-success btn-margin-5">Download</a>
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