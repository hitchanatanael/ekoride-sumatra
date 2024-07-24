<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Nota</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Nota Dinas</h6>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="nota-detail">
                                <div class="header-cop d-flex align-items-center justify-content-center" href="/">
                                    <div class="sidebar-brand-img pb-3">
                                        <img src="<?= base_url(); ?>../assets/img/logo_klhk.png" width="100px" height="100px" alt="">
                                    </div>
                                    <div class="sidebar-brand-text ms-2" style="text-align: center;">
                                        <h6>KEMENTRIAN LINGKUNGAN HIDUP DAN KEHUTANAN</h6>
                                        <h6>SEKRETARIAT JENDRAL</h6>
                                        <h6><b>PUSAT PENGENDALIAN PEMBANGUNAN EKOREGION SUMATRA</b></h6>
                                    </div>
                                </div>

                                <hr class="nota-hr">

                                <div class="nota-header-text">
                                    <u class="nota-title">NOTA DINAS</u>
                                    <h6 class="nota-number mb-5">Nomor : <?= $model['no_dinas'] ?></h6>
                                </div>

                                <table>
                                    <tr>
                                        <td width="160px">Yth.</td>
                                        <td width="20px">:</td>
                                        <td><?= esc($model['kabag']); ?></td>
                                    </tr>

                                    <tr>
                                        <td>Dari</td>
                                        <td>:</td>
                                        <td><?= esc($model['jabatan_name']); ?></td>
                                    </tr>

                                    <tr>
                                        <td>Hal</td>
                                        <td>:</td>
                                        <td><?= esc($model['hal']); ?></td>
                                    </tr>

                                    <tr>
                                        <td>Lampiran</td>
                                        <td>:</td>
                                        <td><?= esc($model['lampiran']); ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td><?= esc($model['tgl_surat']); ?></td>
                                    </tr>
                                </table>

                                <hr class="nota-hr">

                                <div class="nota-body-text">
                                    <p><?= esc($model['deskripsi']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($nota_jalan_exists) : ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Nota Jalan</h6>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="nota-detail">
                                    <div class="header-cop d-flex align-items-center justify-content-center" href="/">
                                        <div class="sidebar-brand-img pb-3">
                                            <img src="<?= base_url(); ?>../assets/img/logo_klhk.png" width="100px" height="100px" alt="">
                                        </div>
                                        <div class="sidebar-brand-text ms-2" style="text-align: center;">
                                            <h6>KEMENTRIAN LINGKUNGAN HIDUP DAN KEHUTANAN</h6>
                                            <h6>SEKRETARIAT JENDRAL</h6>
                                            <h6><b>PUSAT PENGENDALIAN PEMBANGUNAN EKOREGION SUMATRA</b></h6>
                                        </div>
                                    </div>

                                    <hr class="nota-hr">

                                    <div class="nota-header-text mb-5">
                                        <u class="nota-title">NOTA JALAN</u>
                                    </div>

                                    <div class="nota-body-text">
                                        <h6>Kepada Yth.</h6>
                                        <h6><?= $model['kabag'] ?></h6>

                                        <h6>Perihal: <?= $model['hal']; ?></h6>
                                        <h6>Dengan hormat,</h6>
                                        <h6>Bersama surat ini kami informasikan bahwa akan dilakukan perjalanan dinas dengan rincian sebagai berikut:</h6>
                                        <table>
                                            <tr>
                                                <td width="250px">Lokasi</td>
                                                <td width="25px">:</td>
                                                <td><?= $model['lokasi_kegiatan']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Tanggal Mulai</td>
                                                <td>:</td>
                                                <td><?= $dataTanggal['tgl_mulai']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Tanggal Selesai</td>
                                                <td>:</td>
                                                <td><?= $dataTanggal['tgl_selesai']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Jumlah Orang</td>
                                                <td>:</td>
                                                <td><?= $model['jml_orang']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Kebutuhan Tambahan</td>
                                                <td>:</td>
                                                <td><?= $model['tambahan']; ?></td>
                                            </tr>

                                            <?php if (!empty($supir_mobil)) : ?>
                                                <tr>
                                                    <td>Supir - Mobil</td>
                                                    <td>:</td>
                                                    <td><?= $supir_mobil['nama_supir'] ?> - <?= $supir_mobil['nama_mobil'] ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>