<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<form action="<?= base_url('mobil/edit-save/' . $mobil['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Tambah Data Mobil</h5>
                        <a href="<?= base_url('/mobil') ?>" class="btn btn-primary me-1"><i class="fas fa-angle-left me-2"></i>Kembali</a>
                    </div>

                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Mobil</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_mobil" value="<?= $mobil['nama_mobil']; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPlat" class="col-sm-2 col-form-label">Plat Mobil</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="plat" value="<?= $mobil['plat']; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputFotoMobil" class="col-sm-2 col-form-label">Foto Mobil</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control <?= session('errors.foto_mobil') ? 'is-invalid' : '' ?>" name="foto_mobil" id="inputFotoMobil">
                                <small class="form-text text-muted">Current file: <?= $mobil['foto_mobil']; ?></small>
                                <div class="invalid-feedback">
                                    <?= session('errors.foto_mobil') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 d-flex justify-content-start">
                                <label class="col-sm-2 col-form-label"></label>
                                <button type="submit" class="btn btn-success"><i class="fas fa-plus me-2"></i>Ubah Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>

<?= $this->endSection(); ?>