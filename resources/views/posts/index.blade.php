@extends('layouts.main')

@section('content')
    <h1>Pagina Index di Posts</h1>

    <div class="container">

        @foreach ($posts as $post)
            <div class="post">
                <p><strong>Titolo: </strong>{{ $post->title }}</p>
                <p><strong>Sottotitolo: </strong>{{ $post->subtitle }}</p>
                <p><strong>Autore: </strong>{{ $post->author }}</p>
                <p><strong>Contenuto: </strong>{{ substr($post->content, 0, 100) . " ..." }}</p>
                <p><strong>Pubblicazione: </strong>{{ $post->publication_date }}</p>

                {{-- posts.show --}}
                <div class="buttons">
                    <a href="{{ route('posts.show', $post->id) }}">
                        Leggi di più
                    </a>
                </div>
            </div>
        @endforeach

    </div>

    {{-- pulsanti --}}

    <div class="buttons">
        {{-- create --}}
        <a href="{{ route('posts.create') }}" class="button">
            Crea un nuovo post
        </a>
    </div>

@endsection