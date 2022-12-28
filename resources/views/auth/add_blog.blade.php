@extends('auth.cover')
@section('content')

  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

    	@if(session('success'))
    		<div class="card bg-primary text-white text-center">
			    <span>{{ session('success') }}</span>
			</div><br>
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
            <div class="card-header bg-info text-center text-white"><h3>Add blog</h3></div>
            <div class="card-body">
            	
				<form action ="{{ route('add_blog') }}" method="post" enctype="multipart/form-data">
				    @csrf
					<label><strong>Title</strong></label><input type="text" name="title" value="{{old('title')}}" class="form-control">
					<label><strong>Image</strong></label><input type="file" name="image" value="{{old('image')}}" class="form-control">
					<label><strong>Content</strong></label><textarea type="text" value="{{old('content')}}" name="content" rows="3" class="form-control"></textarea><br>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>

            </div>
        </div>

    </div>
    <div class="col-md-3"></div>
  </div>

@endsection