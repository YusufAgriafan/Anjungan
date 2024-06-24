@extends('layouts.master1')

@section('content')

<section class="vh-100" style="background-color: #ffffff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="main/img/coba.jpg" alt="login form" class="img-fluid full-height" style="border-radius: 1rem 0 0 1rem; object-fit: cover;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                    @if (session()->has('success') || session()->has('error'))

                        @if (session()->has('success') && auth()->check())
                            <script>
                                setTimeout(() => {
                                    location.href = '{{ route('admin.index') }}'
                                }, 3000);
                            </script>
                        @endif

                        <div class="alert alert-{{ session()->has('success') ? "success" : "danger" }} text-center">
                            {{ session()->has('success') ? session('success') : session('error') }}
                        </div>

                        <script>
                            setTimeout(() => {
                                document.querySelector('.alert').remove();
                            }, 3000);
                        </script>
                    @endif  
  
                    <form action="{{ route('auth') }}" method="POST">
                        @csrf
    
                        <div class="d-flex align-items-center mb-3 pb-1">
                        <img src="main/img/logo.png" alt="Hairnic Logo" class="img-fluid" style="width: 250px; height: auto;">
                        </div>
    
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
    
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            @error('password')
                                <div class="text-danger error-msg">{{ $message }}</div>
                            @enderror
                        <label class="form-label" for="email">Email address</label>
                        </div>
    
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                            @error('password')
                                <div class="text-danger error-msg">{{ $message }}</div>
                            @enderror
                        <label class="form-label" for="password">Password</label>
                        </div>
    
                        <div class="pt-1 mb-4">
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .full-height {
        height: 100%;
    }
</style>

@endsection