<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body {
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        .page-break {
            page-break-before: always;
        }

        .logo {
            width: 80px;
            height: 80px;
            padding-left: 50px;
        }

        .sidebar-brand-text {
            margin-top: -1000px;
            text-align: center;
        }

        .nota-hr {
            margin: 1rem 0;
        }

        .nota-title {
            text-align: center;
            text-decoration: underline;
        }

        table,
        p {
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="header-cop">
            <div class="sidebar-brand-img">
                <img class="logo" src="<?= esc($image_src) ?>" alt="Logo">
            </div>
            <div class="sidebar-brand-text">
                <p>KEMENTRIAN LINGKUNGAN HIDUP DAN KEHUTANAN</p>
                <p>SEKRETARIAT JENDRAL</p>
                <p><b>PUSAT PENGENDALIAN PEMBANGUNAN EKOREGION SUMATRA</b></p>
            </div>
        </div>

        <hr class="nota-hr">

        <div>
            <p class="nota-title">NOTA DINAS</p>
            <p class="nota-number mb-5">Nomor : <?= $model['no_dinas'] ?></p>
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

        <div>
            <p><?= esc($model['deskripsi']); ?></p>
        </div>
    </div>

    <div class="page-break"></div>

    <?php if ($nota_jalan_exists) : ?>
        <div class="row">
            <div class="header-cop">
                <div class="sidebar-brand-img">
                    <img class="logo" src="<?= esc($image_src) ?>" width="100px" height="100px" alt="Logo">
                </div>
                <div class="sidebar-brand-text ms-2">
                    <p>KEMENTRIAN LINGKUNGAN HIDUP DAN KEHUTANAN</p>
                    <p>SEKRETARIAT JENDRAL</p>
                    <p><b>PUSAT PENGENDALIAN PEMBANGUNAN EKOREGION SUMATRA</b></p>
                </div>
            </div>
            <hr class="nota-hr">
            <div class="nota-header-text mb-5">
                <p class="nota-title">NOTA JALAN</p>
            </div>
            <div>
                <p>Kepada Yth.</p>
                <p><?= esc($model['kabag']) ?></p>
                <p>Perihal: <?= esc($model['hal']); ?></p>
                <p>Dengan hormat,</p>
                <p>Bersama surat ini kami informasikan bahwa akan dilakukan perjalanan dinas dengan rincian sebagai berikut:</p>
                <table>
                    <tr>
                        <td width="250px">Lokasi</td>
                        <td width="25px">:</td>
                        <td><?= esc($model['lokasi_kegiatan']); ?></td>
                    </tr>

                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>:</td>
                        <td><?= esc($dataTanggal['tgl_mulai']); ?></td>
                    </tr>

                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>:</td>
                        <td><?= esc($dataTanggal['tgl_selesai']); ?></td>
                    </tr>

                    <tr>
                        <td>Jumlah Orang</td>
                        <td>:</td>
                        <td><?= esc($model['jml_orang']); ?></td>
                    </tr>

                    <tr>
                        <td>Kebutuhan Tambahan</td>
                        <td>:</td>
                        <td><?= esc($model['tambahan']); ?></td>
                    </tr>

                    <tr>
                        <td>Supir - Mobil</td>
                        <td>:</td>
                        <td><?= esc($supir_mobil['nama_supir']) ?> - <?= esc($supir_mobil['nama_mobil']) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif; ?>

</body>

</html>