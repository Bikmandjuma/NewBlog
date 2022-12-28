<?php
use App\Models\blog;
use App\Models\user;
  $u_id=auth()->user()->id;
  $blog_count =blog::all()->where('user_id',$u_id);
  $blog_counts = collect($blog_count)->count(); 

  $user_count =user::all();
  $user_counts = collect($user_count)->count();  

?>

<!DOCTYPE html>
<html>
<head>
    <title>{{ auth()->user()->name }} panel's blog</title>
    <link href="../../style/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../../style/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style type="text/css">
        #count_num{
            background-color:#eee;
            padding:2px 5px 5px 5px;
            border-radius:20px;
        }
        .watermark {
              opacity: 0.4;
              font-size: 30px;
              color: 'black';
              background: '#eee';
              position: absolute;
              cursor: default;
              user-select: none;
              -webkit-user-select: none;
              -khtml-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
        }
        a{
            text-decoration:none;
        }
    </style>
</head>
<body style="background-color: #eee;">

<div class="card">
    <h2 style="margin-top:20px;"><b>{{ auth()->user()->name }}</b></h2>
    <span class="float-right">
        <form action="/logout" method="POST"> 
            @csrf
            <button style="margin-right:5%;float: right; margin-top:-45px;" class="btn btn-secondary">logout</button>
        </form>
    </span><br>
</div>

<br>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <a href="{{url('/home')}}" class="btn btn-info" style="color: white;">Users&nbsp;<span id="count_num" class="text-info">{{$user_counts}}</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route('add')}}" class="btn btn-info" style="color: white;">Add a blog</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="ViewBlogId" href="{{route('MyBlog')}}" class="btn btn-info" style="color: white;">View my blogs&nbsp; <span class="text-info" id="count_num">{{$blog_counts}}</span> </a>
    </div>
    <div class="col-md-4"></div>
</div>

<br>

<main>
    @yield('content')
</main>

</body>
</html>