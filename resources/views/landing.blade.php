@extends('layouts._app')

@section('content')

@include('layouts._navs')

<div class="jumbotron jumbotron-fluid" style="background: url('{{ asset('images/books.png') }}') no-repeat 90% 90% ; background-size: cover">
   <div class="container" style="color: #fff">
      <h1 class="display-4">Sistem Informasi</h1>
      <p class="lead">Bimbingan Skripsi Online</p>
   </div>
</div>
<div class="container">
   <h1>
      <p class="text-center">Features</p>
   </h1>
   <div class="row">
      <div class="col">
         <div class="card text-white bg-primary mb-3 float-right" style="max-width: 18rem;">
            <div class="card-body">
               <p class="card-text text-right">Melakukan proses bimbingan melalui sistem.</p>
            </div>
         </div>
         <div class="card text-white bg-primary mb-3 float-right" style="max-width: 18rem;">
            <div class="card-body">
               <p class="card-text text-right">dosen mengkoreksi skripsi mahasiswa.</p>
            </div>
         </div>
      </div>
      <div class="col">
         <div class="card text-white bg-primary mb-3 float-left" style="max-width: 18rem;">
            <div class="card-body">
               <p class="card-text text-left">Dosen dapat mengkoreksi dimanapun dan kapanpun.</p>
            </div>
         </div>
         <div class="card text-white bg-primary mb-3 float-left" style="max-width: 18rem;">
            <div class="card-body">
               <p class="card-text text-left">Segala kegiatan yang dilakukan disistem tercatat didatabase.</p>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container">
</div>
<div class="jumbotron jumbotron-fluid footer">
   <div class="container">
      <p class="text-center">Sistem Informasi Bimbingan Skripsi</p>
      <p class="text-center">Universitas Jambi</p>
      <p class="text-center">© 2018 | All Rights Reserved</p>
   </div>
</div>
<style>
   .footer{
   margin-bottom: 0px !important;
   }
</style>
@endsection