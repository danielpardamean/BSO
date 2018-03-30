@extends('layouts._app')

@section('content')
    @include('layouts._navs')
    <style>
         html,body {
            height: 100%;
            }

        .flex-fill {
            flex:1 1 auto;
        }
        .nav-bg{
            background-color: #f2f2f2;
            padding-right: 0;
        }
        .cust-nav-link {
            border-radius: 0px !important;
        }
    </style>
        <div class="row h-100">
            <div class="col-2 h-100 nav-bg">
            <nav class="nav flex-column nav-pills">
                <a class="cust-nav-link nav-link active" href="#">Pengguna</a>
                <a class="cust-nav-link nav-link" href="#">Bimbingan</a>
            </nav>
            </div>
            <div class="col-10">asdsad</div>
        </div>
@endsection