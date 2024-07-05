<div class="col-lg-12 mt-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Tabel Daftar Loket</h6>
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
                    @if($antrean && count($antrean) > 0)
                        @foreach($antrean as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                                <td>{{ $item->updated_at->format('H:i:s') }}</td>
                                <td>
                                    <button class="btn btn-success panggil-btn" data-code="{{ $item->code }}">Panggil</button>
                                    <button class="btn btn-warning" onclick="event.preventDefault(); if(confirm('Apakah benar telat?')) { document.getElementById('telat-form-{{ $item->id }}').submit(); }">Telat</button>
                                    <form id="telat-form-{{ $item->id }}" action="{{ route('admin.antrean.telat', $item->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <form action="{{ route('admin.antrean.destroy', $item->id) }}" class="d-inline" onsubmit="return confirm('Apakah kamu yakin menghapus antrean ini?')" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger border-0">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">Belum ada antrean</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>