<!-- Begin Page Content -->
<div class="container-fluid">
    <?php

    if (!empty($this->session->flashdata('message'))) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> <?= $this->session->flashdata('message'); ?>
        </div>
    <?php
    }

    ?>
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->


    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Jenis Tamu</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDaftarTamuModal">Tambah Jenis Tamu</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Daftar Tamu</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($nama_tamu as $nk) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $nk['nama_tamu']; ?></td>
                                    <td>
                                        <a href="<?= base_url('DaftarTamu/editIndex/') . $nk['id_tamu']; ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="<?= base_url('DaftarTamu/deleteIndex/') . $nk['id_tamu']; ?>" onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newDaftarTamuModal" tabindex="-1" aria-labelledby="newDaftarTamuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="newDaftarTamuModalLabel">Tambah Jenis Tamu</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('DaftarTamu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" placeholder="Nama tamu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>