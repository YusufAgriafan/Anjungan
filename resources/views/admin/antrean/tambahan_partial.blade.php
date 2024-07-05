<table class="table">
    <thead>
        <tr>
            <th scope="col">Loket</th>
            <th scope="col">Kode Antrean</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Waktu</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($allAntrean && count($allAntrean) > 0)
            @foreach($allAntrean as $item)
                <tr>
                    <td>{{ $item->codeLoket }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                    <td>{{ $item->updated_at->format('H:i:s') }}</td>
                    <td>
                        <button class="btn btn-info" onclick="event.preventDefault(); document.getElementById('ubah-form-{{ $item->id }}').submit();">Ubah</button>
                        <form id="ubah-form-{{ $item->id }}" action="{{ route('admin.antrean.ubah', ['id' => $item->id, 'codeLoket' => request()->route('codeLoket')]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
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