<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<form action="<?= base_url() ?>pegawai/edit-save/<?= $pegawai['id']; ?>" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Tambah Akun User</h5>
                        <a href="<?= base_url() ?>pegawai" class="btn btn-primary me-1"><i class="fas fa-angle-left me-2"></i>Kembali</a>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="<?= $pegawai['nama'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="nip" value="<?= $pegawai['nip'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="jabatan" name="jabatan">
                                    <option value="">--Pilih Jabatan--</option>
                                    <?php foreach ($jabatan as $jbt) : ?>
                                        <option value="<?= $jbt['id'] ?>" <?= ($pegawai['id_jabatan'] == $jbt['id']) ? 'selected' : '' ?>> <?= $jbt['jabatan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
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
</form>

<?= $this->endSection(); ?>