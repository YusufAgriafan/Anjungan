@extends('layouts.master1')

@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('12defbe1e8004a6b95e9', {
        cluster: 'ap1'
        });

        var channel = pusher.subscribe('antrean-channel');
        channel.bind('antrean-updated', function(data) {
        alert(JSON.stringify(data));
        });
    </script>

    <script>
    Echo.channel('antrean-channel')
        .listen('AntreanUpdated', (e) => {
            // Perbarui daftar antrean secara real-time
            console.log(e.antrean);
            // Perbarui daftar antrean di sini
        });
    </script>

    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 mb-4">
                    <div class="abt-bg">
                        <iframe width="100%" height="402" src="https://www.youtube.com/embed/0RY8FqWRNP4?playlist=0RY8FqWRNP4&loop=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 mb-4">
                    <div class="feature-item position-relative bg-primary text-center mb-4">
                        <h5 id="currentDate" class="text-white mb-2"></h5>
                        <h5 id="currentTime" class="text-white mb-2"></h5>
                    </div>
                    <div class="feature-item position-relative bg-primary text-center">
                        <div class="border">
                            <h3 class="text-white mb-0">Loket A</h3>
                        </div>
                    </div>
                    <div class="feature-item position-relative bg-primary text-center">
                        <div class="border">
                            <h1 class="text-white mb-0" style="font-size: 14.5em;">A1</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">          
                @foreach($topAntrean as $codeLoket => $antreanNow)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-item position-relative bg-primary text-center">
                            <div class="borde">
                                <h3 class="text-white mb-0">Loket {{ $codeLoket }}</h3>
                            </div>
                        </div>
                        <div class="feature-item position-relative bg-primary text-center">
                            <div class="border">
                                @if($antreanNow)
                                    <h1 class="text-white mb-0" style="font-size: 10em;">{{ $antreanNow->code }}</h1>
                                @else
                                    <h1 class="text-white mb-0" style="font-size: 10em;">-</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach 
                </div> 
            </div>
        </div>
    </div>

    <script>
        $('.popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    </script>

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
