<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat Masuk</h1>
        <div class="d-grid gap-2 d-md-block">
            <a href="<?= base_url('surat_masuk/cetak/' . $model['id']) ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
                <i class="fas fa-download fa-sm"></i> Generate Report
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="d-grid gap-2 d-md-block">
                        <?php if ($model['status'] == 'pending') : ?>
                            <button class="btn btn-success btn-nd-acc" data-id="<?= $model['id']; ?>">
                                <i class="fas fa-check-circle"></i> Acc Nota Dinas
                            </button>
                            <button class="btn btn-danger btn-nd-reject" data-id="<?= $model['id']; ?>">
                                <i class="fas fa-times-circle"></i> Tolak
                            </button>
                        <?php endif; ?>

                        <?php if ($model['status'] == 'rejected') : ?>
                            <button class="btn btn-success btn-nd-acc" data-id="<?= $model['id']; ?>">
                                <i class="fas fa-check-circle"></i> Acc Nota Dinas
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="nota-detail">
                                <div class="header-cop d-flex align-items-center justify-content-center">
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
                        <div class="d-grid gap-2 d-md-block">
                            <?php if ($model['status'] == 'progress') : ?>
                                <button class="btn btn-success btn-nj-acc" data-id="<?= $model['id']; ?>">
                                    <i class="fas fa-check-circle"></i> Acc Nota Jalan
                                </button>
                                <button class="btn btn-danger btn-nj-reject" data-id="<?= $model['id']; ?>">
                                    <i class="fas fa-times-circle"></i> Tolak
                                </button>
                            <?php endif; ?>

                            <?php if ($model['status'] == 'rejected') : ?>
                                <button class="btn btn-success btn-nj-acc" data-id="<?= $model['id']; ?>">
                                    <i class="fas fa-check-circle"></i> Acc Nota Jalan
                                </button>
                            <?php endif; ?>
                        </div>
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

                                            <tr>
                                                <td>Supir - Mobil</td>
                                                <td>:</td>
                                                <td><?= $supir_mobil['nama_supir'] ?> - <?= $supir_mobil['nama_mobil'] ?></td>
                                            </tr>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const handleConfirmation = (buttonClass, title, url) => {
            const buttons = document.querySelectorAll(buttonClass);
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    Swal.fire({
                        title: title,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, lanjutkan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Aksi telah berhasil dilakukan.',
                                icon: 'success'
                            }).then(() => {
                                window.location.href = url + id;
                            });
                        }
                    });
                });
            });
        };

        handleConfirmation('.btn-nd-acc', 'Nota akan masuk ke proses selanjutnya, apakah anda yakin?', '<?= base_url('surat_masuk/progress/') ?>');
        handleConfirmation('.btn-nd-reject', 'Apakah Anda yakin ingin menolak Nota Dinas?', '<?= base_url('surat_masuk/rejected/') ?>');
        handleConfirmation('.btn-nj-acc', 'Apakah Anda yakin ingin menyetujui Nota Jalan?', '<?= base_url('surat_masuk/approved/') ?>');
        handleConfirmation('.btn-nj-reject', 'Apakah Anda yakin ingin menolak Nota Jalan?', '<?= base_url('surat_masuk/rejected/') ?>');
    });
</script>

<?= $this->endSection(); ?>