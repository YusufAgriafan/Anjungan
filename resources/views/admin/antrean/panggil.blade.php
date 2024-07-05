@extends('layouts.admin')
@section('admin_panggil', 'active')

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
            <div id="antrean">
                @include('admin.antrean.panggil_partial', [
                        'antreansByLoket' => $antreansByLoket,
                        'lokets' => $lokets, 
                        ])
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

        Pusher.logToConsole = true;

        var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: 'ap1',
            encrypted: true
        });

        var channel = pusher.subscribe('antrean-channel');
        channel.bind('events.AntreanUpdated', function(data) {
            read();
        });

        function read() {
            $.get("{{ url('update-panggil') }}", function(data, status) {
                // console.log('Data received:', data);
                $("#antrean").html(data);
            });
        }

    </script>

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
