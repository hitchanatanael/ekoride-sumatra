<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Perjalan</h1>
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <?php if ($modelHistory) : ?>
                    <table class="table align-middle mb-0 bg-white">
                        <thead>
                            <tr>
                                <th>Nama Supir</th>
                                <th>Nama Mobil</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($modelHistory as $nota) : ?>
                                <tr>
                                    <td>
                                        <p class="fw-bold mb-1">
                                            <?= $nota['nama'] ?>
                                        </p>
                                    </td>

                                    <td>
                                        <p class="fw-normal mb-1">
                                            <?= $nota['nama_mobil'] ?>
                                        </p>
                                    </td>

                                    <td><?= $nota['formatted_tgl_mulai'] ?></td>

                                    <td><?= $nota['formatted_tgl_selesai'] ?></td>

                                    <td class="text-center">
                                        <?php if ($nota['status'] == 1) : ?>
                                            <span class="badge badge-large badge-success d-inline">Sedang Bertugas</span>
                                        <?php else : ?>
                                            <span class="badge badge-large badge-dark d-inline">Tidak Bertugas</span>
                                        <?php endif ?>

                                    </td>

                                    <td class="text-center">
                                        <div class="d-grid gap-2 d-md-block">
                                            <?php if ($nota['status'] == 1) : ?>
                                                <button class="btn btn-info btn-done" data-id="<?= $nota['id'] ?>">
                                                    <i class="fas fa-check-circle"></i> Selesai Dinas
                                                </button>
                                            <?php else : ?>
                                                <button class="btn btn-secondary" disabled> - </button>
                                            <?php endif ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-done');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const mobilId = this.getAttribute('data-id');

                    Swal.fire({
                        title: "Apakah dinas sudah selesai?",
                        icon: "warning",
                        showDenyButton: true,
                        confirmButtonText: "Ya",
                        denyButtonText: `Batal`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Data berhasil diubah!",
                                icon: "success"
                            }).then(() => {
                                setTimeout(() => {
                                    window.location.href = '<?= base_url('nota_pj/cek-dinas/') ?>' + mobilId;
                                }, 100);
                            });
                        } else if (result.isDenied) {
                            Swal.fire("Batal", "Data tidak jadi dihapus.", "info");
                        }
                    });
                });
            });
        });
    </script>

    <?= $this->endSection(); ?>