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
        .table-container, .table-container2 {
            margin: 0 auto;
            width: 95%;
            background-color: white; /* Warna background putih */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan untuk tabel */
            border-radius: 3px; /* Membulatkan sudut tabel */
            padding: 10px;
        }
        .table-container {
            margin-bottom: 0; /* Menghilangkan margin bawah tabel pertama */
        }
        .table-container2 {
            height: 80vh; /* Mengatur tinggi maksimum tabel agar full display */
            overflow: hidden; /* Mengizinkan tabel untuk scroll vertikal */
            position: relative;
            margin-top: 0; /* Menghilangkan margin atas tabel kedua */
        }
        .scrolling-table {
            animation: scrollTable 20s linear infinite;
            transform: translateY(100%);
        }
        @keyframes scrollTable {
            0% {
                transform: translateY(100%);
            }
            100% {
                transform: translateY(-100%);
            }
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 3px solid #dee2e6; /* Warna garis antar kotak tabel */
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
            position: sticky; /* Header tetap di atas saat scroll */
            top: 0;
            z-index: 2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Warna background baris genap */
        }
        .large-number {
            font-size: 2rem; /* Ukuran teks yang lebih besar */
            font-weight: bold; /* Teks lebih tebal */
            color: #007bff; /* Warna teks biru */
        }
    </style>
</head>
<body>

<div class="title">Display Daftar Antrean</div>
    <div id="antrean">
        @include('tampilan_daftar_partial', [
            'dokters' => $dokters
        ])
    </div>

<!-- Menggunakan Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        $(document).ready(function() {
            read()
        });

        Pusher.logToConsole = true;

        var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: 'ap1',
            encrypted: true
        });

        var channel = pusher.subscribe('antrean-channel');
        channel.bind('events.AntreanUpdated', function(data) {
            // alert(data.message);
            read();
        });

        function read() {
            $.get("{{ url('update-tampilan') }}", function(data, status) {
                // console.log('Data received:', data);
                $("#antrean").html(data);
            });
        }
    </script>
</body>
</html>