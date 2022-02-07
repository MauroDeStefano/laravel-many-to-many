@extends('layouts.app');

@section('content')

<div class="container">
 
  <h1>{{$post->title}}</h1>

  @foreach ($post->tags as $tag)
  <span class="badge bg-info text-dark m-1">#{{$tag->name}}</span>
  @endforeach

  @if($post->category)
  <h5>{{$post->category->name}}</h5>  
  @endif
  

  <p>{{$post->content}}</p>



  <a href="{{route('admin.posts.index')}}" class="btn btn-warning">Torna alla lista</a>
  <a class="btn btn-success" href="{{route('admin.posts.edit', $post)}}">EDIT</a>
</div>


@endsection