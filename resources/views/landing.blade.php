@extends('layouts._app')

@section('content')

@include('layouts._navs')

<div class="jumbotron jumbotron-fluid">
   <div class="container">
      <h1 class="display-4">Cepat Selesai.</h1>
      <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
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
               <h5 class="card-title text-right">Logged User</h5>
               <p class="card-text text-right">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
         </div>
         <div class="card text-white bg-primary mb-3 float-right" style="max-width: 18rem;">
            <div class="card-body">
               <h5 class="card-title text-right">Easy Access</h5>
               <p class="card-text text-right">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
         </div>
      </div>
      <div class="col">
         <div class="card text-white bg-primary mb-3 float-left" style="max-width: 18rem;">
            <div class="card-body">
               <h5 class="card-title text-left">Customized settings</h5>
               <p class="card-text text-left">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
         </div>
         <div class="card text-white bg-primary mb-3 float-left" style="max-width: 18rem;">
            <div class="card-body">
               <h5 class="card-title text-left">Connected</h5>
               <p class="card-text text-left">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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