@foreach($topAntrean as $loketCode => $antreanNow)
    @if($loop->first) {{-- Hanya tampilkan untuk indeks pertama --}}
        <div class="col-lg-12 col-md-6 mb-4">
            <div class="feature-item position-relative bg-primary text-center mb-4">
                <h5 id="currentDate" class="text-white mb-2"></h5>
                <h5 id="currentTime" class="text-white mb-2"></h5>
            </div>
            <div class="feature-item position-relative bg-primary text-center">
                <div class="border">
                    <h3 class="text-white mb-0">Loket {{ $loketCode }}</h3>
                </div>
            </div>
            <div class="feature-item position-relative bg-primary text-center">
                <div class="border">
                    @if($antreanNow)
                        <h1 class="text-white mb-0" style="font-size: 14.4em;">{{ $antreanNow->code }}</h1>
                    @else
                        <h1 class="text-white mb-0" style="font-size: 14.5em;">-</h1>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endforeach