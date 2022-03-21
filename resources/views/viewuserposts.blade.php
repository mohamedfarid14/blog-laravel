@extends('layouts.app')
@section('content')
<table class="table w-75 m-auto ">
  <tbody>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Day</th>
      </tr>
      {{-- @dd($posts)  --}}
      @foreach($posts as $post)
      <tr>
        <td> {{ $post->id }} </td>
        <td> {{ $post->title }} </td>
        <td> {{ $post->slug }} </td>
        <td> {{ $post->description }} </td>
        <td> {{ $post->created_at->format("d-m-y") }} </td>
      </tr>
      @endforeach 
  </tbody>
</table>
<div class="row d-flex justify-content-center ">
  <div>{{ $posts->links('pagination::bootstrap-4') }}</div>
</div>
@endsection