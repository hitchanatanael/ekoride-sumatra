<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<form action="<?= base_url('users/edit-save/' . $user['id']) ?>" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Edit Akun User</h5>
                        <a href="<?= base_url() ?>users" class="btn btn-primary me-1"><i class="fas fa-angle-left me-2"></i>Kembali</a>
                    </div>

                    <div class="card-body">

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php foreach (session()->getFlashdata('error') as $err) : ?>
                                    <p><?= $err ?></p>
                                <?php endforeach; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="jabatan" name="jabatan">
                                    <?php foreach ($jabatans as $jabatan) : ?>
                                        <option value="<?= $jabatan['id'] ?>" <?= ($user['id_jabatan'] == $jabatan['id']) ? 'selected' : '' ?>><?= $jabatan['jabatan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJabatan" class="col-sm-2 col-form-label">Role Sistem</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="role" name="role">
                                    <?php foreach ($roles as $role) : ?>
                                        <option value="<?= $role['id'] ?>" <?= ($user['role_id'] == $role['id']) ? 'selected' : '' ?>><?= $role['role'] ?></option>
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