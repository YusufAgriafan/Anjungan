@extends('layouts.master1')

@section('content')

    <div class="abt-section mb-150">
		<div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 mb-4">
                    <div class="feature-item position-relative bg-primary text-center">
                        <h5 id="currentDate" class="text-white mb-0"></h5>
                        <h5 id="currentTime" class="text-white mb-0"></h5>                        
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-lg-7 col-md-6 ">
					<div class="abt-bg">
                        <iframe width="650" height="355" src="https://www.youtube.com/embed/0RY8FqWRNP4?playlist=0RY8FqWRNP4&loop=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
                @foreach($topAntrean as $codeLoket => $antreanNow)
                    <div class="col-lg-5 col-md-6 mb-4">
                        <div class="feature-item position-relative bg-primary text-center">
                            <div class="borde">
                                <h1 class="text-white mb-0">Loket {{ $codeLoket }}</h1>
                            </div>
                        </div>
                        <div class="feature-item position-relative bg-primary text-center p-3">
                            <div class="border">
                                @if($antreanNow)
                                    <h1 class="text-white mb-0" style="font-size: 5em;">{{ $antreanNow->code }}</h1>
                                @else
                                    <h1 class="text-white mb-0" style="font-size: 5em;">-</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach


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