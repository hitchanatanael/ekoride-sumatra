<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nota Jalan</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nota Dinas</h6>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" style="width: 10px;">No.</th>
                                <th class="text-center">Nota</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>

                            <?php $no = 1; ?>
                            <?php foreach ($model as $nota) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $nota['hal']; ?></td>
                                    <td class="text-center" style="width: 180px;"><?= $nota['formatted_tgl_surat']; ?></td>
                                    <td class="text-center">
                                        <?php if ($nota['status'] == 'progress') : ?>
                                            <span class="badge badge-large p-2 bg-secondary">Pending</span>
                                        <?php elseif ($nota['status'] == 'approved') : ?>
                                            <span class="badge badge-large p-2 bg-success">Disetujui</span>
                                        <?php elseif ($nota['status'] == 'rejected') : ?>
                                            <span class="badge badge-large p-2 bg-danger">Ditolak</span>
                                        <?php endif; ?>

                                    </td>
                                    <td class="text-center" style="width: 120px;">
                                        <div class="d-grid gap-2 d-md-block">
                                            <a href="<?= base_url('nota_pj/view/' . $nota['id']) ?>" class="btn btn-primary position-relative" data-toggle="tooltip" title="Lihat">
                                                <i class="fas fa-eye"></i> Lihat
                                                <?php if (!$nota['baca_pj']) : ?>
                                                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>