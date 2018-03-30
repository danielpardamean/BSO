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
            padding-left: 0;
        }
        .cust-nav-link {
            border-radius: 0px !important;
        }
    </style>
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-2 h-100 nav-bg">
                <nav class="nav flex-column nav-pills">
                    <a class="cust-nav-link nav-link" href="{{ route('bimbingan.index') }}">Bimbingan</a>
                    <a class="cust-nav-link nav-link active" href="#">Mahasiswa</a>
                    <a class="cust-nav-link nav-link" href="#">Pegawai</a>
                </nav>
                </div>
                <div class="col-10">
                    @yield('dash-content')
                </div>
            </div>
        </div>
@endsection