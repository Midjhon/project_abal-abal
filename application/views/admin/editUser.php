<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Pengaturan User</h1>

   
                <!-- Nested Row within Card Body -->
                <div class="row">
            <div class="col-md-8">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $usersById['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full name.." value="<?= $usersById['name']; ?>">
                        </div>
						
						<div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email.." value="<?= $usersById['email']; ?>">
                        </div>
						
						
                        <div class="form-group">
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id']; ?>" <?php if ($usersById['role_id'] == $r['id']) {
                                                                            echo "selected";
                                                                        } ?>>
                                        <?= $r['role']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">Active?</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url('admin/users'); ?>" class="btn btn-secondary float-left"><i class="fas fa-arrow-alt-circle-left"></i> Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	
       
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->