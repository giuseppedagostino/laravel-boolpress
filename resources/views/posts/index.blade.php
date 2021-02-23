@extends('layouts.main')

@section('content')
    <h1>Pagina Index di Posts</h1>

    @if (session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="container">

        @foreach ($posts as $post)
            <div class="post">
                <p><strong>Titolo: </strong>{{ $post->title }}</p>
                <p><strong>Sottotitolo: </strong>{{ $post->subtitle }}</p>
                <p><strong>Autore: </strong>{{ $post->author }}</p>
                <p><strong>Contenuto: </strong>{{ substr($post->content, 0, 100) . " ..." }}</p>
                <p><strong>Pubblicazione: </strong>{{ $post->publication_date }}</p>

                {{-- stampo i tag --}}
                {{-- <h3>Tags</h3>
                @foreach ($tags as $tag)
                    <p>{{ $tag->name }}</p>
                @endforeach --}}

                {{-- posts.show --}}
                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">
                    Leggi di più
                </a>
                {{-- posts.edit --}}
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">
                    Modifica
                </a>
                {{-- posts.destroy --}}
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Elimina</button>
                  </form>
            </div>
        @endforeach

    </div>
   
    {{-- create --}}
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        Crea un nuovo post
    </a>

@endsection