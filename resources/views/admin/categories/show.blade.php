@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="mb-4">Category Details</h1>

        <p><strong>Name:</strong> {{ $category->name }}</p>

        <a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->id) }}">Edit Category</a>

        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this category?')">Delete Category</button>
        </form>
    </div>
@endsection
