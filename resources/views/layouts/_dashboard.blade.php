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
                    <a class="cust-nav-link nav-link {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">Home</a>
                    <a class="cust-nav-link nav-link {{ request()->segment(1) == 'bimbingan' || request()->segment(1) == 'pengajuan' ? 'active' : '' }}" href="{{ route('bimbingan.index') }}">Bimbingan</a>
                    @if(auth('pegawai')->check() AND auth('pegawai')->user()->tipe->name == 'admin')
                    <a class="cust-nav-link nav-link {{ request()->segment(1) == 'mahasiswa' ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    <a class="cust-nav-link nav-link {{ request()->segment(1) == 'pegawai' ? 'active' : '' }}" href="{{ route('pegawai.index') }}">Pegawai</a>
                    <a class="cust-nav-link nav-link {{ request()->segment(1) == 'prodi' ? 'active' : '' }}" href="{{ route('prodi.index') }}">Program Studi</a>
                    @endif
                </nav>
                </div>
                <div class="col-10" style="overflow-y:scroll; padding-bottom: 20px">
                    @yield('dash-content')
                </div>
            </div>
        </div>
@endsection