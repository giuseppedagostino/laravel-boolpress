@extends('layouts.main')

@section('content')

  <h1>Pagina Edit di posts</h1>

  @if ($errors->any())
      <div class="alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif

  <div class="form">
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <hr>

    {{-- titolo --}}
    <label for="title">Titolo</label>
    <input type="text" name="title" placeholder="Titolo" value="{{ $post->title }}">

    {{-- sottotitolo --}}
    <label for="subtitle">Sottotitolo</label>
    <input type="text" name="subtitle" placeholder="Sottotitolo" value="{{ $post->subtitle }}">

    {{-- autore --}}
    <label for="author">Autore</label>
    <input type="text" name="author" placeholder="Autore" value="{{ $post->author }}">

    {{-- contenuto --}}
    <label for="content">Contenuto</label>
    <input class="content" type="text" name="content" placeholder="Contenuto" value="{{ $post->content }}">

    {{-- data di pubblicazione --}}
    <label for="publication_date">Data di pubblicazione</label>
    <input type="text" name="publication_date" placeholder="Data di pubblicazione" value="{{ $post->publication_date }}">

    <button type="submit" class="button">Salva</button>

    </form>
  </div>

  <hr>

  <div class="buttons">
    <a href="{{ route('posts.index') }}">
      Torna alla home
    </a>
  </div>
    
@endsection