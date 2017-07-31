<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

   public function index()
   {
    $posts = Post::all();
    
      return view('posts.index', ['posts' => $posts]);
   }
   public function create()
   {
    return view('posts.create');
   }
  public function show($id){

        $post = Post::where('id', '=', $id)->first();

    return view('posts.show', ['post'=> $post]);

   }
   public function store(Request $request)
   {

     	$post = new Post();
     	$post->title = $request->title;
     	$post->text = $request->text;
     	$post->save();

     	return redirect(route('post.show', $post->id));
    
   }


    public function edit($id)
    {
        $post = Post::where('id', '=', $id)->first();

        return view('posts.edit', ['post'=> $post]);
   }

   public function update(Request $request)
   {

      $post = Post::where('id', '=', $request->post_id)->first();
      $post->title = $request->title;
      $post->text = $request->text;
      $post->save();

      return redirect()->route('post.show', $post->id);
   }

   public function destroy(Request $request)
   {

      $post = Post::where('id', '=', $request->post_id)->first();
      $post->delete();

            return redirect(route('posts.index'));


   }

}
