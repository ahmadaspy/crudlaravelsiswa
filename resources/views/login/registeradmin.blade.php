@extends('templates.login')
@section('form')

<form id="form" class="user" action="/regis_store" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
    
        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="Your Name" required>
    
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
    </div>
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="password" name="password" class="form-control form-control-user" id="password1" placeholder="Password" required>
    </div>
    <div class="col-sm-6">
        <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" required>
    </div>
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit" onclick="return Validate()">Register</button>
    
</form>

    
@stop
@section('js')

<script>
    function Validate(){
        var passwordd = document.getElementById("password1").value;
        var confirmPassword = document.getElementById("password2").value;
        console.log(passwordd);
        console.log(confirmPassword);
        if (passwordd != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
    
@endsection