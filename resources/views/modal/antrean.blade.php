{{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-lg">
    modal-lg
  </button> --}}

  <x-modal id="modal-lg" title="Antrean Loket" size="lg" :centered="true">
    <x-slot name="body">
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </x-slot>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4 d-flex justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <h1 style="font-size: 6em; text-align: center;">A1</h1>
                    <div id="currentDateTime1" class="text-center mt-3" style="font-size: 1em; padding-bottom: 20px;"></div>
                    <a href="{{ url('/generate-pdf') }}" target="_blank">
                        <div class="feature-item position-relative bg-primary text-center p-3">
                            <div class="border py-1 px-1">
                                <h1 class="text-white mb-0">Antrean Loket</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h1 style="font-size: 6em; text-align: center;">B1</h1>
                    <div id="currentDateTime2" class="text-center mt-3" style="font-size: 1em; padding-bottom: 20px;"></div>
                    <a href="{{ route('daftar') }}">
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
      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </x-slot>
  </x-modal>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var currentDateTimeElement = document.getElementById('currentDateTime1');
      var currentDate = new Date();
      var formattedDate = "[" + currentDate.getFullYear() + "-" + pad((currentDate.getMonth() + 1), 2) + "-" + pad(currentDate.getDate(), 2) + " " + pad(currentDate.getHours(), 2) + ":" + pad(currentDate.getMinutes(), 2) + "]";
      
      currentDateTimeElement.textContent = formattedDate;
    });
  
    // Function untuk memastikan dua digit angka
    function pad(num, size) {
      var s = num + "";
      while (s.length < size) s = "0" + s;
      return s;
    }
  </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      var currentDateTimeElement = document.getElementById('currentDateTime2');
      var currentDate = new Date();
      var formattedDate = "[" + currentDate.getFullYear() + "-" + pad((currentDate.getMonth() + 1), 2) + "-" + pad(currentDate.getDate(), 2) + " " + pad(currentDate.getHours(), 2) + ":" + pad(currentDate.getMinutes(), 2) + "]";
      
      currentDateTimeElement.textContent = formattedDate;
    });
  
    // Function untuk memastikan dua digit angka
    function pad(num, size) {
      var s = num + "";
      while (s.length < size) s = "0" + s;
      return s;
    }
  </script>

<script>
    function printOrDownload() {
        // Membuat AJAX request ke route yang menghasilkan PDF
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '{{ url('/generate-pdf') }}', true);
        xhr.responseType = 'blob'; // Mengambil sebagai blob (binary data)

        xhr.onload = function() {
            if (xhr.status === 200) {
                var blob = new Blob([xhr.response], { type: 'application/pdf' });
                var url = URL.createObjectURL(blob);

                // Membuka URL dalam tab baru untuk pengguna memilih print atau download
                var newTab = window.open(url, '_blank');
                newTab.focus();
            }
        };

        xhr.send();
    }
</script>