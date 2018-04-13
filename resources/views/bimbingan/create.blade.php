@extends('layouts._dashboard')
@section('dash-content')
<style>
   .error {
    color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('bimbingan.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
         <div class="form-group">
            <label for="NIM">NIM</label>
            <select class="form-control mahasiswa" id="NIM" name="nim">
                <option value="">---</option>
               @foreach ($mahasiswas as $mahasiswa)
                <option value="{{ $mahasiswa->nim }}">{{ $mahasiswa->nim }} - {{ $mahasiswa->name }}</option>
               @endforeach
            </select>
            @if($errors->has('nim'))
               <small class="form-text text-muted error">{{ $errors->first('nim') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" id="Title" name="title">
            @if($errors->has('title'))
               <small class="form-text text-muted error">{{ $errors->first('title') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="Pembimbing">Pembimbing</label>
            <select class="form-control pembimbing" id="Pembimbing" name="pembimbing[]" multiple="multiple">
               @foreach ($dosens as $dosen)
               <option value="{{ $dosen->nip }}">{{ $dosen->name }}</option>
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