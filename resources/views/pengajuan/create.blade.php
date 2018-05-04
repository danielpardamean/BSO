@extends('layouts._dashboard')
@section('dash-content')
<style>
   .error {
    color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id_bimbingan" value="{{ $bimbingan->id }}">
         <div class="form-group">
            <label for="Title">Title</label>
            <textarea name="title" id="Title" class="form-control"></textarea>
            @if($errors->has('title'))
               <small class="form-text text-muted error">{{ $errors->first('title') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="Dokument">Dokumen</label>
            <input type="file" class="form-control-file" id="Dokument" name="dokumen">
            @if($errors->has('dokumen'))
               <small class="form-text text-muted error">{{ $errors->first('dokumen') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="dosen">Kepada Dosen :</label>
            <select class="form-control dosen" id="dosen" name="nip">
                <option value="">---</option>
               @foreach (auth('mahasiswa')->user()->pembimbing as $dosen)
                <option value="{{ $dosen->nip }}">{{ $dosen->nip }} - {{ $dosen->name }}</option>
               @endforeach
            </select>
            @if($errors->has('dosen'))
               <small class="form-text text-muted error">{{ $errors->first('dosen') }}</small>
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
    $('.dosen').select2();
});
</script>
@endsection