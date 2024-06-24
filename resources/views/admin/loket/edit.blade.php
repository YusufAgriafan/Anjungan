
@extends('layouts.admin')
@section('admin_kuis', 'active')

@section('content')

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Ubah Loket</h6>
                    <form action="{{ route('admin.loket.update', $item->codeLoket) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label for="">Nama Loket</label>
                            <input type="text" name="codeLoket" value="{{ old('codeLoket', $item->codeLoket) }}" class="form-control @error('codeLoket') is-invalid @enderror">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.loket.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
    <!-- Form End -->
@endsection