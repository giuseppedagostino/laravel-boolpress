<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\InfoPost;
use App\Comment;
use App\Tag;
use App\Image;

class PostController extends Controller
{
    // Array di validazione
    private $postValidation = [
        'title' => 'required|max:50',
        'subtitle' => 'required|max:100',
        'author' => 'required|max:60',
        'content' => 'required',
        'publication_date' => 'required|date',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();
        // dd($posts);
        return view('posts.index', compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $images = Image::all();
        // dd($images);
        return view('posts.create', compact('tags', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // effettuo un controllo sui dati inseriti
        $request->validate($this->postValidation);

        // creo un nuovo oggetto di classe post
        $newPost = new Post();
        $data['slug'] = Str::slug($request->title);
        // associo i dati presi dal form alle chiavi del database
        $newPost->title = $data["title"];
        $newPost->slug = $data["slug"];
        $newPost->subtitle = $data["subtitle"];
        $newPost->author = $data["author"];
        $newPost->content = $data["content"];
        $newPost->publication_date = $data["publication_date"];
        // salvo il nuovo post
        $postSaveResult = $newPost->save();

        // quando ho salvato un post e ho almeno un tag definito farò l'attach
        if($postSaveResult && !empty($data['tags'])) {
             $newPost->tags()->attach($data['tags']);
        }

        return redirect()->route('posts.index')->with('message', 'Post aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $images = Image::all();
        return view('posts.edit', compact('post', 'tags', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $request->validate($this->postValidation);
        $post->update($data);

        return redirect()->route('posts.index')->with('message', 'Caratteristiche post aggiornate correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post eliminato correttamente');
    }
}
