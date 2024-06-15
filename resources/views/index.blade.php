@extends('layouts.master1')

@section('content')
    
    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h3 class="fw-light text-white animated slideInRight">Natural & Organic</h3>
                    <h1 class="display-4 text-white animated slideInRight">Hair <span class="fw-light text-dark">Shampoo</span> For Healthy Hair</h1>
                    <p class="text-white mb-4 animated slideInRight">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Etiam feugiat rutrum lectus, sed auctor ex malesuada id. Orci varius natoque penatibus et
                        magnis dis parturient montes.</p>
                    <a href="" class="btn btn-dark py-2 px-4 me-3 animated slideInRight">Shop Now</a>
                    <a href="" class="btn btn-outline-dark py-2 px-4 animated slideInRight">Contact Us</a>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid animated pulse infinite" src="img/shampoo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Feature Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4 d-flex justify-content-between">
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <a href="{{ route('daftar') }}">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <h1 class="text-white mb-0">Antrean</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <a href="{{ route('daftar') }}">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <h1 class="text-white mb-0">Daftar</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <a href="{{ route('daftar') }}">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <h1 class="text-white mb-0">Kontrol</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


@endsection