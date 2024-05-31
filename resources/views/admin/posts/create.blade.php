@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Create New Post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control my-3" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea name="summary" class="form-control my-3" id="summary" rows="5">{{ old('summary') }}</textarea>
            @error('summary')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection


































