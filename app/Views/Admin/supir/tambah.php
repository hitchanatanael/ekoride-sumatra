<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<form action="<?= base_url() ?>supir/store" method="post">
    <div class="container-fluid">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Tambah Data Supir</h5>
                        <a href="<?= base_url() ?>supir" class="btn btn-primary me-1"><i class="fas fa-angle-left me-2"></i>Kembali</a>
                    </div>
                    <!-- Card Body -->
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
                            <label for="inputNoHp" class="col-sm-2 col-form-label">No. Hp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="no_hp">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 d-flex justify-content-start">
                                <label class="col-sm-2 col-form-label"></label>
                                <button type="submit" class="btn btn-success"><i class="fas fa-plus me-2"></i>Simpan</button>
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