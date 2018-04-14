@extends('layouts._dashboard')
@section('dash-content')
<style>
   .error {
    color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('bimbingan.update', $bimbingan->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
         <div class="form-group">
            <label for="NIM">NIM</label>
            <select disabled class="form-control mahasiswa" id="NIM" name="nim">
                <option value="">---</option>
               @foreach ($mahasiswas as $mahasiswa)
                <option value="{{ $mahasiswa->nim }}" {{ $bimbingan->nim == $mahasiswa->nim ? "selected" : "" }}>{{ $mahasiswa->nim }} - {{ $mahasiswa->name }}</option>
               @endforeach
            </select>
            @if($errors->has('nim'))
               <small class="form-text text-muted error">{{ $errors->first('nim') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" id="Title" name="title" value="{{ $bimbingan->title }}">
            @if($errors->has('title'))
               <small class="form-text text-muted error">{{ $errors->first('title') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="datepicker">Tanggal Mulai Bimbingan</label>
            <input type="text" class="form-control datepicker" id="datepicker" value="{{ date('d/m/Y', strtotime($bimbingan->tanggal_mulai_bimbingan)) }}">
            <input type="hidden" id="tanggal_mulai_bimbingan" name="tanggal_mulai_bimbingan" value="{{ $bimbingan->tanggal_mulai_bimbingan }}">
            @if($errors->has('tanggal_mulai_bimbingan'))
               <small class="form-text text-muted error">{{ $errors->first('tanggal_mulai_bimbingan') }}</small>
            @endif
         </div>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment.min.js"></script>
         <script>
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy'
            })
            .on('changeDate', function(e){
                $('#tanggal_mulai_bimbingan').val(moment(e.date).format("Y-MM-DD"));
            });
         </script>
         @php
            $pembimbing = collect($bimbingan->mahasiswa->pembimbing)->pluck("nip")->toArray();
        @endphp
         <div class="form-group">
            <label for="Pembimbing">Pembimbing</label>
            <select class="form-control pembimbing" id="Pembimbing" name="pembimbing[]" multiple="multiple">
               @foreach ($dosens as $dosen)
               <option value="{{ $dosen->nip }}" {{ in_array($dosen->nip, $pembimbing) ? "selected" : "" }}>{{ $dosen->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="Dokument">Dokumen</label>
            <input type="file" class="form-control-file" id="Dokument" name="dokumen">
            @if($errors->has('dokumen'))
               <small class="form-text text-muted error">{{ $errors->first('dokumen') }}</small>
            @endif
         </div>
         <div class="form-group row">
            <div class="col-sm-6">
               <button type="submit" class="btn btn-primary">Save</button>
            </div>
         </div>
      </form>
   </div>
</div>
<script>
$(document).ready(function() {
    $('.pembimbing').select2();
    $('.mahasiswa').select2();
});
</script>
@endsection