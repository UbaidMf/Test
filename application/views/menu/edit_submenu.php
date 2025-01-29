<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <form action="<?= site_url('menu/editSubMenuAction/' . $user_sub_menu->id) ?>" method="post">
        <div class="row">
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group row">
                    <label for="title" class="col-sm-1 col-form-label">Title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $user_sub_menu->title ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-1 col-form-label">Menu</label>
                    <div class="col-sm-8">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m->id ?>"><?= $m->menu ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="url" class="col-sm-1 col-form-label">Url</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="url" name="url" value="<?php echo $user_sub_menu->url ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-1 col-form-label">Icon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?php echo $user_sub_menu->icon ?>">
                    </div>
                </div>
                <div class=" form-group">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->