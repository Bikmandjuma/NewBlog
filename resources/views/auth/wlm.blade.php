@extends('auth.cover')
{{-- help to call page  --}}
@section('content')
{{-- it is container where we add content --}}
    <h1>
        login here
    </h1>
    <h4 style="margin-right:10%;float: right;"><a href="{{url('logout')}}"> Logout</a></h4>
@endsection
