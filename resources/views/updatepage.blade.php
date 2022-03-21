@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name="title" value={{ $post['title'] }} type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" />
            </div>
            @if ($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
            @endif
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea name="description" id="" cols="30" rows="5"
                    class="form-control">{{ $post['description'] }}</textarea>
            </div>

            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
            <div class="mb-3">
                <select name="user_id" class="form-control" aria-label="Default select example">
                    @foreach ($users as $user)
                        @if ($user->id == $post->user_id)
                            <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if ($errors->has('user_id'))
                <div class="text-danger">{{ $errors->first('user_id') }}</div>
            @endif
            <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </form>
    </div>
@endsection
