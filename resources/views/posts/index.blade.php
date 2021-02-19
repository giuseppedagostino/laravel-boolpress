@extends('layouts.main')

@section('content')
    <h1>Pagina Index di Posts</h1>
    @foreach ($posts as $post)
        <p>{{ $post->title }}</p>
        <p>{{ $post->subtitle }}</p>
        <p>{{ $post->author }}</p>
        <p>{{ $post->content }}</p>
        <p>{{ $post->publication_date }}</p>
        <hr>
    @endforeach
@endsection