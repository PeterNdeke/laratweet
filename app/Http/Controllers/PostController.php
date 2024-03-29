<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Events\PostCreated;
class PostController extends Controller
{
    public function index(Request $request, Post $post){
        $allPost = $post->whereIn('user_id', $request->user()->following()->pluck('users.id')->push($request->user()->id))
        ->with('user');

        $post = $allPost->orderBy('created_at','desc')->take(10)->get();

        return response()->json([
            'posts'=>$post,

        ]);

       

    }
    public function create(Request $request, Post $post){
      $createdPost = $request->user()->posts()->create([
           'body'=> $request->body,
       ]);

       broadcast(new PostCreated($createdPost, $request->user()))->toOthers();

       return response()->json($post->with('user')->find($createdPost->id));

    }
}
