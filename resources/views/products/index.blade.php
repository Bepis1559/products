<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Products</h1>

        <form action="{{ route('products.index') }}" method="GET">
            <div class="form-group">
                <label for="category">Filter by Category:</label>
                <select name="category" id="category" class="form-control">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}" {{ $categoryName == $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Display a table of products -->
        <!-- Display a table of products -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th> <!-- New column for delete buttons -->
                </tr>
            </thead>
            <tbody>
                @foreach ($filteredProducts as $filteredProduct)
                    <tr>
                        <td>{{ $filteredProduct->name }}</td>
                        <td>{{ $filteredProduct->category->name }}</td>
                        <td>{{ $filteredProduct->description }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $filteredProduct->image) }}" alt="{{ $filteredProduct->name }}"
                                width="100">
                        </td>
                        <td>
                            <!-- Delete Button -->
                            <form action="{{ route('products.destroy', $filteredProduct->id) }}" method="POST">
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
