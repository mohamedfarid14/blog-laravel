@extends('layouts.app')
@section('content')
    <table class="table w-75 m-auto ">
        <thead>
            <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Desc</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td> {{ $post['id'] }} </td>
                    <td> {{ $post['title'] }} </td>
                    <td> {{ $post['slug'] }} </td>
                    <td> {{ $post['description'] }} </td>
                    <td>
                        <x-button type="Primary" message="View" href="{{ route('posts.show', $post->id) }}"
                            class="btn btn-success" />
                    </td>
                    <td>
                        <x-button type="Primary" message="Update" href="{{ route('posts.edit', $post->id) }}"
                            class="btn btn-warning" />
                    </td>
                    <td>

                        <form action={{ route('posts.destroy', [$post['id']]) }} method="POST" class="d-inline">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this item')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>
    <div class="row d-flex justify-content-center ">
        <div>{{ $posts->links('pagination::bootstrap-4') }}</div>
    </div>
@endsection
