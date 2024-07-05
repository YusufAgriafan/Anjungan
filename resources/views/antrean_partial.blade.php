@foreach($topAntrean as $codeLoket => $antreanNow)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="feature-item position-relative bg-primary text-center">
            <div class="borde">
                <h3 class="text-white mb-0">Loket {{ $codeLoket }}</h3>
            </div>
        </div>
        <div class="feature-item position-relative bg-primary text-center">
            <div class="border">
                @if($antreanNow)
                    <h1 class="text-white mb-0" style="font-size: 11em;">{{ $antreanNow->code }}</h1>
                @else
                    <h1 class="text-white mb-0" style="font-size: 11em;">-</h1>
                @endif
                            </div>
                        </div>
                    </div>
                @endforeach 