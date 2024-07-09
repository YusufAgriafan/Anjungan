<x-modal id="daftar" title="Pendaftaran Pasien Mandiri (Cara Bayar UMUM)" size="lg" :centered="true">
  <x-slot name="body">
    
  </x-slot>

  <style>
    body { font-family: sans-serif; }
    .card { margin: 40px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
    .card-header { background-color: #f7f7f7; padding: 10px; border-bottom: 1px solid #ddd; text-align: center; }
    .card-body { padding: 20px; }
    .button-group { display: flex; justify-content: center; margin-top: 20px; }
    .button { padding: 10px 20px; margin: 0 10px; color: white; border: none; border-radius: 5px; cursor: pointer; }
    .btn-primary:active { background-color: #007bff !important; border-color: #007bff !important; }
    .button:disabled { background-color: #ccc; }
    .button:active { background-color: #007bff!important; color: #ffffff!important; }
    .data-rekam-medik, .pilih-poli-dokter, .cetak { display: none; }
    .input { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; }
    .progress { width: 100%; height: 10px; background-color: #eee; border-radius: 5px; margin-top: 30px; }
    .info-box { text-align: center; margin-bottom: 20px; }
    .info-title { font-weight: bold; }
    .horizontal-line { border-top: 1px solid #ddd; margin: 20px 0; }
    .form-group { text-align: left; margin-bottom: 15px; }
    .form-label { font-weight: bold; }
    .form-input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
  </style>

  <div class="button-group mb-5">
      <button id="btnNoRM" class="button btn btn-primary" onclick="showNoRMSection()">No. RM</button>
      <button id="btnPilihPoliDokter" class="button btn btn-primary" onclick="showPilihPoliDokterSection()" disabled>Pilih Poli dan Dokter</button>
  </div>
  
  <div class="data-rekam-medik" id="noRMSection">
    <form>
        <div class="row g-3">
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="no_kartu_berobat" name="no_kartu_berobat" placeholder="Nomor Kartu Berobat">
                    <label for="no_kartu_berobat">Nomor Kartu Berobat</label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" onclick="cekKartu()" type="button">Cek Kartu Berobat</button>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        function cekKartu() {
            var no_kartu_berobat = $('#no_kartu_berobat').val();
            $.ajax({
                url: '{{ route("cek.kartu.berobat") }}',
                type: 'GET',
                data: { no_kartu_berobat: no_kartu_berobat },
                success: function(response) {
                    if (response.exists) {
                        $('#pilihPoliDokterSection').show();
                        $('#noRMSection').hide();
                        document.getElementById("btnPilihPoliDokter").disabled = false;
                        document.getElementById("progressBar").style.width = "100%";
                    } else {
                        alert('Nomor Kartu Berobat tidak ditemukan');
                    }
                }
            });
        }
        </script>
    </form>
  </div>
  
  <div class="pilih-poli-dokter" id="pilihPoliDokterSection">
    <form>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="no_rkm_medis" name="no_rkm_medis" placeholder="Nomor Rekam Medik">
                    <label for="no_rkm_medis">Nomor Rekam Medik</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nm_pasien" name="nm_pasien" placeholder="Nama Lengkap">
                    <label for="nm_pasien">Nama Lengkap</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="kd_antrean" name="kd_antrean" placeholder="Kode Antrean">
                    <label for="kd_antrean">Kode Antrean</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <select id="metode_pembayaran" class="form-control" name="metode_pembayaran">
                        <option value="" selected hidden disabled>Pilih Metode Pembayaran</option>
                            <option value="Umum">Umum</option>
                            <option value="Sinarmas">Sinarmas</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="Mandiri Inhealth">Mandiri Inhealth</option>
                            <option value="PT. Pamapersada Nusantara">PT. Pamapersada Nusantara</option>
                            <option value="Jasa Raharja">Jasa Raharja</option>
                            <option value="Owlexa">Owlexa</option>
                            <option value="Admedika">Admedika</option>
                            <option value="Kemenkes">Kemenkes</option>
                            <option value="Micare">Micare</option>
                            <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                        <!-- Add other options as needed -->
                    </select>
                    <label for="metode_pembayaran">Cara Bayar</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan">
                    <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <select id="kd_poli" class="form-control" name="kd_poli">
                        <option value="" selected hidden disabled>Pilih Poli</option>
                        @foreach ($polis as $poli)
                            <option value="{{ $poli->kd_poli }}">{{ $poli->nama_poli }}</option>
                        @endforeach
                    </select>
                    <label for="kd_poli">Pilih Poli</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <select id="kd_dokter" class="form-control" name="kd_dokter">
                        <option value="" selected hidden disabled>Pilih Poliklinik kemudian Pilih Dokter</option>
                        @foreach ($dokters as $dokter)
                            <option value="{{ $dokter->id }}" data-kd-poli="{{ $dokter->kd_poli }}">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                    <label for="kd_dokter">Pilih Dokter</label>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#kd_poli').on('change', function() {
                        var selectedPoli = $(this).val();
                        $('#kd_dokter option').each(function() {
                            var dokterPoli = $(this).data('kd-poli');
                            if (selectedPoli === dokterPoli || dokterPoli === undefined) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        });
                        // Set the first visible option as selected
                        $('#kd_dokter').val($('#kd_dokter option:visible:first').val());
                    });

                    // Trigger change event to filter doctors on page load if kd_poli is pre-selected
                    $('#kd_poli').trigger('change');
                });
            </script>

            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Masukan Alamat Lengkap" id="alamat" name="alamat" style="height: 100px"></textarea>
                    <label for="alamat">Alamat Lengkap</label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" onclick="submitPilihPoliDokter()" type="button">Simpan Pendaftaran</button>
            </div>
        </div>
    </form>
  </div>
  
  <div class="progress">
    <div class="progress-bar" id="progressBar"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function submitPilihPoliDokter() {
        if (confirm("Apakah Anda yakin ingin menyimpan pendaftaran ini?")) {
            var formData = {
                no_rkm_medis: $('#no_rkm_medis').val().trim(),
                nm_pasien: $('#nm_pasien').val().trim(),
                kd_antrean: $('#kd_antrean').val().trim(),
                metode_pembayaran: $('#metode_pembayaran').val(),
                tanggal_kunjungan: $('#tanggal_kunjungan').val(),
                kd_poli: $('#kd_poli').val(),
                kd_dokter: $('#kd_dokter').val(),
                alamat: $('#alamat').val().trim()
            };

            $.ajax({
                url: '{{ route("simpan.daftar") }}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        alert('Pendaftaran berhasil disimpan');
                        var printWindow = window.open(`{{ route('daftar.pdf') }}?no_rkm_medis=${formData.no_rkm_medis}&nm_pasien=${formData.nm_pasien}&kd_antrean=${formData.kd_antrean}&metode_pembayaran=${formData.metode_pembayaran}&tanggal_kunjungan=${formData.tanggal_kunjungan}&kd_poli=${formData.kd_poli}&kd_dokter=${formData.kd_dokter}&alamat=${formData.alamat}`, '_blank');
                        printWindow.addEventListener('load', function() {
                            printWindow.print();
                        });
                    } else {
                        alert('Pendaftaran gagal disimpan: ' + response.error);
                    }
                },
                error: function (xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        }
    }

    function showNoRMSection() {
        document.getElementById("noRMSection").style.display = "block";
        document.getElementById("pilihPoliDokterSection").style.display = "none";
        document.getElementById("progressBar").style.width = "50%";
    }

    function showPilihPoliDokterSection() {
        document.getElementById("noRMSection").style.display = "none";
        document.getElementById("pilihPoliDokterSection").style.display = "block";
        document.getElementById("progressBar").style.width = "100%";
    }

    showNoRMSection();
  </script>

  <x-slot name="footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
  </x-slot>
</x-modal>
