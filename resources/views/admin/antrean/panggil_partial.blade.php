@foreach($lokets as $loket)
                <div class="col-lg-6 mt-4">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Tabel Loket {{ $loket->codeLoket }}</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Loket</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Isi tabel antrian sesuai dengan loket --}}
                                    @if(isset($antreansByLoket[$loket->codeLoket]))
                                        @foreach($antreansByLoket[$loket->codeLoket] as $antrean)
                                            <tr>
                                                <td>{{ $antrean->code }}</td>
                                                <td>{{ $antrean->updated_at->format('Y-m-d') }}</td>
                                                <td>{{ $antrean->updated_at->format('H:i:s') }}</td>
                                                <td>
                                                    <button class="btn btn-success panggil-btn" data-code="{{ $antrean->code }}">Panggil</button>
                                                    <button class="btn btn-warning" onclick="event.preventDefault(); if(confirm('Apakah benar telat?')) { document.getElementById('telat-form-{{ $antrean->id }}').submit(); }">Telat</button>
                                                    <form id="telat-form-{{ $antrean->id }}" action="{{ route('admin.antrean.telat', $antrean->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <form action="{{ route('admin.antrean.destroy', $antrean->id) }}" class="d-inline" onsubmit="return confirm('Apakah kamu yakin menghapus antrean ini?')" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger border-0">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada antrean untuk loket {{ $loket->codeLoket }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach