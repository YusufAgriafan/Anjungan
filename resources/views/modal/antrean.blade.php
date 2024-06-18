

<x-modal id="modal-lg" title="Antrean Loket" size="lg" :centered="true">
    <x-slot name="body">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </x-slot>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4 d-flex justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <h1 style="font-size: 6em; text-align: center;">{{ $nextLoketCode }}</h1>
                    <div id="currentDateTime1" class="text-center mt-3" style="font-size: 1em; padding-bottom: 20px;"></div>
                    <a href="{{ route('antrean.create', ['type' => 'A']) }}" onclick="return confirmAndPrint('Apakah Anda ingin mengambil nomor antrian Loket?', '{{ $nextLoketCode }}', 'A')">
                        <div class="feature-item position-relative bg-primary text-center p-3">
                            <div class="border py-1 px-1">
                                <h1 class="text-white mb-0">Antrean Loket</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h1 style="font-size: 6em; text-align: center;">{{ $nextCsCode }}</h1>
                    <div id="currentDateTime2" class="text-center mt-3" style="font-size: 1em; padding-bottom: 20px;"></div>
                    <a href="{{ route('antrean.create', ['type' => 'B']) }}" onclick="return confirmAndPrint('Apakah Anda ingin mengambil nomor antrian CS?', '{{ $nextCsCode }}', 'B')">
                        <div class="feature-item position-relative bg-primary text-center p-3">
                            <div class="border py-1 px-1">
                                <h1 class="text-white mb-0">Antrean CS</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    </x-slot>
</x-modal>

<script>
    function confirmAndPrint(message, number, type) {
        if (confirm(message)) {
            var printWindow = window.open(`{{ route('pdf') }}?number=${number}&type=${type}`, '_blank');
            printWindow.addEventListener('load', function() {
                printWindow.print();
            });
            return true;
        } else {
            return false;
        }
    }
</script>
