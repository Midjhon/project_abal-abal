<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail User</h1>

    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit'); ?>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $usersById['image']; ?>" class="img-thumbnail" readonly>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= $usersById['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="<?= $usersById['name']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row lg-4">
                <label for="role_id" class="col-sm-2">Hak Akses</label>
                <div class="col">
                    <select class="form-control" readonly>
                        <?php foreach($role as $r) : ?>
                            <option value="<?= $r['id']; ?>" <?php if ($usersById['role_id'] == $r['id']) {
                                                                            echo "selected";
                                                                        } ?>>
                                        <?= $r['role']; ?>
                                    </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            

            <div class="modal-footer">
                <div class="col-sm-10">
                    <a href="<?= base_url('admin/users'); ?>" class="btn btn-primary float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>

            </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->