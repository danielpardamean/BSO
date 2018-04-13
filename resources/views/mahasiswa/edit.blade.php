@extends('layouts._dashboard')
@section('dash-content')
<style>
   .error {
    color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
         <div class="form-group">
            <label for="NIM">NIM</label>
            <input type="text" class="form-control" id="NIM" name="nim" value="{{ $mahasiswa->nim }}">
            @if($errors->has('nim'))
               <small class="form-text text-muted error">{{ $errors->first('nim') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" name="name" value="{{ $mahasiswa->name }}">
            @if($errors->has('name'))
               <small class="form-text text-muted error">{{ $errors->first('name') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="ProgramStudi">Program Studi</label>
            <select class="form-control" id="ProgramStudi" name="programStudi">
               @foreach ($programStudis as $programStudi)
               <option value="{{ $programStudi->id }}" {{ $mahasiswa->program_studi_id == $programStudi->id ? "selected" : "" }}>{{ $programStudi->name }}</option>
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