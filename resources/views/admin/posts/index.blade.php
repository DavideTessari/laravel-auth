@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-success">View</a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
