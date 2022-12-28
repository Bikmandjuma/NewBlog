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

          <div class="card">
            <div class="card-header bg-info text-center text-white"><h3>Login here</h3></div>
            <div class="card-body">    
                
                <form action="/login" method="post">
                    @csrf
                    {{-- <div class="imgcontainer">
                      <img src="img_avatar2.png" alt="Avatar" class="avatar">
                    </div> --}}
                    
                      <label for="uname"><b>email</b></label>
                      <input type="email" placeholder="Enter email" name="email" class="form-control" value="{{old('email')}}"><br>
                  
                      <label for="psw"><b>Password</b></label>
                      <input type="password" placeholder="Enter Password" name="password" class="form-control"><br>
                  
                      <button type="submit" class="btn btn-primary">Login</button>
                </form>

            </div>

            <div class="card-body text-center">
              <a href="{{url('/register')}}" >Don't have account</a>&nbsp;/&nbsp;<a href="#">Forgot password</a>
            </div>
          </div>
          <!--end card-->
        
  </div>
  <div class="col-md-4"></div>
</div>
@endsection