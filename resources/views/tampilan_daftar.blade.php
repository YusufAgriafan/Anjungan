<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kunjungan Pasien per Dokter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Kunjungan Pasien per Dokter</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Dokter</th>
                <th>Nama Pasien</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Kunjungan</th>
                <th>Poliklinik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokters as $dokter)
                <tr>
                    <td rowspan="{{ $dokter->daftars->count() ?: 1 }}">{{ $dokter->nama }}</td>
                    @forelse ($dokter->daftars as $index => $daftar)
                        @if ($index > 0) <tr> @endif
                        <td>{{ $daftar->pasien->nm_pasien }}</td>
                        <td>{{ $daftar->metode_pembayaran }}</td>
                        <td>{{ $daftar->tanggal_kunjungan }}</td>
                        <td>{{ $daftar->kd_poli }}</td>
                        </tr>
                    @empty
                        <td colspan="4">Tidak ada kunjungan</td>
                    @endforelse
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
