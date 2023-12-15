@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="mb-4">Edit Category</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
