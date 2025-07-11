<form id="formEditKaryaBuku" method="POST"
    action="{{ route('portofolio.karya_buku.update_ajax', ['id' => $karyaBuku->id_karya_buku]) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Edit Karya Buku</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        @if ($role === 'ADM')
            <div class="mb-3">
                <label for="nidn" class="form-label">NIDN</label>
                <input type="text" class="form-control" id="nidn" name="nidn"
                    value="{{ optional($karyaBuku->user->profile)->nidn }}" required>
                <div class="invalid-feedback" id="error_nidn"></div>
            </div>
        @endif
        <div class="mb-3">
            <label for="judul_buku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                value="{{ $karyaBuku->judul_buku }}" required>
            <div class="invalid-feedback" id="error_judul_buku"></div>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $karyaBuku->tahun }}"
                required>
            <div class="invalid-feedback" id="error_tahun"></div>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $karyaBuku->penerbit }}"
                required>
            <div class="invalid-feedback" id="error_penerbit"></div>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $karyaBuku->isbn }}"
                required>
            <div class="invalid-feedback" id="error_isbn"></div>
        </div>
        <div class="mb-3">
            <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
            <input type="number" class="form-control" id="jumlah_halaman" name="jumlah_halaman"
                value="{{ $karyaBuku->jumlah_halaman }}" required>
            <div class="invalid-feedback" id="error_jumlah_halaman"></div>
        </div>
        <div class="mb-3">
            <label for="bukti" class="form-label">Bukti (PDF, JPG, PNG)</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <label for="bukti" class="btn btn-info mb-0">Choose File</label>
                </div>
                <input type="file" class="form-control d-none" id="bukti" name="bukti"
                    accept=".pdf,.jpg,.jpeg,.png"
                    onchange="document.getElementById('bukti_text').value = this.files[0]?.name || 'No file chosen'">
                <input type="text" class="form-control" id="bukti_text" placeholder="No file chosen" readonly>
                <div id="error_bukti" class="invalid-feedback"></div>
            </div>
            @if ($karyaBuku->bukti)
                <small class="form-text text-muted mt-1">File saat ini:
                    <a href="{{ asset('storage/portofolio/karya_buku/' . $karyaBuku->bukti) }}"
                        target="_blank">{{ $karyaBuku->bukti }}</a>
                </small>
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times me-1"></i>
            Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
    </div>
</form>
