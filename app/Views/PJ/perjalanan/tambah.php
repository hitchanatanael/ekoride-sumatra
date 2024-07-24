<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<form action="<?= base_url('nota_pj/tambah_save/' . $model['id']) ?>" method="post">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <h5 class="card-title text-dark">Keterangan Tambahan</h5>

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lokasi_kegiatan" value="<?= $model['lokasi_kegiatan'] ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_mulai" value="<?= $model['tgl_mulai'] ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_selesai" value="<?= $model['tgl_selesai'] ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Jumlah Orang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors.jml_orang') ? 'is-invalid' : '' ?>" name="jml_orang">
                            <div class="invalid-feedback">
                                <?= session('errors.jml_orang') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kebutuhan Tambahan</label>
                        <div class="col-sm-10">
                            <select class="form-select <?= session('errors.tambahan') ? 'is-invalid' : '' ?>" name="tambahan" aria-label="Default select example">
                                <option value="-" selected>-</option>
                                <option value="Membutuhkan Kursi Roda">Membutuhkan Kursi Roda</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.tambahan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Supir - Mobil</label>
                        <div class="col-sm-10">
                            <select class="form-select <?= session('errors.id_supir_mobil') ? 'is-invalid' : '' ?>" name="id_supir_mobil" aria-label="Default select example">
                                <option selected>Pilih Supir-Mobil</option>
                                <?php foreach ($supir_mobil as $value) : ?>
                                    <option value="<?= $value['id'] ?>" <?= $value['status'] == 1 ? 'disabled' : '' ?>>
                                        <?= $value['nama_supir'] ?> - <?= $value['nama_mobil'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.id_supir_mobil') ?>
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