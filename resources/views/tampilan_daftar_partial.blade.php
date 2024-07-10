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
                
            </table>