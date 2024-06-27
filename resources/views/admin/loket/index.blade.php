
@extends('layouts.admin')
@section('admin_loket', 'active')

@section('content')


    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Tabel Loket</h6>
                    <a href="{{ route('admin.loket.create') }}" class="btn btn-primary mb-3">Tambah Loket</a>

                        @if(session()->has('success') || session()->has('error'))
                            <div class="alert alert-{{ session()->has('success') ? "success" : "danger" }}">
                                {{ session()->has('success') ? session('success') : session('error') }}
                            </div>
                        @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col">#</th>
                                    <th class="col">Nama Loket</th>
                                    <th class="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(count($loket))
                                    @foreach($loket as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->codeLoket }}</td>
                                            <td>
                                                <a href="{{ route('admin.loket.edit', $item->id) }}">
                                                    <label class="btn btn-primary">Edit</label>
                                                </a>
                                                <a href="{{ route('admin.antrean.index', $item->codeLoket) }}">
                                                    <label class="btn btn-success">Antrean</label>
                                                </a>
                                                <a href="{{ route('admin.antrean.display', $item->codeLoket) }}">
                                                    <label class="btn btn-info">Display</label>
                                                </a>
                                                <form action="{{ route('admin.loket.destroy', $item->id, $item->codeLoket) }}" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin Menghapus Loket')" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger border-0">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada loket</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection
