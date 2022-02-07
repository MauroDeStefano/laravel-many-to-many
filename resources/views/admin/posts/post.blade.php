@extends('layouts.app');

@section('content')

<div class="container">
 
  <h1>{{$post->title}}</h1>

  @if($post->category->name)
  <h5>{{$post->category->name}}</h5>  
  @endif
  

  <p>{{$post->content}}</p>



  <a href="{{route('admin.posts.index')}}" class="btn btn-warning">Torna alla lista</a>

</div>


@endsection