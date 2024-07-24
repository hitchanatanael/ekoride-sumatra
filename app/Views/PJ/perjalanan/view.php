<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nota Dinas</h6>
                    <?php if ($model['status'] != 'rejected') : ?>
                        <a class="btn btn-primary" href="<?= base_url('nota_pj/tambah/' . $model['id']) ?>" type="button">
                            <i class="fas fa-plus me-1"></i>
                            Buat Nota Jalan
                        </a>
                    <?php endif ?>
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
                                    <h6 class="nota-number mb-5">Nomor : ND - 05/P3E.Sum/Bid.2/02/2024</h6>
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
                                        <td><?= esc($dataTanggal['tgl_surat']); ?></td>
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
                                        <h6 class="pb-3"><?= $model['kabag'] ?></h6>

                                        <h6 class="pb-3">Perihal : <?= $model['hal']; ?></h6>

                                        <h6>Dengan hormat,</h6>
                                        <h6 class="pb-3">Bersama surat ini kami informasikan bahwa akan dilakukan perjalanan dinas dengan rincian sebagai berikut :</h6>
                                        <div class="table-container">
                                            <table class="custom-table mb-4">
                                                <tr>
                                                    <td width=" 250px">Lokasi</td>
                                                    <td><?= $model['lokasi_kegiatan']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Tanggal Mulai</td>
                                                    <td><?= $dataTanggal['tgl_mulai']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Tanggal Selesai</td>
                                                    <td><?= $dataTanggal['tgl_selesai']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Jumlah Orang</td>
                                                    <td><?= $model['jml_orang']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Kebutuhan Tambahan</td>
                                                    <td>&nbsp;<?= $model['tambahan']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Supir - Mobil</td>
                                                    <td><?= $supir_mobil['nama_supir'] ?> - <?= $supir_mobil['nama_mobil'] ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <h6 class="pb-3">Demikian surat jalan ini kami buat untuk dapat dipergunakan sebagaimana mestinya. Terima kasih atas perhatian dan kerjasamanya.</h6>

                                        <h6 class="pb-3">Hormat Kami,</h6>
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