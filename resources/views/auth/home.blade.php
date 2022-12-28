@extends('auth.cover')
@section('content')
<?php
use App\Models\blog;
?>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
            
          <table class="table table-bordered table-striped text-center">
              <tr class="bg-success text-white">
                <th>N<sup>o</sup></th>
                <th>Name</th>
                <th>Email</th>
                
                <th>Action</th>
              </tr>
            @foreach ($data as $i=> $stu)
              
              

                <?php
                  if ($stu->id == auth()->user()->id) {
                      ?>
                      
                      <tr>
                        <td>{{ $i+= 1}}</td>
                        <td>{{ $stu->name }}</td>
                        <td>{{ $stu->email }}</td>
                        <td> <a href="#" onclick="meFunction()" class="btn btn-light">me (Auth user)</a></td>
                      </tr>
                      <?php
                  }
                  else{
                      $blog_cnt =blog::all()->where('user_id',$stu->id);
                      $blog_coun = collect($blog_cnt)->count(); 
                ?>

                  <tr>
                      <td>{{ $i+= 1}}</td>
                      <td>{{ $stu->name }}</td>
                      <td>{{ $stu->email }}</td>
                      <td> <a href="{{url('ViewUserBlog')}}/{{$stu->id}}" class="btn btn-warning">View blog&nbsp;<span id="count_num">{{$blog_coun}}</span></a></td>  
                  </tr>
                <?php
                  }
                ?>
              @endforeach
            </table>

    </div>
    <div class="col-md-2"></div>
  </div>

  <script type="text/javascript">
    function meFunction(){
      document.getElementById('ViewBlogId').style.backgroundColor="red";
    }
  </script>

@endsection