
@extends('layouts.admin')
@section('admin_loket', 'active')

@section('content')


    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Tambah Loket</h6>
                    @if(session()->has('success') || session()->has('error'))
                            <div class="alert alert-{{ session()->has('success') ? "success" : "danger" }}">
                                {{ session()->has('success') ? session('success') : session('error') }}
                            </div>
                        @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.loket.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Nama loket</label>
                            <input type="text" name="codeLoket" class="form-control @error('codeLoket') is-invalid @enderror">
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{ route('admin.loket.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
    <!-- Form End -->
@endsection