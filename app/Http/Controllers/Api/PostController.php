<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index()
    {
        return Post::all();
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        return Post::create(request()->all());
    }

  
    public function show($id)
    {
        return Post::findOrFail($id);
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $postdata= Post::findOrFail($id);
        $updatedpost=$postdata->update(request()->all());
        return Post::findOrFail($id);
    }

 
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();
        return "Deleted";
    }
}