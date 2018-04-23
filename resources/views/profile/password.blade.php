@extends('layouts._dashboard')
@section('dash-content')
<style>
   .error {
    color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('profile.password') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
         <div class="form-group">
            <label for="PasswordLama">Password Lama</label>
            <input type="password" class="form-control" id="Password`Lama" name="old_password">
            @if($errors->has('old_password'))
               <small class="form-text text-muted error">{{ $errors->first('old_password') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="PasswordBaru">Password Baru</label>
            <input type="password" class="form-control" id="PasswordBaru" name="new_password">
            @if($errors->has('new_password'))
               <small class="form-text text-muted error">{{ $errors->first('new_password') }}</small>
            @endif
         </div>
         <div class="form-group">
            <label for="UlangPasswordBaru">Ulangi Password Baru</label>
            <input type="password" class="form-control" id="UlangPasswordBaru" name="new_password_confirmation">
         </div>
         <div class="form-group row">
            <div class="col-sm-6">
               <button type="submit" class="btn btn-warning">Ubah</button>
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