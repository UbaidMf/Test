<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <?= $this->session->flashdata('message'); ?> -->
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="form-group" class="col-lg-8">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" id="role" name="role" required="">
                    <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
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