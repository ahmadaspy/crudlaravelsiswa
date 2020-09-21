@extends('templates.login')
@section('form')
@if(session('gagal'))   
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('gagal') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form class="user" action="/postlogin" method="POST">
    <div class="form-group">
        {{ csrf_field() }}
      <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
    <hr>
    
  </form>
@stop