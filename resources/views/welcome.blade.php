@extends('layouts.app')




@section('content')
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Make it easy with </h1>
                {{-- <h2 class="masthead-subheading mb-0">Products Unbound</h2> --}}
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="{{ route('login') }}">Products Unbound</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>
    <!-- Content section 1-->
    <section id="scroll">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{ asset('/storage/images/laravelWatchProduct.jpg') }}"
                            alt="landing product 1" />
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Timeless Elegance, Yours to Possess: The Classic Watch Marketplace</h2>
                        <p>
                            Discover a curated marketplace where timepiece enthusiasts meet to buy and sell classic watches.
                            Whether you're a seller looking to find a new home for your meticulously maintained watch or a
                            buyer seeking a piece that resonates with your style, our platform connects watch enthusiasts
                            seamlessly. Explore a diverse collection of classic watches, each with a unique story and
                            history. From vintage treasures to contemporary masterpieces, our marketplace is where timeless
                            elegance finds its match
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 2-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{ asset('/storage/images/laravelCarProduct.jpg') }}"
                            alt="landing product 2" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">Empower Your Commute: Join the Electric Car Exchange</h2>
                        <p>
                            Revolutionize the way you think about car ownership in our electric car exchange platform. For
                            sellers, it's an opportunity to showcase the cutting-edge features and eco-friendly advantages
                            of your electric car. Buyers, on the other hand, can explore a range of electric vehicles, each
                            promising a greener, more sustainable driving experience. Whether you're upgrading to the latest
                            model or making the switch to electric for the first time, our platform is the meeting point for
                            sellers and buyers passionate about the future of mobility.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 3-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{ asset('/storage/images/laravelPhoneProduct.jpg') }}"
                            alt="landing product 2" />
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Connect, Capture, and Upgrade: Your Next Smartphone Awaits</h2>
                        <p>
                            Enter the world of smartphone trading where technology enthusiasts converge to buy and sell the
                            latest devices. Sellers, showcase the capabilities of your smartphone – its advanced camera,
                            seamless performance, and innovative features. Buyers, explore a diverse marketplace where
                            upgrading your smartphone is not just a transaction but an experience. From negotiating deals to
                            discovering the perfect device that fits your lifestyle, our platform is the hub where the next
                            generation of smartphones changes hands, connecting sellers and buyers in a digital evolution.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
