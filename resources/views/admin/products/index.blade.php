<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="mt-5 text-center">Products</h1>

        <form action="{{ route('products.index') }}" method="GET"
            class="form-group w-50 m-auto p-2 d-flex align-items-center justify-content-center flex-wrap gap-3">

            <select aria-label="Filter by Category" name="category" id="category"
                class="form-control d-inline w-50 text-center mt-5 mb-5">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}" {{ $categoryName == $category->name ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filteredProducts as $filteredProduct)
                    <tr>
                        <td>{{ $filteredProduct->name }}</td>
                        <td>{{ $filteredProduct->category->name }}</td>

                        <td>
                            <a href="{{ route('products.show', $filteredProduct->id) }}" class="btn btn-primary">View</a>
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $filteredProduct->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
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
