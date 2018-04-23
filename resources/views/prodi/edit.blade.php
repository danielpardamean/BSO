@extends('layouts._dashboard')
@section('dash-content')
<style>
   .error {
    color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('prodi.update', $programStudi->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
         <div class="form-group">
            <label for="nama">Nama Program Studi</label>
            <input type="text" class="form-control" id="nama" name="name" value="{{ $programStudi->name }}">
            @if($errors->has('name'))
               <small class="form-text text-muted error">{{ $errors->first('name') }}</small>
            @endif
         </div>
         <div class="form-group row">
            <div class="col-sm-6">
               <button type="submit" class="btn btn-primary">Update</button>
               <a href="{{ route('prodi.index') }}">
                 <button type="button" class="btn btn-success">Back</button>
               </a>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection