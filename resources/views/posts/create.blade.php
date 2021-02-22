@extends('layouts.main')

@section('content')

  <h1>Pagina Create di posts</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('posts.store') }}" method="POST">
    @csrf
    @method('POST')

    {{-- titolo --}}
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title"  placeholder="Inserisci titolo">
    </div>

    {{-- sottotitolo --}}
    <div class="form-group">
      <label for="subtitle">Sottotitolo</label>
      <input type="text" class="form-control" id="subtitle" value="{{ old('subtitle') }}" name="subtitle"  placeholder="Inserisci sottotitolo">
    </div>

    {{-- autore --}}
    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" class="form-control" id="author" value="{{ old('author') }}" name="author"  placeholder="Inserisci autore">
    </div>

    {{-- contenuto --}}
    <div class="form-group">
      <label for="content">Contenuto</label>
      <input type="text" class="form-control" id="content" value="{{ old('content') }}" name="content"  placeholder="Inserisci contenuto">
    </div>

    {{-- data di pubblicazione --}}
    <div class="form-group">
      <label for="publication_date">Data di pubblicazione</label>
      <input type="text" class="form-control" id="publication_date" value="{{ old('publication_date') }}" name="publication_date"  placeholder="Inserisci data di pubblicazione">
    </div>

    {{-- STATO POST --}}
    <div class="form-group">
      <label for="post_status">Stato del post</label>
      <select class="form-control" id="post_status" name="post_status">
        <option value="private" {{ (old('post_status') == 'private') ? 'selected' : '' }}>Privato</option>                  
        <option value="public" {{ (old('post_status') == 'public') ? 'selected' : '' }}>Pubblico</option>                  
        <option value="draft" {{ (old('post_status') == 'draft') ? 'selected' : '' }}>Bozza</option>                  
      </select>
   </div>

    {{-- STATO COMMENTI --}}
    <div class="form-group">
      <label for="comment_status">Stato del commento</label>
      <select class="form-control" id="comment_status" name="comment_status">
          <option value="private" {{ (old('comment_status') == 'private') ? 'selected' : '' }}>Privato</option>                  
          <option value="open" {{ (old('comment_status') == 'open') ? 'selected' : '' }}>Aperto</option>                  
          <option value="closed" {{ (old('comment_status') == 'closed') ? 'selected' : '' }}>Chiuso</option>                  
      </select>
    </div>

    <h3 class="mt-3">Tags</h3>
    @foreach ($tags as $tag)
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]">
        <label class="custom-control-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
      </div>
    @endforeach

    <button type="submit" class="btn btn-lg btn-success mt-3">Salva</button>

  </form>

  <a href="{{ route('posts.index') }}" class="btn btn-lg btn-secondary">Torna alla home</a>
    
@endsection