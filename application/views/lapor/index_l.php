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


    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Daftar Pengunjung</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="<?= base_url('lapor/tambah'); ?>" class="btn btn-primary">Tambah Pengunjung</a>
                    <a href="<?= base_url('lapor/pdf'); ?>" class="btn btn-secondary">Cetak PDF</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama Tamu</th>
                                <th>Alamat KTP</th>
                                <th>Jenis Kelamin</th>
                                <th>Tujuan Tamu</th>
                                <th>No Rumah</th>
                                <th>Rumah Kunjungan</th>
                                <th>Alamat Kunjungan</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>No Hp</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($list_lapor as $d) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d->nik; ?></td>
                                    <td><?= $d->nama; ?></td>
                                    <td><?= $d->alamat_k; ?></td>
                                    <td><?= $d->id_gender; ?></td>
                                    <td><?= $d->id_tamu; ?></td>
                                    <td><?= $d->no_rumah; ?></td>
                                    <td><?= $d->rumah_k; ?></td>
                                    <td><?= $d->a_kunjungan; ?></td>
                                    <td><?= $d->tanggal_masuk; ?></td>
                                    <td><?= $d->tanggal_keluar; ?></td>
                                    <td><?= $d->no_hp; ?></td>
                                    <td>
                                        <a href="<?= base_url('lapor/editIndex/' . $d->id); ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="<?= base_url('lapor/delete/' . $d->id); ?>" onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-sm">Delete</a>
                                        <!-- <a href="<?= base_url('lapor/pdf/' . $d->id); ?>" class="btn btn-secondary btn-sm"> Cetak PDF</a> -->
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

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