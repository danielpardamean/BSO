@extends('layouts._dashboard')
@section('dash-content')
<style>
   .error {
    color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('mahasiswa.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
         <div class="form-group">
            <label for="NIM">NIM</label>
            <input type="text" class="form-control" id="NIM" name="nim">
            @if($errors->has('nim'))
               <small class="form-text text-muted error">{{ $errors->first('nim') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" name="name">
            @if($errors->has('name'))
               <small class="form-text text-muted error">{{ $errors->first('name') }}</small>
            @endif
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group col-md-6">
               <label for="passwordConfirmation">Password Confirmation</label>
               <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation">
            </div>
            @if($errors->has('password'))
               <small class="form-text text-muted error">{{ $errors->first('password') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="ProgramStudi">Program Studi</label>
            <select class="form-control" id="ProgramStudi" name="programStudi">
               @foreach ($programStudis as $programStudi)
               <option value="{{ $programStudi->id }}">{{ $programStudi->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="Profile picture">Profile Picture</label>
            <input type="file" class="form-control-file" id="Profile picture" name="profile_picture">
            @if($errors->has('profile_picture'))
               <small class="form-text text-muted error">{{ $errors->first('profile_picture') }}</small>
            @endif
         </div>
         <div class="form-group row">
            <div class="col-sm-6">
               <button type="submit" class="btn btn-primary">Save</button>
               <button type="reset" class="btn btn-success">Reset</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection