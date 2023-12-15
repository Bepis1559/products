<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <section>
        <div class="container px-4 px-lg-5 my-4">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="card-img-top mb-5 mb-md-0">
                </div>
                <div class="col-md-6">
                    <h3 class="mb-3"><strong>Created by:</strong> {{ $userName }}</h3>
                    <h3 class="mb-3"> <strong>Category:</strong> {{ $product->category->name }}</h3>
                    <h3 class=" mb-3">
                        <strong>Price:</strong> ${{ $product->price }}
                    </h3>
                    <div class="mb-3">
                        <h3 cla> <strong>Description:</strong></h3>
                        <p class=" fs-4">{{ $product->description }}</p>
                    </div>
                    @if (auth()->check() && auth()->user()->id === $product->user_id)
                        <!-- Display edit and delete buttons for the user who created the product -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Product</button>
                        </form>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary mt-3">Edit Product</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
