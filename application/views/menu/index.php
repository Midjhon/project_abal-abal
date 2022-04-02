

       
       

                <!-- Begin Page Content -->
                <div class="container-fluid">
				
			

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
					
					<!--- pesan errornya ---->
					<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					
					<!--- pesan berhasil ---->
					<?= $this->session->flashdata('message'); ?>
					
					<!--- tabel tambahan --->
					<div class="row">
						<div class="col-lg-6">
						
						<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
						
							<table class="table table-hover">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">Menu</th>
								  <th scope="col">Action</th>
								  
								</tr>
							  </thead>
							  <tbody>
								<?php $i = 1; ?> <!--- akalin biar no urutnya berurut ---->
							    <?php foreach($menu as $m) : ?>
								<tr>
								  <th scope="row"><?= $i; ?></th>
								  <td><?= $m['menu']; ?></td>
								  <td>
									<a class="badge badge-success" href="<?= base_url('menu/editMenuManagement/') . $m['id']; ?>"><i class="fas fa-edit"></i> Edit</a>
									<a class="badge badge-danger" href="<?= base_url('menu/deleteMenuManagement/') . $m['id']; ?>" onclick="return confirm('Are you sure delete this data?');"><i class="fas fa-trash-alt"></i> Hapus</a>
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
	<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="newMenuModallLabel">Add New Menu</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <!-- form -->
		  <form action="<?= base_url('menu'); ?>" method="post">
			  <div class="modal-body">
				 <div class="form-group">
					<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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