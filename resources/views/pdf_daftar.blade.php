<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Bukti Pendaftaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        .info-box {
            margin-bottom: 20px;
        }
        .info-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }
        .horizontal-line {
            border-bottom: 1px solid #ddd;
            margin: 10px 0;
        }
        .form-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .form-label {
            flex: 1;
            font-weight: bold;
            margin-right: 10px;
        }
        .form-input {
            flex: 2;
            width: 100%;
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="info-box">
            <div class="info-title">RS Islam Aminah Blitar</div>
            <div style="text-align: center;">Jl. Kenari 54 Plosokerep</div>
            <div style="text-align: center;">Sananwetan</div>
            <div style="text-align: center;">6282228815210</div>
        </div>
        <div class="horizontal-line"></div>
        <div class="info-box">
            <div class="info-title">BUKTI PENDAFTARAN</div>
            <div class="horizontal-line"></div>
            <div class="form-group">
                <label class="form-label" for="cetak_nomor_kartu">Nomor Rekam Medis:</label>
                <input class="form-input" type="text" id="cetak_nomor_kartu" value="{{ $no_rkm_medis }}" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_nama">Nama:</label>
                <input class="form-input" type="text" id="cetak_nama" value="{{ $nm_pasien }}" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_alamat">Alamat:</label>
                <input class="form-input" type="text" id="cetak_alamat" value="{{ $alamat }}" readonly>
            </div>
            <div class="horizontal-line"></div>
            <div class="form-group">
                <label class="form-label" for="cetak_cara_bayar">Cara Bayar:</label>
                <input class="form-input" type="text" id="cetak_cara_bayar" value="{{ $metode_pembayaran }}" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_tanggal_kunjungan">Tanggal Kunjungan:</label>
                <input class="form-input" type="text" id="cetak_tanggal_kunjungan" value="{{ $tanggal_kunjungan }}" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_poli">Poli:</label>
                <input class="form-input" type="text" id="cetak_poli" value="{{ $kd_poli }}" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_dokter">Dokter:</label>
                <input class="form-input" type="text" id="cetak_dokter" value="{{ $kd_dokter }}" readonly>
            </div>
            <br>
            <p style="text-align: center;">Terima Kasih Atas kepercayaan Anda. Bawalah kartu Berobat anda dan datang 30 menit sebelumnya.</p>
            <p style="text-align: center;">Bawalah surat rujukan atau surat kontrol asli dan tunjukkan pada petugas di Lobby resepsionis.</p>
        </div>
    </div>
</body>
</html>
