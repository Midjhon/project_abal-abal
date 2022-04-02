<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

   
                <!-- Nested Row within Card Body -->
                <div class="row">
				<div class="col-md-8">
					<form action="" method="post">
						<input type="hidden" name="id" value="<?= $accessMenuById['id']; ?>">
						<div class="modal-body">
							
							
							<div class="form-group">
							    <label for=""><strong>Hak Akses  </strong></label>
								<select name="role_id" id="role_id" class="form-control">
									<option value=""></option>
									<?php foreach ($role as $r) : ?>
										<option value="<?= $r['id']; ?>" <?php if ($accessMenuById['role_id'] == $r['id']) {
																				echo "selected";
																			} ?>>
											<?= $r['role']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
							    <label for=""><strong>Menu yang dapat diKelola </strong></label>
								<select name="menu_id" id="menu_id" class="form-control">
									<option value="">Select Menu</option>
									<?php foreach ($menu as $m) : ?>
										<option value="<?= $m['id']; ?>" <?php if ($accessMenuById['menu_id'] == $m['id']) {
																				echo "selected";
																			} ?>>
											<?= $m['menu']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
							
							
							<div class="modal-footer">
								<a href="<?= base_url('menu/accessmenu'); ?>" class="btn btn-secondary float-left"><i class="fas fa-arrow-alt-circle-left"></i> Batal</a>
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