@extends('layouts._dashboard')
@section('dash-content')
<div class="container h-100">
   <div class="row h-100 justify-content-center align-items-center">
      <form class="col-6" method="POST" action="{{ route('profile.profile-picture') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlFile1">Profile Picture</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="profile">
        </div>
         <div class="form-group row">
            <div class="col-sm-6">
               <button type="submit" class="btn btn-primary">Change</button>
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