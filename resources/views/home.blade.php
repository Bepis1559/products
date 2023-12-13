@extends('layouts.app')

@section('content')
    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">Welcome to Products Unbound !</h1>
                    <p class="fs-4">
                        That's where you can interact with other buyers or sellers. Make an account, decide whether you want
                        to buy or
                        sell an item you want to get rid of . Actually why not both ? Products Unbound is where you
                        belong !
                    </p>
                </div>
            </div>
        </div>
    </header>
    <!-- Page Content-->
    <section class="pt-4">
        <div class="container px-lg-5">
            <!-- Page Features-->
            <div class="row gx-lg-5">
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                <i class="bi bi-collection"></i>
                            </div>
                            <h2 class="fs-4 fw-bold">List lots of products</h2>
                            <p class="mb-0">
                                With our App , we've created a way for you to present your products to others
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                <i class="bi bi-stack"></i>
                            </div>
                            <h2 class="fs-4 fw-bold">Unlimited amount</h2>
                            <p class="mb-0">
                                Upload as many products as you wish or just checkout what others have to offer
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                <i class="bi bi-card-heading"></i>
                            </div>
                            <h2 class="fs-4 fw-bold">Give it a descriptive name</h2>
                            <p class="mb-0">
                                Make sure the name of the product describes it properly and fully
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                <i class="bi bi-body-text"></i>
                            </div>
                            <h2 class="fs-4 fw-bold">Add some description to it</h2>
                            <p class="mb-0">
                                Describe what the product is all about. make others know exactly what you offer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                <i class="bi bi-file-image"></i>
                            </div>
                            <h2 class="fs-4 fw-bold">Upload an image</h2>
                            <p class="mb-0">
                                You can also upload an image , if name and description is not enough. Let others contemplate
                                it.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                <i class="bi bi-patch-check"></i>
                            </div>
                            <h2 class="fs-4 fw-bold">A name you trust</h2>
                            <p class="mb-0">
                                We are striving for progress and product update every day ! We are trying our best to make
                                sure , everything you need is here !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
