<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Dashboard : <?= $userData['nama_jabatan'] ?></h1>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col ms-1">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Surat Masuk
                            </div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800"><?= $totalNota ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="far fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col ms-1">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Nota Dinas Diproses
                            </div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800"><?= $notaProgress ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col ms-1">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nota Dinas Ditolak
                            </div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800"><?= $notaReject ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('profileSuccess')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session('profileSuccess') ?>',
            });
        <?php elseif (session()->getFlashdata('profileError')) : ?>
            Swal.fire({
                icon: 'error',
                text: '<?= session('profileError') ?>',
            });
        <?php endif ?>
    });
</script>

<?= $this->endSection(); ?>