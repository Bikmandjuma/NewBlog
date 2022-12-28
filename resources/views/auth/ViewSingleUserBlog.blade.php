@extends('auth.cover')
@section('content')
<?php
use App\Models\blog;
use App\Models\user;
use App\Models\like;

  $blog_count =blog::all()->where('user_id',$user_id);
  $blog_counts = collect($blog_count)->count();  

  $blogs =blog::all()->where('id',$blog_id);

  $User =user::all()->where('id',$user_id);

  foreach ($User as $key => $value) {
      $user_name=$value->name;
      $user_id=$value->id;
  }
  $sum=0;
  $likes=like::all()->where('blog_id',$blog_id)->where('like',1);
  $likes_count=collect($likes)->count();

  // $like_status=like::all()->where('blog_id',$blog_id)->where('user_id',$user_id)->where('like',1)->where('unlike',0);
  // $status_count=collect($like_status)->count();
                                           
  //   if ($status_count == 0) {
  //       $status_msg=" Unlike";
  //   }else{
  //       $status_msg=" Like";
  //   }

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
                                @foreach($blogs as $data)    
                                    <div class="card">
                                        <div class="card-header text-center">{{$data->title}}</div>
                                        <div class="card-body bg-info">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src ="{{ URL::to('/') }}/images/blog/{{$data->image}}" style="width: 100px;height: 120px;">
                                                </div>
                                                <div class="col-md-8 text-white">
                                                    <p>{{$data->content}}</p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <button class="btn btn-light">{{$data->view_count}} Views</button>
                                                    <button class="btn btn-light"><a href="{{url('like')}}/{{$blog_id}}" style="color: black;">{{$likes_count}} Like</a></button>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-md-5">
                                <div class="alert alert-success text-center">View the following blogs</div>
                                
                                <div style="height: 50px;background-color:white;">
                                    @foreach($blog as $data)
                                        <?php
                                            if ($blog_id == $data->id) {
                                                ?>
                                                    <a href="{{url('ViewSingleUserBlog')}}/{{$user_id}}/{{$data->id}}"><div class="alert alert-danger">{{$data->title}}</div></a>
                                                <?php
                                            }else{
                                        ?>
                                                <a href="{{url('ViewSingleUserBlog')}}/{{$user_id}}/{{$data->id}}"><div class="alert alert-primary">{{$data->title}}</div></a>
                                    
                                        <?php
                                            }
                                        ?>
                                    
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