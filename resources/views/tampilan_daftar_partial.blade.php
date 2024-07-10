<div class="table-container" id="table-container1">
    <table class="table">
        <colgroup>
            <col style="width: 50%;">
            <col style="width: 50%;">
        </colgroup>
        <thead>
            <tr>
                <th>Nama Dokter</th>
                <th>Nama Pasien</th>
            </tr>
        </thead>
    </table>
</div>

<div class="table-container table-container2" id="table-container2">
    <div class="scrolling-table">
        <table class="table">
            <colgroup>
                <col style="width: 50%;">
                <col style="width: 50%;">
            </colgroup>
            @php
                    function sensorNama($nama) {
                        $length = strlen($nama);
                        $numStars = rand(4, ceil($length / 1.5)); // Jumlah tanda bintang antara 1 dan setengah panjang nama
                        $indexes = [];
        
                        while (count($indexes) < $numStars) {
                            $index = rand(0, $length - 1);
                            if (!in_array($index, $indexes)) {
                                $indexes[] = $index;
                            }
                        }
        
                        foreach ($indexes as $index) {
                            $nama[$index] = '*';
                        }
        
                        return $nama;
                    }
                @endphp
                <tbody>
                    @foreach ($dokters as $dokter)
                        <tr>
                            <td rowspan="{{ $dokter->daftars->count() ?: 1 }}">
                                {{ $dokter->nama }}
                                <div class="poli-info">
                                    @if($dokter->poli)
                                        {{ $dokter->poli->nama_poli }}<br>
                                    @else
                                        Poliklinik tidak ditemukan<br>
                                    @endif
                                    Antrean: {{ $dokter->total_antrean }} -
                                    Terlayani: {{ $dokter->total_terlayani }} -
                                    Batal: {{ $dokter->total_batal }}
                                </div>
                            </td>
                            @forelse ($dokter->daftars as $index => $daftar)
                                @if ($index > 0) <tr> @endif
                                @if ($daftar->antrean && ($daftar->antrean->served == '1' || $daftar->antrean->cancel == '1'))
                                    <td>Antrean sudah terlayani atau dibatalkan</td>
                                @else
                                    <td>{{ sensorNama($daftar->pasien->nm_pasien) }}, <span class="large-number">( {{ $daftar->code }} )</span></td>
                                @endif
                                </tr>
                            @empty
                                <td colspan="4">Tidak ada kunjungan</td>
                            @endforelse
                    @endforeach
                </tbody>
        </table>
    </div>
</div>