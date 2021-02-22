@extends('layouts.main')

@section('content')

  <h1>{{ $post->title }}</h1>

  <h3>{{ $post->subtitle }}</h3>
  {{-- stampo tre volte giusto per farlo sembrare più corposo --}}
  <p>
    <?php
      for ($i=0; $i < 3; $i++) { 
        echo $post->content;
      }
    ?>
  </p>

  <h3><?php echo $post->author . " - " . $post->publication_date; ?></h3>

  <div class="buttons">
    <a href="{{ route('posts.index') }}">
      Torna alla home
    </a>
  </div>
    
@endsection