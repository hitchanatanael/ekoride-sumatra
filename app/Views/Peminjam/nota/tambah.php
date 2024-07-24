<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<form action="<?= base_url('nota_peminjam/tambah_save') ?>" method="post">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <h5 class="card-title text-dark">Keterangan Form</h5>

                    <div class="row mb-3">
                        <label for="lampiran" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors.no_dinas') ? 'is-invalid' : '' ?>" name="no_dinas">
                            <div class="invalid-feedback">
                                <?= session('errors.no_dinas') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kabag" class="col-sm-2 col-form-label">Yth.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors.kabag') ? 'is-invalid' : '' ?>" name="kabag" value="<?= $kabag['jabatan']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= session('errors.kabag') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kabag" class="col-sm-2 col-form-label">Dari</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="peminjam" value="<?= $userData['id_jabatan']; ?>">
                            <input type="text" class="form-control <?= session('errors.peminjam') ? 'is-invalid' : '' ?>" value="<?= $userData['nama_jabatan']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= session('errors.peminjam') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="hal" class="col-sm-2 col-form-label">Hal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors.hal') ? 'is-invalid' : '' ?>" name="hal">
                            <div class="invalid-feedback">
                                <?= session('errors.hal') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors.lampiran') ? 'is-invalid' : '' ?>" name="lampiran">
                            <div class="invalid-feedback">
                                <?= session('errors.lampiran') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control <?= session('errors.tgl_surat') ? 'is-invalid' : '' ?>" id="tgl_surat" name="tgl_surat" value="<?= date('Y-m-d'); ?>" readonly>
                            <div class="invalid-feedback">
                                <?= session('errors.tgl_surat') ?>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h5 class="card-title text-dark">Deskripsi Form</h5>

                    <div class="row mb-3">
                        <label for="lokasi_kegiatan" class="col-sm-2 col-form-label">Lokasi Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors.lokasi_kegiatan') ? 'is-invalid' : '' ?>" name="lokasi_kegiatan">
                            <div class="invalid-feedback">
                                <?= session('errors.lokasi_kegiatan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control <?= session('errors.tgl_mulai') ? 'is-invalid' : '' ?>" name="tgl_mulai">
                            <div class="invalid-feedback">
                                <?= session('errors.tgl_mulai') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tgl_selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control <?= session('errors.tgl_selesai') ? 'is-invalid' : '' ?>" name="tgl_selesai">
                            <div class="invalid-feedback">
                                <?= session('errors.tgl_selesai') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control <?= session('errors.deskripsi') ? 'is-invalid' : '' ?>" name="deskripsi" style="height: 100px"></textarea>
                            <div class="invalid-feedback">
                                <?= session('errors.deskripsi') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 d-flex justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Ajukan Nota Perjalanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>