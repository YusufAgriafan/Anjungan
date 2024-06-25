@extends('layouts.admin')
@section('admin_loket', 'active')

@section('content')

    <!-- Queue Counter Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-lg-12">
                <div class="bg-light rounded h-100 p-2">
                    <h6 class="mb-3">Waktu dan Tanggal Saat Ini</h6>
                    <div id="currentDateTime">
                        <p id="currentDate" style="font-size: 16px; margin-bottom: 5px;"></p>
                        <p id="currentTime" style="font-size: 16px; margin-bottom: 0;"></p>
                    </div>
                </div>
            </div>
            
            <!-- Tabel Daftar Loket -->
            <div class="col-lg-12 mt-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Tabel Daftar Loket</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Loket</th>
                                    <th scope="col">Kode Antrean</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($allAntrean && count($allAntrean) > 0)
                                    @foreach($allAntrean as $item)
                                        <tr>
                                            <td>{{ $item->codeLoket }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                                            <td>{{ $item->updated_at->format('H:i:s') }}</td>
                                            <td>
                                                <button class="btn btn-info" onclick="event.preventDefault(); document.getElementById('ubah-form-{{ $item->id }}').submit();">Ubah</button>
                                                <form id="ubah-form-{{ $item->id }}" action="{{ route('admin.antrean.ubah', ['id' => $item->id, 'codeLoket' => request()->route('codeLoket')]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Belum ada antrean</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 mt-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Tabel Antrean Loket: {{ $codeLoket }}</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Loket</th>
                                    <th scope="col">Kode Antrean</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($filteredAntrean && count($filteredAntrean) > 0)
                                    @foreach($filteredAntrean as $item)
                                        <tr>
                                            <td>{{ $item->codeLoket }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                                            <td>{{ $item->updated_at->format('H:i:s') }}</td>
                                            <td>
                                                <button class="btn btn-warning" onclick="event.preventDefault(); if(confirm('Apakah benar telat?')) { document.getElementById('telat-form-{{ $item->id }}').submit(); }">Telat</button>
                                                <form id="telat-form-{{ $item->id }}" action="{{ route('admin.antrean.telat', $item->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <form action="{{ route('admin.antrean.destroy', $item->id) }}" class="d-inline" onsubmit="return confirm('Apakah kamu yakin menghapus antrean ini?')" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger border-0">Hapus</button>
                                                </form>
                                                <button class="btn btn-primary" onclick="event.preventDefault(); if(confirm('Apakah antrean ini sudah terlayani?')) { document.getElementById('serve-form-{{ $item->id }}').submit(); }">Terlayani</button>
                                                <form id="serve-form-{{ $item->id }}" action="{{ route('admin.antrean.serve', $item->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Belum ada antrean</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Queue Counter End -->

    <!-- CSS untuk memastikan tombol-tombol memiliki ukuran yang sama -->
    <style>
        .btn-loket {
            min-width: 100%;
            height: 100%;
        }

        #currentDateTime {
            text-align: center; /* Membuat teks berada di tengah */
            font-size: 24px; /* Ukuran font yang lebih besar */
            margin-bottom: 20px; /* Jarak bawah dari elemen sebelumnya */
        }
    </style>

    <!-- Script untuk Tanggal dan Waktu Saat Ini -->
    <script>
        function updateDateTime() {
            var now = new Date();
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('currentDate').textContent = now.toLocaleDateString('id-ID', options);
            document.getElementById('currentTime').textContent = now.toLocaleTimeString('id-ID');
        }
        updateDateTime();
        setInterval(updateDateTime, 1000); // Update setiap detik
    </script>

@endsection
