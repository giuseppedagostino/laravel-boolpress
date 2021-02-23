@extends('layouts.main')

@section('content')

  <h1>Pagina Edit di posts</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- titolo --}}
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title">
    </div>

    {{-- sottotitolo --}}
    <div class="form-group">
      <label for="subtitle">Sottotitolo</label>
      <input type="text" class="form-control" id="subtitle" value="{{ $post->subtitle }}" name="subtitle">
    </div>

    {{-- autore --}}
    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" class="form-control" id="author" value="{{ $post->author }}" name="author">
    </div>

    {{-- contenuto --}}
    <div class="form-group">
      <label for="content">Contenuto</label>
      <input type="text" class="form-control" id="content" value="{{ $post->content }}" name="content">
    </div>

    {{-- data di pubblicazione --}}
    <div class="form-group">
      <label for="publication_date">Data di pubblicazione</label>
      <input type="text" class="form-control" id="publication_date" value="{{ $post->publication_date }}" name="publication_date">
    </div>

    {{-- GESTIONE TAG - DA MODIFICARE --}}
    <h3 class="mt-3">Tags</h3>
    @foreach ($tags as $tag)
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]">
        <label class="custom-control-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
      </div>
    @endforeach

    {{-- GESTIONE IMMAGINI --}}
    <h3 class="mt-4">Images</h3>
    @foreach ($images as $image)
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="image-{{$image->id}}" value="{{$image->id}}" name="images[]"
        @if ($post->images->contains($image->id)) checked @endif>

        <label class="custom-control-label" for="tag-{{$image->id}}">{{$image->alt}}</label>
      </div>
    @endforeach

    <button type="submit" class="btn btn-lg btn-success mt-3">Salva</button>

  </form>

  <div class="buttons">
    <a href="{{ route('posts.index') }}">
      Torna alla home
    </a>
  </div>
    
@endsection