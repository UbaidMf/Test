<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_tamu">Daftar Tamu</label>
                    <input type="text" class="form-control" id="nama_tamu" name="nama_tamu">
                    <?= form_error('DaftarTamu', '<small class="text-danger">', '</small>'); ?>
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