

       
       

                <!-- Begin Page Content -->
                <div class="container-fluid">
				
			

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
					
					<?php if(validation_errors()) : ?>
					    <!--- pesan errornya ---->
						<div class="alert alert-danger" role="alert">
							<?= validation_errors(); ?>
						</div>
					
					<?php endif; ?> 
				
					
					<!--- pesan berhasil ---->
					<?= $this->session->flashdata('message'); ?>
					
					<!--- tabel tambahan --->
					<div class="row">
						<div class="col-lg-6">
						
						<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAccessMenuModal">Add New Access Menu</a>
						
							<table class="table table-hover">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">Role</th>
								  <th scope="col">Menu</th>
								  <th scope="col">Action</th>
								  
								</tr>
							  </thead>
							  <tbody>
								<?php $i = 1; ?> <!--- akalin biar no urutnya berurut ---->
							    <?php foreach($accessMenu as $am) : ?>
								<tr>
								  <th scope="row"><?= $i; ?></th>
								  <td><?= $am['role']; ?></td>
								  <td><?= $am['menu']; ?></td>
								  <td>
									<a class="badge badge-success" href="<?= base_url('menu/editAccessMenu/') . $am['id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                    <a class="badge badge-danger" href="<?= base_url('menu/deleteAccessMenu/') . $am['id']; ?>" onclick="return confirm('Are you sure delete this data?'); "><i class="fas fa-trash-alt"></i> Hapus</a>
								  </td>
								</tr>
								<?php $i++; ?>
								<?php endforeach; ?>
								
							  </tbody>
							</table>
						</div>
					</div>
					
					

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <!--- Modal --->
    <!--- Untuk isi dari tombol 'Add New Menu' --->
	
	<!-- Modal -->
	<div class="modal fade" id="newAccessMenuModal" tabindex="-1" role="dialog" aria-labelledby="newAccessMenuModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="newAccessMenuModallLabel">Add New Access Menu</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <!-- form -->
		  <form action="<?= base_url('menu/accessmenu'); ?>" method="post">
			  <div class="modal-body">
				 <div class="form-group">
					<select name="menu_id" id="menu_id" class="form-control">
						<option value="">Pilih Menu</option>
						<!--- LOOPING --->
						<?php foreach($menu as $m) : ?>
							<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
						<?php endforeach; ?>
					</select>
				 </div>
				 <div class="form-group">
					<select name="role_id" id="role_id" class="form-control">
						<option value="">Pilih Hak Akses</option>
						<!--- LOOPING --->
						<?php foreach($role as $r) : ?>
							<option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
						<?php endforeach; ?>
					</select>
				 </div>
				 
				
				 
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add</button>
			  </div>
		  </form>
		  <!-- end form --->
		</div>
	  </div>
	</div>