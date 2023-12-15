@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="mb-4 text-center">Categories</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item">
                    <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
