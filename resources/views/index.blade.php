@extends('layouts.master1')

@section('content')
    
    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 text-center text-lg-start">
                    <h2 class="fw-light text-white animated slideInRight">Rumah Sakit Islam Aminah Blitar</h2>
                    <h1 class="display-4 text-white animated slideInRight">Anjungan Pasien Mandiri Pelayanan Rawat Jalan</h1>
                    <p class="text-white mb-4 animated slideInRight">Selamat datang di anjungan pasien Rumah Sakit Islam Aminah Kota Blitar. 
                        Kami berkomitmen untuk memberikan pelayanan kesehatan terbaik dengan fasilitas lengkap dan tenaga medis profesional.</p>
                    <a href="" class="btn btn-dark py-2 px-4 me-3 animated slideInRight">Pelayanan Kami</a>
                    <a href="" class="btn btn-outline-dark py-2 px-4 animated slideInRight">Hubungi Kami</a>
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
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal-lg">
                        <div class="feature-item position-relative bg-primary text-center p-3">
                            <div class="border py-5 px-3">
                                <h1 class="text-white mb-0">Antrean</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <a href="" data-bs-toggle="modal" data-bs-target="#daftar">
                        <div class="feature-item position-relative bg-primary text-center p-3">
                            <div class="border py-5 px-3">
                                <h1 class="text-white mb-0">Daftar</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <a href="" data-bs-toggle="modal" data-bs-target="#kontrol">
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

    @include('modal.antrean')
    @include('modal.daftar')
    @include('modal.kontrol')


@endsection