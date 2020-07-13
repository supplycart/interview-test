<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

<title>Register Account</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<link href="styles.css" rel="stylesheet">
<style>
    body 
    {
        color: #fff;
        background: #d3d3d3;
        font-family: Arial, Helvetica, sans-serif;
    }

    .form-control, .form-control:focus, .input-group-addon
    {
        border-color: #19aa8d;
    }

    .form-control, .btn
    {
        border-radius: 1px;
    }

    .signup-form
    {
        width: 390px;
        margin:0 auto;
        padding:30px 0;
    }

    .signup-form form
    {
        color: #999;
        border-radius: 1px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0,0,0, 0.5);
        padding: 30px;
    }
    .signup-form h2 
    {
        color:#999;
        font-weight: bold;
        margin-top:0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
    .signup-form .form-group {
        margin-bottom: 20px;
    }
    .signup-form label {
        font-weight: normal;
        font-size: 13px;
    }
    .signup-form .form-control {
        min-height: 38px;
        box-shadow: none !important;
    } 
    .signup-form .input-group-addon {
        max-width: 42px;
        text-align: center;
    }
    .signup-form input[type="checkbox"] {
        margin-top: 2px;
    }   
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
        background: #19aa8d;
        border: none;
        min-width: 140px;
    }
    .signup-form .btn:hover, .signup-form .btn:focus {
        background: #179b81;
        outline: none;
    }
    .signup-form a {
        color: #fff; 
        text-decoration: underline;
    }
    .signup-form a:hover {
        text-decoration: none;
    }
    .signup-form form a {
        color: #19aa8d;
        text-decoration: none;
    } 
    .signup-form form a:hover {
        text-decoration: underline;
    }
    .signup-form .fa {
        font-size: 21px;
    }
    .signup-form .fa-paper-plane {
        font-size: 18px;
    }
    .signup-form .fa-check {
        color: #fff;
        left: 17px;
        top: 18px;
        font-size: 7px;
        position: absolute;
    }
</style>

</head>
<body>
<div class="signup-form">
    <form action="{{url('post-register')}}" method="post" id="regform">
  <h2>Sign Up</h2>
  <p>Please fill in this form to create an account!</p>
  {{ csrf_field() }}
        <div class="form-group">
   <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" class="form-control" name="name" placeholder="Username" required="required" autocomplete="off">
   </div>
   @if ($errors->has('name'))
        <span class="error">{{ $errors->first('name') }}</span>
    @endif
        </div>
        <div class="form-group">
   <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
    <input type="email" class="form-control" name="email" placeholder="Email Address" required="required" autocomplete="off">
   </div>
   @if ($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
    @endif 
        </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required="required" autocomplete="off">
        </div>
    </div>
    @if ($errors->has('phone'))
        <span class="error">{{ $errors->first('phone') }}</span>
    @endif 
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"></i></span>
            <input type="text" class="form-control" name="homeaddress" placeholder="Home Address" required="required" autocomplete="off">
        </div>
    </div>
    @if ($errors->has('homeaddress'))
        <span class="error">{{ $errors->first('homeaddress') }}</span>
    @endif 
  <div class="form-group">
   <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
   </div>
   @if ($errors->has('password'))
        <span class="error">{{ $errors->first('password') }}</span>
    @endif 
        </div>
        <div class="form-group">
   <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
  </div>
  <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
 <div class="text-center">Already have an account? <a href="login1" style="color:#19aa8d;">Login here</a></div>
</div>
</body>
</html>             