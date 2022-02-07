@extends('layouts.app');

@section('content')

<div class="container">
  <h1>Elenco di post presenti nel server</h1>
  <a href="{{route('admin.posts.create')}}" class="btn btn-primary m-5">Nuovo</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titolo</th>
      <th scope="col">Tags</th>
      <th scope="col">Contenuto</th>
      <th scope="col">Categoria</th>
      <th scope="col">Azioni</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
     <tr>
      <th scope="row">{{$post->id}}</th>

      <td>{{$post->title}}</td>
      <td>
        @foreach ($post->tags as $tag)

        <span class="badge bg-info text-dark m-1">#{{$tag->name}}</span>
          
        @endforeach
      </td>
      <td>{{$post->content}}</td>
      @if ($post->category)
        <td>{{$post->category->name}}</td>
      @else
      <td> - </td>
      @endif
      
      <td class="row">
        <a class="btn btn-primary w-100 mb-2" href="{{route('admin.posts.show', $post)}}">SHOW</a>
        <a class="btn btn-success w-100 mb-2" href="{{route('admin.posts.edit', $post)}}">EDIT</a>
        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn w-100 btn-danger">DELETE</button></td>
        </form>
      </td>
    </tr> 
    @endforeach
    
  </tbody>
</table>
</div>

@endsection