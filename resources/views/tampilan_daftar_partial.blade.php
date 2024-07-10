            <table class="table" id="table">
                <thead style="position: sticky; top: 0; z-index: 2;">
                    <tr>
                        <th>Nama Dokter</th>
                        <th>Nama Pasien</th>
                        {{-- <th>Metode Pembayaran</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Poliklinik</th> --}}
                    </tr>
                </thead>
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
                                <td>{{ sensorNama($daftar->pasien->nm_pasien) }}, <span class="large-number">( {{ $daftar->code }} )</span></td>
                                </tr>
                            @empty
                                <td colspan="4">Tidak ada kunjungan</td>
                            @endforelse
                    @endforeach
                </tbody>
            </table>