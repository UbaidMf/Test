<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('lapor/lapor_action'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required="">
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required="">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat_k">Alamat KTP</label>
                    <input type="text" class="form-control" id="alamat_k" name="alamat_k" required="">
                    <?= form_error('alamat_k', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- <div class="form-group">
                    <label for="gender">Jenis Kelamin </label>
                    <input type="text" class="form-control" id="gender" name="gender">
                    <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                </div> -->
                <div class="form-group">
                    <option value="">Jenis Kelamin</option>
                    <select name="id_gender" id="id_gender" class="form-control" required="">
                        <?php foreach ($nama_gender as $ng) : ?>
                            <option value="<?= $ng['nama_gender']; ?>"><?= $ng['nama_gender']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_tamu', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <option value="">Kepentingan</option>
                    <select name="id_tamu" id="id_tamu" class="form-control" required="">
                        <?php foreach ($nama_tamu as $nm) : ?>
                            <option value="<?= $nm['nama_tamu']; ?>"><?= $nm['nama_tamu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_tamu', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="no_rumah">No Rumah</label>
                    <input type="text" class="form-control" id="no_rumah" name="no_rumah" required="">
                    <?= form_error('no_rumah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="rumah_k">Rumah Kunjungan</label>
                    <input type="text" class="form-control" id="rumah_k" name="rumah_k" required="">
                    <?= form_error('rumah_k', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="a_kunjungan">Alamat Kunjungan</label>
                    <input type="text" class="form-control" id="a_kunjungan" name="a_kunjungan" required="">
                    <?= form_error('a_kunjungan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                    <?= form_error('tanggal_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar">
                    <?= form_error('tanggal_keluar', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group" class="col-lg-8">
                    <label for="no_hp">No HP Aktif</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->