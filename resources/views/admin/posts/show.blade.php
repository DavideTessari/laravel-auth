@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Post Details</h1>
    <div class="card">
        <div class="card-header">
            <h5>{{ $post->title }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Title:</strong> {{ $post->title }}</p>
            <p><strong>Slug:</strong> {{ $post->slug }}</p>
            <p><strong>Content:</strong> {!! $post->content !!}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
