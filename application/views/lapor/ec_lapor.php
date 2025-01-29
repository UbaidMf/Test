<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= site_url('lapor/editIndexA/' . $lapor->id) ?>" method="post">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required="" value="<?php echo $lapor->nik ?>">
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required="" value="<?php echo $lapor->nama ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat_k">Alamat KTP</label>
                    <input type="text" class="form-control" id="alamat_k" name="alamat_k" required="" value="<?php echo $lapor->alamat_k ?>">
                    <?= form_error('alamat_k', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- <div class="form-group">
                    <label for="gender">Jenis Kelamin </label>
                    <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $lapor->gender ?>">
                    <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                </div> -->
                <div class="form-group">
                    <option value="">Jenis Kelamin</option>
                    <select name="id_gender" id="id_gender" class="form-control" required="" value="<?php echo $lapor->id_gender ?>">
                        <?php foreach ($nama_gender as $nm) : ?>
                            <option value="<?= $nm['nama_gender']; ?>"><?= $nm['nama_gender']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_gender', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <option value="">Kepentingan</option>
                    <select name="id_tamu" id="id_tamu" class="form-control" required="" value="<?php echo $lapor->id_tamu ?>">
                        <?php foreach ($nama_tamu as $nm) : ?>
                            <option value="<?= $nm['nama_tamu']; ?>"><?= $nm['nama_tamu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_tamu', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="no_rumah">No Rumah</label>
                    <input type="text" class="form-control" id="no_rumah" name="no_rumah" required="" value="<?php echo $lapor->no_rumah ?>">
                    <?= form_error('no_rumah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="rumah_k">Rumah Kunjungan</label>
                    <input type="text" class="form-control" id="rumah_k" name="rumah_k" required="" value="<?php echo $lapor->rumah_k ?>">
                    <?= form_error('rumah_k', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="a_kunjungan">Alamat Kunjungan</label>
                    <input type="text" class="form-control" id="a_kunjungan" name="a_kunjungan" required="" value="<?php echo $lapor->a_kunjungan ?>">
                    <?= form_error('a_kunjungan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required="" value="<?php echo $lapor->tanggal_masuk ?>">
                    <?= form_error('tanggal_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required="" value="<?php echo $lapor->tanggal_keluar ?>">
                    <?= form_error('tanggal_keluar', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group" class="col-lg-8">
                    <label for="no_hp">No HP Aktif</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required="" value="<?php echo $lapor->no_hp ?>">
                </div>
                <div class=" form-group">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->