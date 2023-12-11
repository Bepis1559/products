<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>

        <div>
            <strong>Category:</strong> {{ $product->category->name }}
        </div>

        <div>
            <strong>Description:</strong> {{ $product->description }}
        </div>

        <div>
            <strong>Image:</strong>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="300">
        </div>
    </div>
@endsection
