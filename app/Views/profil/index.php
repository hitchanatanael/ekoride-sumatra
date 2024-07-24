<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="<?= base_url('img/undraw_profile.svg') ?>" alt="Profile" width="180px" class="rounded-circle mb-4">

                    <h4><?= $userData['nama'] ?></h4>
                    <h5><?= $userData['nama_jabatan'] ?></h5>
                </div>
            </div>
        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title"><b>Profile Details</b></h5>

                            <form action="<?= base_url('ubah_data/' . $userData['id']) ?>" method="post">
                                <div class="row mb-3">
                                    <label for="kabag" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= session('errors.kabag') ? 'is-invalid' : '' ?>" name="nama" value="<?= $userData['nama']; ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.kabag') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="kabag" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= session('errors.kabag') ? 'is-invalid' : '' ?>" name="email" value="<?= $userData['email']; ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.kabag') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="kabag" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="row mb-3 d-flex justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Ubah Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>