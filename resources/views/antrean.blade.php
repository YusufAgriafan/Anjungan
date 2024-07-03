@extends('layouts.master1')

@section('content')
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="feature-item position-relative bg-primary text-center">
                        <h5 id="currentDate" class="text-white mb-0"></h5>
                        <h5 id="currentTime" class="text-white mb-0"></h5>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-6 mb-4">
                    <div class="abt-bg">
                        <iframe width="100%" height="355" src="https://www.youtube.com/embed/0RY8FqWRNP4?playlist=0RY8FqWRNP4&loop=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                {{-- <div class="col-lg-5 col-md-6 mb-4">
                    <div class="feature-item position-relative bg-primary text-center">
                        <div class="borde">
                            <h1 class="text-white mb-0">Loket {{ $codeLoket }}</h1>
                        </div>
                    </div>
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border">
                            @if($antreanNow)
                                <h1 class="text-white mb-0" style="font-size: 14em;">{{ $antreanNow->code }}</h1>
                            @else
                                <h1 class="text-white mb-0" style="font-size: 5em;">-</h1>
                            @endif
                        </div>
                    </div>
                </div> --}}
                <div id="read">
                    @include('antrean_partial', [
                    'antreanNow' => $antreanNow,
                    'topAntrean' => $topAntrean,
                    'codeLoket' => $codeLoket
                    ])
        
                </div>
            </div>
        </div>
        
    </div>

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

        function read(codeLoket) {
            $.get("{{ url('update-antrean') }}/" + codeLoket, {}, function(data, status) {
                $("#read").html(data);
            });
        }
    </script>

    


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
