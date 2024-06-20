

<x-modal id="kontrol" title="Cetak Surat Kontrol" size="lg" :centered="true">
    <x-slot name="body">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </x-slot>
    <form>
        <div class="row g-3">
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nomorKartuBerobat" name="nomorKartuBerobat" placeholder="Nomor Kartu Berobat">
                    <label for="nomorKartuBerobat">Nomor Kartu Berobat</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <select id="kode_poli" class="form-control" name="kode_poli">
                        <option value="" selected hidden disabled>Pilih Poli</option>
                        <option value="IGDK">Unit IGD</option>
                        <option value="U0001">Poli Umum</option>
                        <option value="U0002">Poli Anak</option>
                        <option value="U0003">Poli Obgyn</option>
                        <option value="U0004">Poli Bedah</option>
                        <option value="U0005">Poli Mata</option>
                        <option value="U0006">Poli Gigi</option>
                        <option value="U0007">Poli Penyakit Dalam</option>
                        <option value="U0008">Poli Orthopedi</option>
                        <option value="U0009">Poli Syaraf</option>
                        <option value="U0010">Poli Paru</option>
                        <option value="U0011">Poli Kulit &amp; Kelamin</option>
                        <option value="U0012">Radiologi</option>
                        <option value="U0013">Laboratorium</option>
                        <option value="U0015">Rehab Medik</option>
                        <option value="U0016">Gizi</option>
                        <option value="U0017">Mom`s Care</option>
                        <option value="U0018">Poli Nyeri</option>
                        <option value="U0019">TeleMedicine</option>
                        <option value="U0020">Poli Andrologi</option>
                        <option value="U0021">Rehab Medik</option>
                        <option value="U0022">Farmasi</option>
                        <option value="U0023">Home Visite</option>
                        <option value="U0024">Home Care</option>
                        <option value="U0025">Poli Jantung</option>
                        <option value="U0026">Poli THT</option>
                        <option value="U0027">Poli Neurologi</option>
                      </select>
                    <label for="kode_poli">Pilih Poli</label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" onclick="cekKartu()" type="button">Cek Surat Kontrol</button>
            </div>
        </div>
    </form>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    </x-slot>
</x-modal>