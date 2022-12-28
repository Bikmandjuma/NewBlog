@extends('auth.cover')
@section('content')
<?php
use App\Models\blog;
use App\Models\user;
  $blog_count =blog::all()->where('user_id',$id);
  $blog_counts = collect($blog_count)->count();  

  $User =user::all()->where('id',$id);

  foreach ($User as $key => $value) {
      $user_name=$value->name;
      $user_id=$value->id;
  }

?>
   
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        
        
            <?php
                if ($blog_counts == 0) {

                    echo "
                            <div class='card text-center'>
                                <h2><span class='text-info'><b>".$user_name."</b></span> blog</h2>
                            </div><br>

                            <div class='card'>
                                <div class='text-center'><h3>No blog found</h3></div>
                            </div>";
                }else{

                    ?>

                        <div class='card text-center'>
                            <h2><span class='text-info'><b>{{$user_name}}</b></span> blog</h2>
                        </div><br>

                        <div class="row">
                            <div class="col-md-7">
                                    
                                    <div class="card">
                                        <div class="card-header text-center">Title displayed here</div>
                                        <div class="card-body alert alert-success">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src ="{{ URL::to('/') }}/images/blog/user.png" style="width: 100px;height: 120px;">
                                                </div>
                                                <div class="col-md-8 text-white">
                                                    <p>Content displayed here</p>
                                                    <h3 class="watermark">Click on blog's title on rigth side to display blog's content.</h3>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <button class="btn btn-light">0 Views</button>
                                                    <button class="btn btn-light">0 Likes</button>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                            
                                        </div>
                                    </div>


                            </div>
                            <div class="col-md-5">
                                <div class="alert alert-success text-center">blogs down here</div>
                                
                                <div style="height: 50px;background-color:white;">

                                    @foreach($blog as $data)
                                        <a href="{{url('ViewSingleUserBlog')}}/{{$user_id}}/{{$data->id}}"><div class="alert alert-primary">{{$data->title}}</div></a>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                         
                    <?php
                }

            ?>

    </div>
    <div class="col-md-2"></div>
  </div>

@endsection