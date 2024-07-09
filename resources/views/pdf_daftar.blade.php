<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Bukti Pendaftaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            padding: 10px; /* Padding agar muat di A6 */
        }
        .container {
            margin: 0 auto;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            border-radius: 5px;
            page-break-inside: avoid; /* Hindari pembagian halaman di dalam container */
        }
        .info-box {
            margin-bottom: 10px;
        }
        .info-title {
            font-size: 20px; /* Ukuran judul disesuaikan */
            font-weight: bold;
            margin-bottom: 5px;
            text-align: center;
        }

        .info-daftar {
            font-size: 15px; /* Ukuran judul disesuaikan */
            font-weight: bold;
            margin-bottom: 5px;
            text-align: center;
        }

        .horizontal-line {
            border-bottom: 1px solid #ddd;
            margin: 5px 0;
        }
        .table-container {
            display: table;
            width: 100%;
        }
        .table-row {
            display: table-row;
        }
        .table-cell {
            display: table-cell;
            padding: 5px 10px;
            font-size: 10px; /* Ukuran teks dalam tabel */
        }
        .form-label {
            font-weight: bold;
            text-align: left;
            padding-right: 10px;
        }
        .form-input {
            border: none;
            border-bottom: 1px solid #ccc;
            font-size: 10px; /* Ukuran input disesuaikan */
            padding: 2px;
            width: 100%;
            background: none;
        }
        p {
            font-size: 10px; /* Ukuran paragraf disesuaikan */
            margin-bottom: 5px; /* Spasi paragraf dikurangi */
            text-align: left; /* Teks rata kiri dan kanan */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="info-box">
            <div class="info-title">RS Islam Aminah Blitar</div>
            <div style="text-align: center; font-size: 0.7em;">Jl. Kenari 54 Plosokerep</div>
            <div style="text-align: center; font-size: 0.7em;">Sananwetan</div>
            <div style="text-align: center; font-size: 0.7em;">6282228815210</div>
        </div>
        <div class="horizontal-line"></div>
        <div class="info-box">
            <div class="info-daftar">BUKTI PENDAFTARAN</div>
            <div class="horizontal-line"></div>
            <div class="table-container">
                <div class="table-row">
                    <div class="table-cell form-label">Nomor Antrean:</div>
                    <div class="table-cell">
                        <input class="form-input" type="text" value="{{ $kd_antrean }}" readonly>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell form-label">Nomor Rekam Medis:</div>
                    <div class="table-cell">
                        <input class="form-input" type="text" value="{{ $no_rkm_medis }}" readonly>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell form-label">Nama         :</div>
                    <div class="table-cell">
                        <input class="form-input" type="text" value="{{ $nm_pasien }}" readonly>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell form-label">Alamat       :</div>
                    <div class="table-cell">
                        <input class="form-input" type="text" value="{{ $alamat }}" readonly>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell form-label">Cara Bayar   :</div>
                    <div class="table-cell">
                        <input class="form-input" type="text" value="{{ $metode_pembayaran }}" readonly>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell form-label">Tanggal Kunjungan:</div>
                    <div class="table-cell">
                        <input class="form-input" type="text" value="{{ $tanggal_kunjungan }}" readonly>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell form-label">Poli         :</div>
                    <div class="table-cell">
                        <input class="form-input" type="text" value="{{ $kd_poli }}" readonly>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell form-label">Dokter       :</div>
                    <div class="table-cell">
                        <input class="form-input" type="text" value="{{ $kd_dokter }}" readonly>
                    </div>
                </div>
            </div>
            <div class="horizontal-line"></div>
            <p>Terima Kasih atas kepercayaan Anda. Bawalah kartu berobat Anda dan datang 30 menit sebelumnya.
            Bawalah surat rujukan atau surat kontrol asli dan tunjukkan pada petugas di Lobby resepsionis.</p>
        </div>
    </div>
</body>
</html>