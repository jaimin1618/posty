<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // public function foo () {
    //     // $this->middleware(['auth'])->execpt(['index', 'show']);
    // }
    //
    
    
    
    public function index () {
        // OR use => Post::where('') | OR => Post::find() |
        // $posts = Post::get(); // Getting all posts ~ Laravel Collection Type
        
        // Paginating results
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(3);
        
        return view('posts.index', [
            // Passing $posts variable into VIEW-PAGE
            'posts' => $posts
        ]);
    }
    
    
    public function show (Post $post) {
        // showing individual POSTS
        return view('posts.show', [
            'post' => $post
        ]);
    }
    
    public function store (Request $request) {
        // MAKE MODE TO STORE IN DB
        
        // Validation
        $this->validate($request, [
            'body' => 'required'
        ]);
        
        // Storing post
        
        // $request->user()->posts()->create([
        //     'body' => $request->body
        // ]);
        $request->user()->posts()->create($request->only('body'));
        
        return back();

    }
    
    public function destroy (Post $post) {
        // We have added Permmission Policy!!!
        // if (!$post->ownedBy(auth()->user())) {
        //     dd('NO');
        // }
        
        // using Policy
        $this->authorize('delete', $post); // This throws an ERROR 404 if fails  | use @can() to work with this error on view() side
        $post->delete();
        return back();
    }
}
        