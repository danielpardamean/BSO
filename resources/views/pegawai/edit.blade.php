@extends('layouts._dashboard')
@section('dash-content')
<style>
   .error {
    color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('pegawai.update', $pegawai->nip) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
         <div class="form-group">
            <label for="NIP">NIP</label>
            <input type="text" class="form-control" id="NIP" name="nip" value="{{ $pegawai->nip }}">
            @if($errors->has('nip'))
               <small class="form-text text-muted error">{{ $errors->first('nip') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" name="name" value="{{ $pegawai->name }}">
            @if($errors->has('name'))
               <small class="form-text text-muted error">{{ $errors->first('name') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="Type">Type</label>
            <select class="form-control" id="Type" name="type">
               @foreach ($types as $type)
               <option value="{{ $type->id }}" {{ $pegawai->id_type == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group row">
            <div class="col-sm-6">
               <button type="submit" class="btn btn-primary">Update</button>
               <a href="{{ route('pegawai.index') }}">
                 <button type="button" class="btn btn-success">Back</button>
               </a>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection