<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <header class="bg-white py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-dark">
                    <h1 class="display-4 fw-bolder">Buy or sell</h1>
                    <p class="lead fw-normal text-dark-50 mb-0">
                        With this Products Unbound
                    </p>
                </div>
            </div>
        </header>
        {{-- filtering --}}
        <form class=" form-group w-50 m-auto p-2 d-flex align-items-center justify-content-center flex-wrap gap-3"
            action="{{ route('products.index') }}" method="GET">

            <select aria-label="Filter by Category" name="category" id="category"
                class="form-control d-inline w-50 text-center">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}" {{ $categoryName == $category->name ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        {{-- products grid --}}


        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($filteredProducts as $filteredProduct)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img class="card-img-top " height="150"
                                    src="{{ asset('storage/' . $filteredProduct->image) }}"
                                    alt="{{ $filteredProduct->name }}">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"> {{ $filteredProduct->name }}</h5>
                                        <!-- Product price-->
                                        {{ $filteredProduct->price }}$
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto"
                                            href="{{ route('products.show', $filteredProduct->id) }}">View </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
@endsection
