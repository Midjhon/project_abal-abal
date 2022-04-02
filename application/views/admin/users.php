

       
       

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

					<?= anchor('admin/tambah_user', '<button class="btn btn-primary btn-sm mb-3 round waves-effect waves-light"><i class="fas fa-plus fa-sm"></i> Tambah User</button>') ?>
					
					<!--- tabel tambahan --->
					<div class="row">
						<div class="col-lg">
						
						
							<table class="table table-hover">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">Email</th>
								  <th scope="col">Hak Akses</th>
								  <th scope="col">Date</th>
								  <th scope="col">Active</th>
								  <th scope="col">Action</th>
								  
								</tr>
							  </thead>
							  <tbody>
								<?php $i = 1; ?> <!--- akalin biar no urutnya berurut ---->
							    <?php foreach($users as $us) : ?>
								<tr>
								  <th scope="row"><?= $i; ?></th>
								  <td><?= $us['email']; ?></td>
								  <td><?= $us['role']; ?></td>
								  <td>
								  	<?php date_default_timezone_set('Asia/Jakarta'); ?>
									  <?= date('d F Y, H:i a', $us['date_created']); ?>
								  </td>
								  <td><?= $us['is_active']; ?></td>
								
								  
								  <td>
								  	<a class="badge badge-info" href="<?= base_url('admin/detailUser/') . $us['id']; ?>"><i class="fas fa-eye"></i> Detail</a>
									<a class="badge badge-success" href="<?= base_url('admin/editUser/') . $us['id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                    <a class="badge badge-danger" href="<?= base_url('admin/deleteUser/') . $us['id']; ?>" onclick="return confirm('Are you sure delete this data?'); "><i class="fas fa-trash-alt"></i> Hapus</a>
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
