@extends('layouts.app')
@section('content')
    <div class="card m-auto w-50">
        <div class="card-header">
            id: {{$post['id']}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post['title'] }}</h5>
            <h5 class="card-title">{{ $post['slug'] }}</h5>
            <p class="card-text">{{ $post['description'] }}</p>
            <p class="card-text">userName: {{ $user['name'] }} 
            </p>
            <p class="card-text">Creted AT: {{ $post->created_at->format("d-m-y")}}</p>
            <x-button type="Primary" message="User Posts" href="{{ route('user.posts', $post->user->id) }}"
                class="btn-primary" />
        </div>
    </div>
@endsection
