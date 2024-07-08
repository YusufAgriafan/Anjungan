<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Daftar Antrean</title>
    <!-- Menggunakan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background-color: #f8f9fa; /* Background warna abu-abu muda */
        }
        .title {
            text-align: center;
            margin: 20px 0;
            font-size: 2.5rem; /* Ukuran teks judul */
            font-weight: bold; /* Teks judul lebih tebal */
            color: #343a40; /* Warna teks abu-abu gelap */
        }
        .table-container {
            height: 80vh; /* Mengatur tinggi maksimum tabel agar full display */
            overflow: hidden; /* Mengizinkan tabel untuk scroll vertikal */
            margin: 0 auto;
            width: 95%;
            background-color: white; /* Warna background putih */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan untuk tabel */
            border-radius: 10px; /* Membulatkan sudut tabel */
            padding: 20px;
            position: relative; /* Diperlukan untuk animasi */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #dee2e6; /* Warna garis antar kotak tabel */
            transform: translateY(100%); /* Mulai dari luar kontainer */
            animation: scrollTable 20s linear infinite; /* Animasi scroll */
        }
        @keyframes scrollTable {
            0% {
                transform: translateY(100%);
            }
            100% {
                transform: translateY(-100%); /* Geser ke atas hingga habis */
            }
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
            font-size: 1.2rem; /* Ukuran teks di dalam tabel */
            font-weight: bold; /* Teks di dalam tabel lebih tebal */
            border-right: 1px solid #dee2e6; /* Garis antar kotak horizontal */
        }
        th {
            background-color: #007bff; /* Warna background header tabel biru */
            color: white; /* Warna teks header tabel putih */
            border-top: 2px solid #dee2e6; /* Garis antar kotak vertikal */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Warna background baris genap */
        }
    </style>

</head>
<body>

<div class="title">Display Daftar Antrean</div>

<div class="table-container" id="table-container">
    <table class="table" id="table">
        <thead>
            <tr>
                <th>Nama Dokter</th>
                <th>Nama Pasien</th>
                {{-- <th>Metode Pembayaran</th>
                <th>Tanggal Kunjungan</th>
                <th>Poliklinik</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($dokters as $dokter)
                <tr>
                    <td rowspan="{{ $dokter->daftars->count() ?: 1 }}">{{ $dokter->nama }}</td>
                    @forelse ($dokter->daftars as $index => $daftar)
                        @if ($index > 0) <tr> @endif
                        <td>{{ $daftar->pasien->nm_pasien }}</td>
                        {{-- <td>{{ $daftar->metode_pembayaran }}</td>
                        <td>{{ $daftar->tanggal_kunjungan }}</td>
                        <td>{{ $daftar->kd_poli }}</td> --}}
                        </tr>
                    @empty
                        <td colspan="4">Tidak ada kunjungan</td>
                    @endforelse
            @endforeach
        </tbody>
    </table>
</div>

<!-- Menggunakan Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>