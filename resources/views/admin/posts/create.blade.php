@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Create New Post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}" required>
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" name="client_name" class="form-control" id="client_name" value="{{ old('client_name') }}">
            @error('client_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea name="summary" class="form-control" id="summary" rows="5">{{ old('summary') }}</textarea>
            @error('summary')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
