@extends('layouts.admin')
@section('admin_table', 'active')

@section('content')

    <!-- Queue Counter Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <!-- Loket -->
            <div class="col-lg-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Loket</h6>
                    <div class="row row-cols-3 g-2">
                        @for ($i = 1; $i <= 30; $i++)
                            <div class="col mb-2">
                                <button class="btn btn-primary btn-block btn-loket">Loket {{ $i }}</button>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Waktu dan Tanggal Saat Ini</h6>
                    <div id="currentDateTime">
                        <p id="currentDate"></p>
                        <p id="currentTime"></p>
                    </div>
                </div>
            </div>

            <!-- Tabel Daftar Loket -->
            <div class="col-lg-12 mt-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Tabel Daftar Loket</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Loket</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>22 Juni 2024</td>
                                <td>10:00</td>
                                <td>
                                    <button class="btn btn-success">Panggil</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>22 Juni 2024</td>
                                <td>10:05</td>
                                <td>
                                    <button class="btn btn-success">Panggil</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>22 Juni 2024</td>
                                <td>10:10</td>
                                <td>
                                    <button class="btn btn-success">Panggil</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
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
