<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Bukti Pendaftaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            padding: 10px; /* Padding agar muat di A7 */
        }
        .container {
            margin: 0 auto;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            border-radius: auto;
            page-break-inside: avoid; /* Hindari pembagian halaman di dalam container */
        }
        .info-box {
            margin-bottom: 10px;
        }
        .info-title {
            font-size: 12px; /* Ukuran judul disesuaikan */
            font-weight: bold;
            margin-bottom: 5px;
            text-align: center;
        }
        .horizontal-line {
            border-bottom: 1px solid #ddd;
            margin: 5px 0;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px; /* Spasi antar form group dikurangi */
        }
        .form-label {
            font-weight: bold;
            margin-right: 10px;
            font-size: 10px; /* Ukuran label disesuaikan */
            flex: 1;
            text-align: right;
        }
        .form-input {
            flex: 2;
            padding: 5px;
            font-size: 10px; /* Ukuran input disesuaikan */
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        p {
            font-size: 10px; /* Ukuran paragraf disesuaikan */
            margin-bottom: 5px; /* Spasi paragraf dikurangi */
            text-align: justify; /* Teks rata kiri dan kanan */
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
                <label class="form-label" for="cetak_nomor_kartu">Nomor Kartu:</label>
                <input class="form-input" type="text" id="cetak_nomor_kartu" value="1234567890" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_nama">Nama:</label>
                <input class="form-input" type="text" id="cetak_nama" value="John Doe" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_alamat">Alamat:</label>
                <input class="form-input" type="text" id="cetak_alamat" value="Jl. Merdeka No. 123" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_cara_bayar">Cara Bayar:</label>
                <input class="form-input" type="text" id="cetak_cara_bayar" value="Tunai" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_tanggal_kunjungan">Tanggal Kunjungan:</label>
                <input class="form-input" type="text" id="cetak_tanggal_kunjungan" value="2024-06-30" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_klinik">Klinik:</label>
                <input class="form-input" type="text" id="cetak_klinik" value="Klinik Umum" readonly>
            </div>
            <div class="form-group">
                <label class="form-label" for="cetak_dokter">Dokter:</label>
                <input class="form-input" type="text" id="cetak_dokter" value="Dr. Smith" readonly>
            </div>
            <div class="horizontal-line"></div>
            <p>Terima Kasih atas kepercayaan Anda. Bawalah kartu berobat Anda dan datang 30 menit sebelumnya.
            Bawalah surat rujukan atau surat kontrol asli dan tunjukkan pada petugas di Lobby resepsionis.</p>
        </div>
    </div>
</body>
</html>
