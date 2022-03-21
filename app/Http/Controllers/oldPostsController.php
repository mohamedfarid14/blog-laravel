<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    function index()
    {
        $posts = Post::paginate(5);
        return view("homepage", ["posts" =>$posts]);
    }
    function show($post)
    {
        $post = Post::find($post);
        if (!$post)
        abort(404);
        $user = User::find($post->user_id);
        return view("viewpost",["post"=>$post,"user"=>$user]);
    }

    function create()
    {
        $users = User::all();
        return view("addpage", ["users" => $users]);
    }

    function edit($post)
    {
        $post=Post::findOrFail($post);
        if($post->user_id!=Auth::user()->id)
            abort(401);
        $users = User::all();
        if ($post) {
            return view("updatepage", ["post" => $post, "users" => $users]);
        }
    }

    function store(StorePostRequest $request)
    {   
        $request->validate([]);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return to_route("posts.index");
    }
    function update($post,UpdatePostRequest $request)
    {   
        $request->validate([]);
        $updatedpost = Post::find($post);
        $updatedpost->title = $request->title;
        $updatedpost->description = $request->description;
        $updatedpost->user_id = $request->user_id;
        $updatedpost->save();
        return to_route("posts.index");
    }

    function destroy($id)
    {
        $post=Post::findOrFail($id);
        if($post->user_id!=Auth::user()->id)
            abort(401);
        $post->delete();
        return to_route("posts.index");
    }
}
