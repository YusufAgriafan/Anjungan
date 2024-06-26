@extends('layouts.admin')
@section('admin_table', 'active')

@section('content')

    <!-- Queue Counter Start -->
    <div class="container-fluid pt-2 px-2">
        <div class="row g-4">

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
                    <div class="table-responsive">
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
                                @if($antrean && count($antrean) > 0)
                                    @foreach($antrean as $item)
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                                            <td>{{ $item->updated_at->format('H:i:s') }}</td>
                                            <td>
                                                <button class="btn btn-success panggil-btn" data-code="{{ $item->code }}">Panggil</button>
                                                <button class="btn btn-warning" onclick="event.preventDefault(); if(confirm('Apakah benar telat?')) { document.getElementById('telat-form-{{ $item->id }}').submit(); }">Telat</button>
                                                <form id="telat-form-{{ $item->id }}" action="{{ route('admin.antrean.telat', $item->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <form action="{{ route('admin.antrean.destroy', $item->id) }}" class="d-inline" onsubmit="return confirm('Apakah kamu yakin menghapus antrean ini?')" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger border-0">Hapus</button>
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

    <!-- Script untuk Suara Panggilan -->
    <script>
        let voices = [];

        document.addEventListener('DOMContentLoaded', (event) => {
            speechSynthesis.onvoiceschanged = () => {
                voices = speechSynthesis.getVoices();
                console.log('Available voices:', voices);

                const panggilButtons = document.querySelectorAll('.panggil-btn');
                panggilButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const code = this.getAttribute('data-code');
                        panggilAntrean(code);
                    });
                });
            };
        });

        function panggilAntrean(code) {
            const msg = new SpeechSynthesisUtterance();
            msg.lang = 'id-ID';
            const voice = voices.find(voice => voice.name === 'Google Bahasa Indonesia');
            if (voice) {
                msg.voice = voice;
            } else {
                console.error('Voice not found!');
            }
            msg.text = `Antrian Nomor ${code} silahkan ke loket A`;

            msg.onstart = function(event) {
                console.log('Suara dimulai:', event);
            };

            msg.onend = function(event) {
                console.log('Suara selesai:', event);
            };

            msg.onerror = function(event) {
                console.error('Error pada suara:', event);
            };

            window.speechSynthesis.speak(msg);
        }
    </script>

@endsection
