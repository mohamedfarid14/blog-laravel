@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <form action="{{ route('posts.store') }}" method="post">
            {{-- enctype="multipart/form-data" --}}
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{old('title')}}" />
            </div>
            @if ($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
            @endif
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea name="description" id="" cols="30" rows="5" class="form-control" value="{{old('description')}}"></textarea>
            </div>
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
            <div class="mb-3">
                <select name="user_id" class="form-control" aria-label="Default select example">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('user_id'))
                <div class="text-danger">{{ $errors->first('user_id') }}</div>
            @endif

            <div class="mb-3">
     
                <input name="numberOfPosts" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->numberOfPosts}} " readonly/>
              </div>
            @if ($errors->has('numberOfPosts'))
                <div class="text-danger">{{ $errors->first('numberOfPosts') }}</div>
            @endif
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    
@endsection
