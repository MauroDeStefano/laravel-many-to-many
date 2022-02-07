@extends('layouts.app');

@section('content')

<div class="container">
  <h1>Aggiungi un nuovo post</h1>

  <form action="{{route('admin.posts.store')}}" method="post">
  @csrf

    <div class="form-group">
      <label for="exampleInputEmail1">Titolo del Post</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{old('title')}}">
      @error('title')
      <p class="form_errors text-danger">
          {{ $message }}
      </p>
      @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contenuto del Post</label>
      <textarea class="form-control" name="content" id="content" placeholder="Contenuto">{{old('content')}}</textarea>
    </div>
    @error('content')
    <p class="form_errors text-danger">
        {{ $message }}
    </p>
    @enderror
    <label for="selectCategory">Categoria</label>
    <select class="form-select mr-3" 
    name="category_id"
    id="category_id">
      <option value="">Nessuna</option>

      @foreach ($categories as $category)
        <option 
        @if($category->id == old('category_id')) selected @endif
        
        value="{{$category->id}}">{{$category->name}}</option>
      @endforeach

    </select>
    
        @foreach ($tags as $tag)
          <span class="m-2 ml-4">
            <input type="checkbox" value="{{$tag->id}}" name="tags[]" id="tags[{{$loop->iteration}}]"
            @if(in_array($tag->id, old('tags', []))) checked @endif
            >
            <label for="tags[{{$loop->iteration}}]">
              {{$tag->name}}
            </label>

          </span>
        @endforeach
      
    <button type="submit" class="btn btn-primary">Crea Nuovo</button>
    <button type="reset" class="btn btn-secondary" >Reset</button>
  </form>

</div>


@endsection