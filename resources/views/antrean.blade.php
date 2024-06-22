@extends('layouts.master1')

@section('content')

    <div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 ps-1">
					<div class="abt-bg">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/0RY8FqWRNP4?playlist=0RY8FqWRNP4&loop=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
                @foreach($pendingAntreans as $antrean)
                    <div class="col-lg-6 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="feature-item position-relative bg-primary text-center p-3">
                            <div class="border py-5 px-3">
                                <h1 class="text-white mb-0" style="font-size: 10em;">{{ $antrean->code }}</h1>
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

@endsection