
    @foreach($topAntrean as $codeLoket => $antreanNow)
        @if($codeLoket === 'A')
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
                        @if($antreanNow)
                            <h1 class="text-white mb-0" style="font-size: 14.4em;">{{ $antreanNow->code }}</h1>
                        @else
                            <h1 class="text-white mb-0" style="font-size: 14.5em;">-</h1>
                        @endif
                    </div>
                </div>
            </div>
        @else
            @php
                $colSize = count($topAntrean) > 5 ? 'col-lg-2' : 'col-lg-3';
            @endphp
            <div class="{{ $colSize }} col-md-6 mb-4">
                <div class="feature-item position-relative bg-primary text-center">
                    <div class="border">
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
        @endif
    @endforeach

