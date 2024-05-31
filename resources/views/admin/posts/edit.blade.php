@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Post</h1>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control my-3" id="name" value="{{ old('name', $post->name) }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control my-3" id="slug" value="{{ old('slug', $post->slug) }}">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" name="client_name" class="form-control my-3" id="client_name" value="{{ old('client_name', $post->client_name) }}">
            @error('client_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea name="summary" class="form-control" id="summary my-3" rows="5">{{ old('summary', $post->summary) }}</textarea>
            @error('summary')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary my-3">Cancel</a>
    </form>
</div>
@endsection
