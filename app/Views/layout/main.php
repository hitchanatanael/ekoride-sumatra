<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title; ?></title>

    <link href="<?= base_url('css/custom.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/img/logop3e.png'); ?>" rel="icon" type="image/png">
    <link href="<?= base_url('css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <?php

    use App\Models\Nota;

    $model = new Nota();
    $nota = $model->findAll();
    $countKabag = $model->where('baca_kabag', 0)->countAllResults();
    $countPJ = $model->where(['baca_pj' => 0, 'status' => 'progress'])->countAllResults();
    ?>

</head>

<body id="page-top">
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center me-2" href="/">
                <div class="sidebar-brand-img">
                    <img src="<?= base_url('img/logop3e.png'); ?>" width="45px" height="45px" alt="">
                </div>
                <div class="sidebar-brand-text ms-2" style="font-size: 11px; text-align: left;">
                    Ekoride Sumatera
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            <?php $role = session()->get('role'); ?>

            <?php if ($role == 'admin') : ?>
                <div class="admin-menu">
                    <li class="nav-item <?= $title == 'Dashboard' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/dashboard'); ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Menu
                    </div>

                    <li class="nav-item <?= $title == 'Data Pegawai' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/pegawai'); ?>">
                            <i class="fas fa-users"></i>
                            <span>Data Pegawai</span></a>
                    </li>

                    <li class="nav-item <?= $title == 'Data Supir' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/supir'); ?>">
                            <i class="fas fa-user"></i>
                            <span>Data Supir</span></a>
                    </li>

                    <li class="nav-item <?= $title == 'Data Mobil' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/mobil'); ?>">
                            <i class="fas fa-car"></i>
                            <span>Data Mobil</span></a>
                    </li>

                    <li class="nav-item <?= $title == 'Akun User' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/users'); ?>">
                            <i class="far fa-user"></i>
                            <span>Akun User</span></a>
                    </li>
                </div>
            <?php endif ?>

            <?php if ($role == 'kabag') : ?>
                <div class="kabag-menu">
                    <li class="nav-item <?= $title == 'Dashboard Kabag' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/kabag'); ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Menu
                    </div>

                    <li class="nav-item <?= $title == 'Surat Masuk' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/surat_masuk'); ?>">
                            <i class="far fa-sticky-note"></i>
                            <span>Surat Masuk</span></a>
                    </li>
                </div>
            <?php endif ?>

            <?php if ($role == 'peminjam') : ?>
                <div class="peminjam-menu">
                    <li class="nav-item <?= $title == 'Peminjam' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/peminjam') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Menu
                    </div>

                    <li class="nav-item <?= $title == 'Buat Nota' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/nota_peminjam'); ?>">
                            <i class="far fa-sticky-note"></i>
                            <span>Buat Nota</span>
                        </a>
                    </li>
                </div>
            <?php endif ?>

            <?php if ($role == 'pj') : ?>
                <div class="pj-menu">
                    <li class="nav-item <?= $title == 'Dashboard' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/pj'); ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Menu
                    </div>

                    <li class="nav-item <?= $title == 'Nota Jalan' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/nota_pj'); ?>">
                            <i class="far fa-sticky-note"></i>
                            <span>Nota Jalan</span>
                        </a>
                    </li>

                    <li class="nav-item <?= $title == 'Riwayat Perjalanan' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('/nota_pj/riwayat'); ?>">
                            <i class="fas fa-history"></i>
                            <span>Hisory Perjalanan</span>
                        </a>
                    </li>
                </div>
            <?php endif ?>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <?php if ($role == 'kabag') : ?>
                                <a class="nav-link dropdown-toggle" href="<?= base_url('/surat_masuk'); ?>">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <?php if (isset($countKabag) && $countKabag > 0) : ?>
                                        <span class="badge badge-danger badge-counter"><?= $countKabag; ?></span>
                                    <?php endif; ?>
                                </a>
                            <?php endif ?>

                            <?php if ($role == 'pj') : ?>
                                <a class="nav-link dropdown-toggle" href="<?= base_url('/nota_pj'); ?>">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <?php if (isset($countPJ) && $countPJ > 0) : ?>
                                        <span class="badge badge-danger badge-counter"><?= $countPJ; ?></span>
                                    <?php endif; ?>
                                </a>
                            <?php endif ?>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= session()->get('nama') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('img/undraw_profile.svg'); ?>">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('profil/' . session()->get('id')) ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Untuk render main content -->
                <?= $this->renderSection('content'); ?>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        &copy; Copyright <strong><span>FATIMAH</span></strong>. All Rights Reserved
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('/login') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>