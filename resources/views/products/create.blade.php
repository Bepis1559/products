<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container create-product-container">
        <h1>Create a New Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Product Price ($):</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="productCategory">Product Category:</label>
                <select name="productCategory" id="productCategory" class="form-control" required>
                    <option value="" disabled selected>Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Product Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>


            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
