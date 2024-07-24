<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<form action="<?= base_url('mobil/store') ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Tambah Data Mobil</h5>
                        <a href="<?= base_url() ?>mobil" class="btn btn-primary me-1"><i class="fas fa-angle-left me-2"></i>Kembali</a>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Mobil</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= session('errors.nama_mobil') ? 'is-invalid' : '' ?>" name="nama_mobil" value="<?= old('nama_mobil') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nama_mobil') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPlat" class="col-sm-2 col-form-label">Plat Mobil</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= session('errors.plat') ? 'is-invalid' : '' ?>" name="plat" value="<?= old('plat') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.plat') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputFotoMobil" class="col-sm-2 col-form-label">Foto Mobil</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control <?= session('errors.foto_mobil') ? 'is-invalid' : '' ?>" name="foto_mobil">
                                <div class="invalid-feedback">
                                    <?= session('errors.foto_mobil') ?>
                                </div>
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