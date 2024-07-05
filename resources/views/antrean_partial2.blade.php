@foreach($topAntrean as $loketCode => $antreanNow)
    @if(!$loop->first) {{-- Jika bukan indeks pertama --}}
        @php
            $colSize = count($topAntrean) > 5 ? 'col-lg-2' : 'col-lg-3';
        @endphp
        <div class="{{ $colSize }} col-md-6 mb-4">
            <div class="feature-item position-relative bg-primary text-center">
                <div class="border">
                    <h3 class="text-white mb-0">Loket {{ $loketCode }}</h3>
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
    @endif
@endforeach