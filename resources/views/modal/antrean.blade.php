{{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-lg">
    modal-lg
  </button> --}}

  <x-modal id="modal-lg" title="Antrean Loket" size="lg">
    <x-slot name="body">
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </x-slot>
    <x-slot name="footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </x-slot>
  </x-modal>