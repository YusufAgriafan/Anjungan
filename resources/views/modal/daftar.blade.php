
  <x-modal id="vertically-centered" title="Vertically centered" size="lg"  :centered="true">
    <x-slot name="body">
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </x-slot>
    <style>
      body {
        font-family: sans-serif;
      }
      .card {
        width: 600px;
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
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      .button:disabled {
        background-color: #ccc;
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
      .progress-bar {
        height: 100%;
        background-color: #4CAF50;
        border-radius: 5px;
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

    <div class="card">
      <div class="card-header">
        <h2>Pendaftaran Pasien Mandiri (Cara Bayar UMUM)</h2>
      </div>
      <div class="button-group">
        <button id="btnNoRM" class="button" onclick="showNoRMSection()">No. RM</button>
        <button id="btnPilihPoliDokter" class="button" onclick="showPilihPoliDokterSection()" disabled>Pilih Poli dan Dokter</button>
        <button id="btnCetak" class="button" onclick="showCetakSection()" disabled>Cetak</button>
      </div>
      <div class="card-body">
        <div class="data-rekam-medik" id="noRMSection">
          <h3>Data Rekam Medik</h3>
          <div class="label">Nomor Kartu Berobat</div>
          <input type="text" class="input" id="nomorKartuBerobat">
          <button class="button" onclick="cekKartu()">Cek Kartu</button>
        </div>
        <div class="pilih-poli-dokter" id="pilihPoliDokterSection">
          <h2>Informasi Pribadi, Klinik dan Dokter Tujuan</h2>
          <div>
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" class="input" name="nama_lengkap" placeholder="Masukan Nama Lengkap">
          </div>
          <div>
            <label for="alamat_lengkap">Alamat Lengkap:</label>
            <textarea id="alamat_lengkap" class="input" name="alamat_lengkap" placeholder="Masukan Alamat Lengkap"></textarea>
          </div>
          <div>
            <label for="cara_bayar">Cara Bayar:</label>
            <select id="cara_bayar" class="input" name="cara_bayar">
              <option value="UMUM">UMUM</option>
              <option value="BPJS">BPJS</option>
            </select>
          </div>
          <div>
            <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
            <input type="date" id="tanggal_kunjungan" class="input" name="tanggal_kunjungan">
          </div>
          <div>
            <label for="kode_poli">Kode Poli:</label>
            <select id="kode_poli" class="input" name="kode_poli">
              <option value="umum">Umum</option>
              <option value="gigi">Gigi</option>
              <option value="mata">Mata</option>
              <option value="anak">Anak</option>
            </select>
          </div>
          <div>
            <label for="kode_dokter">Kode Dokter:</label>
            <select id="kode_dokter" class="input" name="kode_dokter">
              <option value="dr_andi">Dr. Andi</option>
              <option value="dr_sri">Dr. Sri</option>
              <option value="dr_budi">Dr. Budi</option>
            </select>
          </div>
          <button class="button" onclick="submitPilihPoliDokter()">Simpan Pendaftaran</button>
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
      </div>
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