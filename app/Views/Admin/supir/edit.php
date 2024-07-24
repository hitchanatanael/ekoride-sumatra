<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<form action="<?= base_url() ?>supir/edit-save/<?= $supir['id']; ?>" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Tambah Data Supir</h5>
                        <a href="<?= base_url() ?>supir" class="btn btn-primary me-1"><i class="fas fa-angle-left me-2"></i>Kembali</a>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="<?= $supir['nama'] ?>">
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="inputNoHp" class="col-sm-2 col-form-label">No. Hp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="no_hp" value="<?= $supir['no_hp'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class=" col-sm-10 d-flex justify-content-start">
                                <button type="submit" class="btn btn-success"><i class="fas fa-plus me-2"></i>Ubah Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>