
  <x-modal id="vertically-centered" title="Pendaftaran Pasien Mandiri (Cara Bayar UMUM)" size="lg"  :centered="true">
    <x-slot name="body">
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </x-slot>
    <style>
      body {
        font-family: sans-serif;
      }
      .card {
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .card-header {
        background-color: #f7f7f7;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
      }
      .card-body {
        padding: 20px;
      }
      .button-group {
        display: flex;
        justify-content: center;
        margin-top: 20px;
      }
      .button {
        padding: 10px 20px;
        margin: 0 10px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      .btn-primary:active {
        background-color: #007bff !important;
        border-color: #007bff !important;
      }

      .btn-primary:active {
      background-color: #007bff !important; /* Warna biru */
      border-color: #007bff !important;
      }
      .button:disabled {
        background-color: #ccc;
      }
      .button:active {
        background-color: #007bff!important;
        color: #ffffff!important; /* add this line to set the text color to white */
      }
      .data-rekam-medik, .pilih-poli-dokter, .cetak {
        display: none;
      }
      .input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      .progress {
        width: 100%;
        height: 10px;
        background-color: #eee;
        border-radius: 5px;
        margin-top: 30px;
      }
      .info-box {
        text-align: center;
        margin-bottom: 20px;
      }
      .info-title {
        font-weight: bold;
      }
      .horizontal-line {
        border-top: 1px solid #ddd;
        margin: 20px 0;
      }
      .form-group {
        text-align: left;
        margin-bottom: 15px;
      }
      .form-label {
        font-weight: bold;
      }
      .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
    </style>

    <div class="button-group mb-5">
        <button id="btnNoRM" class="button btn btn-primary" onclick="showNoRMSection()">No. RM</button>
        <button id="btnPilihPoliDokter" class="button btn btn-primary" onclick="showPilihPoliDokterSection()" disabled>Pilih Poli dan Dokter</button>
        <button id="btnCetak" class="button btn btn-primary" onclick="showCetakSection()" disabled>Cetak</button>
    </div>
      <div class="data-rekam-medik" id="noRMSection">
        <form>
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nomorKartuBerobat" name="nomorKartuBerobat" placeholder="Nomor Kartu Berobat">
                        <label for="nomorKartuBerobat">Nomor Kartu Berobat</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" onclick="cekKartu()" type="button">Simpan Pendaftaran</button>
                </div>
            </div>
        </form>
      </div>
      <div class="pilih-poli-dokter" id="pilihPoliDokterSection">
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nomorKartuBerobat" name="nomorKartuBerobat" placeholder="Nomor Rekam Medik">
                        <label for="nomorKartuBerobat">Nomor Rekam Medik</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                        <label for="nama_lengkap">Nama Lengkap</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select id="cara_bayar" class="form-control" name="cara_bayar">
                            <option value="" selected hidden disabled>Pilih Metode Pembayaran</option>
                            <option value="A01">Umum</option>
                            <option value="A02">Sinarmas</option>
                            <option value="A03">BRI</option>
                            <option value="A04">BNI</option>
                            <option value="A05">Mandiri Inhealth</option>
                            <option value="A06">PT. Pamapersada Nusantara</option>
                            <option value="A07">Jasa Raharja</option>
                            <option value="A08">Owlexa</option>
                            <option value="A09">Admedika</option>
                            <option value="A10">Kemenkes</option>
                            <option value="A11">Micare</option>
                            <option value="BPJ">BPJS Kesehatan</option>
                          </select>
                        <label for="email">Cara Bayar</label>
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
                        <select id="kode_poli" class="form-control" name="kode_poli">
                            <option value="" selected hidden disabled>Pilih Poli</option>
                            <option value="umum">Umum</option>
                            <option value="gigi">Gigi</option>
                            <option value="mata">Mata</option>
                            <option value="anak">Anak</option>
                          </select>
                        <label for="kode_poli">Pilih Poli</label>
                    </div>
                </div>
                

                <div class="col-md-6">
                    <div class="form-floating">
                        <select id="kode_dokter" class="form-control" name="kode_dokter">
                            <option value="" selected hidden disabled>Pilih Dokter</option>
                            <option value="dr_andi">Dr. Andi</option>
                            <option value="dr_sri">Dr. Sri</option>
                            <option value="dr_budi">Dr. Budi</option>
                          </select>
                        <label for="kode_dokter">Pilih Dokter</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Masukan Alamat Lengkap" id="alamat_lengkap" name="alamat_lengkap" style="height: 150px"></textarea>
                        <label for="alamat_lengkap">Alamat Lengkap</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" onclick="submitPilihPoliDokter()" type="button">Simpan Pendaftaran</button>
                </div>
            </div>
        </form>
      </div>

      <div class="cetak" id="cetakSection">
        <h2>Cetak Bukti Daftar</h2>
        <div class="info-box">
          <div class="info-title">RS Islam Aminah Blitar</div>
          <div>Jl. Kenari 54 Plosokerep</div>
          <div>Sananwetan</div>
          <div>6282228815210</div>
        </div>
        <div class="horizontal-line"></div>
        <div class="info-box">
          <div class="info-title">BUKTI PENDAFTARAN</div>
          <div class="horizontal-line"></div>
          <div class="form-group">
            <label class="form-label" for="cetak_nomor_kartu">Nomor Kartu:</label>
            <input class="form-input" type="text" id="cetak_nomor_kartu" readonly>
          </div>
          <div class="form-group">
            <label class="form-label" for="cetak_nama">Nama:</label>
            <input class="form-input" type="text" id="cetak_nama" readonly>
          </div>
          <div class="form-group">
            <label class="form-label" for="cetak_alamat">Alamat:</label>
            <input class="form-input" type="text" id="cetak_alamat" readonly>
          </div>
          <div class="horizontal-line"></div>
          <div class="form-group">
            <label class="form-label" for="cetak_cara_bayar">Cara Bayar:</label>
            <input class="form-input" type="text" id="cetak_cara_bayar" readonly>
          </div>
          <div class="form-group">
            <label class="form-label" for="cetak_tanggal_kunjungan">Tanggal Kunjungan:</label>
            <input class="form-input" type="text" id="cetak_tanggal_kunjungan" readonly>
          </div>
          <div class="form-group">
            <label class="form-label" for="cetak_klinik">Klinik:</label>
            <input class="form-input" type="text" id="cetak_klinik" readonly>
          </div>
          <div class="form-group">
            <label class="form-label" for="cetak_dokter">Dokter:</label>
            <input class="form-input" type="text" id="cetak_dokter" readonly>
          </div>
          <p>Terima Kasih Atas kepercayaan Anda. Bawalah kartu Berobat anda dan datang 30 menit sebelumnya.</p>
          <p>Bawalah surat rujukan atau surat kontrol asli dan tunjukkan pada petugas di Lobby resepsionis.</p>
          <button class="button" onclick="window.print()">Cetak</button>
        </div>
      </div>
      <div class="progress">
        <div class="progress-bar" id="progressBar"></div>
      </div>

    <script>
      let nomorRMValid = false;
      let pilihPoliDokterValid = false;
  
      function showNoRMSection() {
        document.getElementById("noRMSection").style.display = "block";
        document.getElementById("pilihPoliDokterSection").style.display = "none";
        document.getElementById("cetakSection").style.display = "none";
        document.getElementById("progressBar").style.width = "33%";
      }
  
      function showPilihPoliDokterSection() {
        if (!nomorRMValid) {
          alert("Silakan masukkan Nomor Kartu Berobat yang valid.");
          return;
        }
        document.getElementById("noRMSection").style.display = "none";
        document.getElementById("pilihPoliDokterSection").style.display = "block";
        document.getElementById("cetakSection").style.display = "none";
        document.getElementById("progressBar").style.width = "66%";
      }
  
      function showCetakSection() {
        if (!pilihPoliDokterValid) {
          alert("Silakan lengkapi form Pilih Poli dan Dokter terlebih dahulu.");
          return;
        }
        document.getElementById("noRMSection").style.display = "none";
        document.getElementById("pilihPoliDokterSection").style.display = "none";
        document.getElementById("cetakSection").style.display = "block";
        document.getElementById("progressBar").style.width = "100%";
        
        // Mengisi nilai pada form cetak
        document.getElementById("cetak_nomor_kartu").value = document.getElementById("nomorKartuBerobat").value;
        document.getElementById("cetak_nama").value = document.getElementById("nama_lengkap").value;
        document.getElementById("cetak_alamat").value = document.getElementById("alamat_lengkap").value;
        document.getElementById("cetak_cara_bayar").value = document.getElementById("cara_bayar").value;
        document.getElementById("cetak_tanggal_kunjungan").value = document.getElementById("tanggal_kunjungan").value;
        document.getElementById("cetak_klinik").value = document.getElementById("kode_poli").options[document.getElementById("kode_poli").selectedIndex].text;
        document.getElementById("cetak_dokter").value = document.getElementById("kode_dokter").options[document.getElementById("kode_dokter").selectedIndex].text;
      }
  
      function cekKartu() {
        let nomorKartu = document.getElementById("nomorKartuBerobat").value.trim();
        if (nomorKartu !== "") {
          nomorRMValid = true;
          document.getElementById("btnPilihPoliDokter").disabled = false;
          showPilihPoliDokterSection();
        } else {
          nomorRMValid = false;
          document.getElementById("btnPilihPoliDokter").disabled = true;
        }
      }
  
      function submitPilihPoliDokter() {
        let namaLengkap = document.getElementById("nama_lengkap").value.trim();
        let alamatLengkap = document.getElementById("alamat_lengkap").value.trim();
        let tanggalKunjungan = document.getElementById("tanggal_kunjungan").value.trim();
        let caraBayar = document.getElementById("cara_bayar").value;
        let kodePoli = document.getElementById("kode_poli").value;
        let kodeDokter = document.getElementById("kode_dokter").value;
  
        if (namaLengkap !== "" && alamatLengkap !== "" && tanggalKunjungan !== "" && caraBayar !== "" && kodePoli !== "" && kodeDokter !== "") {
          pilihPoliDokterValid = true;
          document.getElementById("btnCetak").disabled = false;
          showCetakSection();
        } else {
          pilihPoliDokterValid = false;
          document.getElementById("btnCetak").disabled = true;
          alert("Semua field harus diisi.");
        }
      }
  
      showNoRMSection();
    </script>
    <x-slot name="footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </x-slot>
  </x-modal>