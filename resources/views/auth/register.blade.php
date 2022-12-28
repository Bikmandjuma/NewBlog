@extends('auth.AuthCover')
@section('content')
<br>
<br>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    
          @if(session('loginfailed'))
              <span style="color:red;">{{session('loginfailed')}}</span>
          @endif

          <?php
              if($errors->any()){
          ?>
                  <div class="card bg-danger text-white">
                      <ul>
                                @foreach($errors->all() as $error)
                                      <li style="list-style-type: none;"><b>{{$error}}</b></li>
                                @endforeach
                      </ul>
                  </div><br>
            <?php
              }
            ?>

            @if(session("success"))
                <div class="alert alert-success">{{ session('success') }}</div><br>
            @endif 

          <div class="card">
            <div class="card-header bg-info text-center text-white"><h3>Register here</h3></div>
            <div class="card-body">    
                
                    <form action="/register" method="POST">
                        @csrf
                        <label for="email"><b>name</b></label>
                        <input type="text" placeholder="Enter name" value="{{ old('name') }}" name="name" class="form-control"><br>
                  
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" value="{{ old('email') }}" name="email" class="form-control"><br>
                    
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" class="form-control"><br>

                        <label for="psw"><b> Confirm Password</b></label>
                        <input type="password" placeholder="confirm_Password" name="password_confirmation" class="form-control"><br>
                    
                        <div class="clearfix">
                          <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>        
                  </form>


            </div>

            <div class="card-body text-center">
              <a href="{{url('/login')}}" >Already have account ,Login</a>
            </div>
          </div>
          <!--end card-->
        
  </div>
  <div class="col-md-4"></div>
</div>
@endsection