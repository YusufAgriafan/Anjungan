@extends('layouts.admin')
@section('admin_table', 'active')

@section('content')

    <div class="navbar">
        <h2>Admin Antrian</h2>
        <ul>
            <li><a href="#loket">Antrian Loket</a></li>
            <li><a href="#cs">Antrian CS</a></li>
        </ul>
    </div>
    <div class="container">
        <div id="loket" class="content active">
            <div class="card">
                <h2>Antrian Loket</h2>
                <div class="queue-buttons"></div>
            </div>
            <div class="card">
                <h2>Tanggal dan Waktu Loket</h2>
                <div id="datetime-loket"></div>
            </div>
            <div class="card">
                <h2>Daftar Loket</h2>
                <table id="queueTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Loket</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div id="cs" class="content">
            <div class="card">
                <h2>Antrian CS</h2>
                <div class="queue-buttons-cs"></div>
            </div>
            <div class="card">
                <h2>Tanggal dan Waktu CS</h2>
                <div id="datetime-cs"></div>
            </div>
            <div class="card">
                <h2>Daftar Antrian CS</h2>
                <table id="queueTable-cs">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>CS</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Detail Antrian</h2>
            <p id="popupQueueNumber"></p>
            <p id="popupLoketCS"></p>
            <p id="popupTimeCS"></p>
            <button id="pending">Pending</button>
            <button id="delete">Hapus</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('admin/admin-script.js') }}"></script>
@endsection