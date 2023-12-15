@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="mb-4">Create New Category</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection
