 <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <h1 class="h5 mb-4 text-gray-800">Edit Role</h1>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $role['id']; ?>">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control" id="role" placeholder="Enter roel" value="<?= $role['role']; ?>">
                        <small class="form-text text-danger"><?= form_error('role'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary float-right" name="edit"><i class="fas fa-edit"></i> Ubah</button>
                    <a href="<?= base_url('admin/role'); ?>" class="btn btn-success float-left"><i class="fas fa-arrow-alt-circle-left"></i> Batal</a>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->