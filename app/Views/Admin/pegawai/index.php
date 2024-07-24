<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                    <a href="<?= base_url() ?>pegawai/tambah" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Tambah Data
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" style="width: 10px;">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">NIP</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Aksi</th>
                            </tr>

                            <?php $no = 1; ?>
                            <?php foreach ($model as $pegawai) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pegawai['nama']; ?></td>
                                    <td><?= $pegawai['nip']; ?></td>
                                    <td><?= $pegawai['jabatan_name']; ?></td>
                                    <td class="text-center" style="width: 120px;">
                                        <div class="d-grid gap-2 d-md-block">
                                            <a href="<?= base_url() ?>pegawai/edit/<?= $pegawai['id']; ?>" class="btn btn-warning" data-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <button class="btn btn-danger btn-delete" data-id="<?= $pegawai['id']; ?>" data-toggle="tooltip" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const mobilId = this.getAttribute('data-id');

                Swal.fire({
                    title: "Apakah anda yakin ingin menghapus data?",
                    icon: "warning",
                    showDenyButton: true,
                    confirmButtonText: "Ya, hapus!",
                    denyButtonText: `Batal`
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Data berhasil dihapus!",
                            icon: "success"
                        }).then(() => {
                            setTimeout(() => {
                                window.location.href = '<?= base_url('pegawai/delete/') ?>' + mobilId;
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
<script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('tambahSuccess')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session('tambahSuccess') ?>',
            });
        <?php elseif (session()->getFlashdata('tambahErrors')) : ?>
            Swal.fire({
                icon: 'error',
                text: '<?= session('tambahErrors') ?>',
            });
        <?php endif ?>
    });
</script>

<script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('editSuccess')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session('editSuccess') ?>',
            });
        <?php elseif (session()->getFlashdata('editErrors')) : ?>
            Swal.fire({
                icon: 'error',
                text: '<?= session('editErrors') ?>',
            });
        <?php endif ?>
    });
</script>

<?= $this->endSection(); ?>