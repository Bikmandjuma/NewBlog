@extends('auth.cover')
@section('content')

<?php
use App\Models\blog;
use App\Models\like;
  $u_id=auth()->user()->id;
  $blog_count =blog::all()->where('user_id',$u_id);
  $blog_counts = collect($blog_count)->count();  
?>
   
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        
        <div class="card text-center">
            <h2>My blogs</h2>
        </div><br>

        
            <?php
                if ($blog_counts == 0) {

                    echo "
                            <div class='card'>
                                <div class='text-center'>No blog found</div>
                            </div>";
                }else{

                    ?>
                         @foreach($blog as $data)
                            <div class="card">
                                <div class="card-header text-center">{{ $data->title }}</div>
                                <div class="card-body bg-info">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src ="{{ URL::to('/') }}/images/blog/{{ $data->image }}" style="width: 100px;height: 120px;">
                                        </div>
                                        <div class="col-md-8 text-white text-center">
                                            <p>{{ $data->content }}</p>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <button class="btn btn-light">{{ $data->view_count }} Views</button>
                                            <button class="btn btn-light">
                                                <a href="{{url('like')}}/{{$data->id}}" style="color: black;">
                                                <?php
                                                    $likes=like::all()->where('blog_id',$data->id)->where('like',1);
                                                    $likes_count=collect($likes)->count();
                                                ?>
                                            {{$likes_count}} Likes</a></button>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5">
                                            <button class="btn btn-success">Edit</button>
                                            <button class="btn btn-danger" onclick="return confirm('do u want to delete this blog')">Delete</button>
                                        </div>
                                    </div>

                                </div>
                            </div><br>

                             @endforeach

                    <?php
                }

            ?>

    </div>
    <div class="col-md-3"></div>
  </div>

@endsection