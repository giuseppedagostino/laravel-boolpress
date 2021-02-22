@extends('layouts.main')

@section('content')

  <h1>Pagina Create di posts</h1>

  <div class="form">
    <form action="{{ route('posts.store') }}" method="POST">
    @csrf
    @method('POST')
    <hr>

    {{-- titolo --}}
    <label for="title">Titolo</label>
    <input type="text" name="title" placeholder="Titolo" value="{{ old('title') }}">

    {{-- sottotitolo --}}
    <label for="subtitle">Sottotitolo</label>
    <input type="text" name="subtitle" placeholder="Sottotitolo" value="{{ old('subtitle') }}">

    {{-- autore --}}
    <label for="author">Autore</label>
    <input type="text" name="author" placeholder="Autore" value="{{ old('author') }}">

    {{-- contenuto --}}
    <label for="content">Contenuto</label>
    <input class="content" type="text" name="content" placeholder="Contenuto" value="{{ old('content') }}">

    {{-- data di pubblicazione --}}
    <label for="publication_date">Data di pubblicazione</label>
    <input type="text" name="publication_date" placeholder="Data di pubblicazione" value="{{ old('publication_date') }}">

    </form>
  </div>

  <hr>

  <button type="submit" class="button">Salva</button>

  <div class="buttons">
    <a href="{{ route('posts.index') }}">
      Torna alla home
    </a>
  </div>
    
@endsection