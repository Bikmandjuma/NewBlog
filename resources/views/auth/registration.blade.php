<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
</head>
<body>
    @if(session("success"))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif 
      ///
        
    <form action="{{ route('register-user') }}" method="POST">
          {{-- @if(session::("success"))
        <div class="alert alert-success">{{ session::get('success') }}</div>
        @endif 
        @if(session::has("fail"))
        <div class="alert alert-denger">{{ session::get('fail') }}</div>
        @endif  
        @csrf  --}}
        @csrf
        <div class="container">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <label for="email"><b>name</b></label>
          <input type="text" placeholder="Enter name" value="{{ old('name') }}" name="name"><br>
          <span style="color:red;">@error('name') {{$message}} @enderror</span>
    
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" value="{{ old('email') }}" name="email"><br>
          <span style="color:red;">@error('email') {{$message}} @enderror</span>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password"><br>
          <span style="color:red;">@error('password') {{$message}} @enderror</span>
      
          {{-- <label for="psw-repeat"><b>Repeat Password</b></label> --}}
          {{-- <input type="password" placeholder="Repeat Password" name="psw-repeat" required> --}}
      
          <label>
            {{-- <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me --}}
          </label>
      
          {{-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> --}}
      
          <div class="clearfix">
            {{-- <button type="button" class="cancelbtn">Cancel</button> --}}
            <button type="submit" class="signupbtn">Sign Up</button>
          </div>
          <div class="clearfix">
            {{-- <button type="button" class="cancelbtn">Cancel</button> --}}
            <a href="login">Already Registered user!! login here</a>
          </div>
        </div>
      
    </form>
</body>
</html>