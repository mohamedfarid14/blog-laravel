<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Jobs\PruneOldPostsJob;
use NumberFormatter;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        $end_old_posts = Post::all();
        dispatch(new PruneOldPostsJob($end_old_posts));
        return view("homepage", ["posts" =>$posts]);
    }
    public function create()
    {
        $users = User::all();
        return view("addpage", ["users" => $users]);    
    }
    public function store(StorePostRequest $request)
    {

       $requested= $request->validated();
        $user = User::findOrFail($request->user_id);
        $numberOfPosts = $user->numberOfPosts + 1;
        $user->numberOfPosts = $numberOfPosts;
        $user->save () ; 
        $post = new Post();
        $post->title = $request->title;
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $post->slug = $slug;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return to_route("posts.index");
    }
    public function show(Post $post)
    {
        // $post = Post::find($post);
        // if (!$post)
        // abort(404);
        $user = User::find($post->user_id);
        return view("viewpost",["post"=>$post,"user"=>$user]);
    }
    public function edit(Post $post)
    {
        // $post=Post::findOrFail($post);
        // if($post->user_id!=Auth::user()->id)
        //     abort(401);
        $users = User::all();
        if ($post) {
            return view("updatepage", ["post" => $post, "users" => $users]);
        }   
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize("Belongs",$post);
        $request->validate([]);
        // $updatedpost = Post::find($post);
        $post->title = $request->title;
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $post->slug = $slug;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return to_route("posts.index");
    }
    public function destroy(Post $post)
    {
        $user = User::findOrFail($post->user_id);
        $user->numberOfPosts= $user->numberOfPosts-1 ; 
        $user->save () ; 
        // dd($post);
        $this->authorize("Belongs",$post);
        // if($post->user_id!=Auth::user()->id)
        //     abort(401);
        $post->delete();
        return to_route("posts.index");
    }
}
