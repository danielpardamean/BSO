@extends('layouts._app')
@section('content')
<style>
   html,body {
    height: 100%;
   background-color: #f1f1f1;
   }
   .form-bg{
   padding: 20px;
   background-color: #fff;
   border-radius: 3px;
   }
   .error {
   color: #fd6363 !important;
   }
</style>
<div class="container h-100">
   <div class="row justify-content-center align-items-center h-100">
      <div class="col-4 form-bg">
         @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
         @endif
         <form class="form-horizontal" role="form" method="POST" action="/login" id="loginForm">
            {{ csrf_field() }}
            <div class="form-group">
               <label>Login sebagai :</label>
               <div class="input-group mb-3">
                  <div class="input-group-prepend" :class="{ show: isShow }">
                     <button @click.prevent="show" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" :aria-expanded="isShow">@{{ loginType }}</button>
                     <div class="dropdown-menu" :class="{ show: isShow }">
                        <a class="dropdown-item" href="#" v-for="type in loginTypes" @click.prevent="changeType(type)">@{{ type }}</a>
                     </div>
                  </div>
                  <input type="text" class="form-control" v-model="username" name="username">
               </div>
               @if($errors->has('username'))
               <small class="form-text text-muted error">{{ $errors->first('username') }}</small>
               @endif
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" id="exampleInputPassword1" v-model="password" name="password">
            </div>
            @if($errors->has('password'))
            <small class="form-text text-muted error">{{ $errors->first('password') }}</small>
            @endif
            <input type="hidden" name="loginType" :value="loginType">
            <div class="form-group">
               <button type="submit" class="btn btn-primary float-right">Login</button>
            </div>
         </form>
         <script>
            loginForm = new Vue({
                el: '#loginForm',
                data(){
                    return {
                        loginType: 'Mahasiswa',
                        loginTypes: ['Mahasiswa', 'Pegawai'],
                        isShow: false,
                        username: '',
                        password: ''
                    }
                },
                methods: {
                    show(){
                        this.isShow = !this.isShow;
                    },
                    changeType(type){
                        this.loginType = type;
                    }
                }
            })
         </script>
      </div>
   </div>
</div>
@endsection