<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<form action="<?= base_url() ?>pegawai/tambah-save" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Tambah Data Pegawai</h5>
                        <a href="<?= base_url() ?>pegawai" class="btn btn-primary me-1"><i class="fas fa-angle-left me-2"></i>Kembali</a>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>" name="nama">
                                <div class="invalid-feedback">
                                    <?= session('errors.nama') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>" name="nip">
                                <div class="invalid-feedback">
                                    <?= session('errors.nip') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select class="form-select <?= session('errors.nama') ? 'is-invalid' : '' ?>" id="jabatan" name="jabatan">
                                    <option selected>--Pilih Jabatan--</option>
                                    <?php foreach ($jabatan as $jbt) : ?>
                                        <option value="<?= $jbt['id'] ?>"><?= $jbt['jabatan'] ?></option>
                                    <?php endforeach; ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.jabatan') ?>
                                    </div>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success"><i class="fas fa-plus me-2"></i>Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('tambahSuccess')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session('tambahSuccess') ?>',
            });
        <?php elseif (session()->getFlashdata('tambahErrors')) : ?>
            Swal.fire({
                icon: 'error',
                text: '<?= session('tambahErrors') ?>',
            });
        <?php endif ?>
    });
</script>

<?= $this->endSection(); ?>